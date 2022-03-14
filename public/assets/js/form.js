var atno = 1;
var options = 3;
var XMLHttpFactories = [
    function () {return new XMLHttpRequest();},
    function () {return new ActiveXObject("Msxml2.XMLHTTP");},
    function () {return new ActiveXObject("Msxml3.XMLHTTP");},
    function () {return new ActiveXObject("Microsoft.XMLHTTP");}
];

function wrapText(elementID, openTag, closeTag) {
    var textArea = document.getElementById(elementID);
    var len = textArea.value.length;
    var start = textArea.selectionStart;
    var end = textArea.selectionEnd;
    var selectedText = textArea.value.substring(start, end);
    var replacement = openTag + selectedText + closeTag;
    textArea.value = textArea.value.substring(0, start) + replacement + textArea.value.substring(end, len);
    textArea.focus();
    textArea.selectionStart = textArea.selectionEnd = end + openTag.length + closeTag.length;
}

function addText(elementID, tag) {
    var textArea = document.getElementById(elementID);
    var len = textArea.value.length;
    var insertposition = textArea.selectionEnd;
    textArea.value = textArea.value.substring(0, insertposition) + tag + textArea.value.substring(insertposition, len);
    textArea.focus();
    textArea.selectionStart = textArea.selectionEnd = insertposition + tag.length;
}

function toEnd(elementID)
    {
        var textArea = document.getElementById(elementID);
        textArea.focus();
        textArea.selectionStart = textArea.selectionEnd = textArea.value.length;
    }

function sendRequest(url,callback,postData) {
    var req = createXMLHTTPObject();
    if (!req) return 'No request';
    var method = (postData) ? "POST" : "GET";
    req.open(method,url,true);
    if (postData)
        req.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    req.onreadystatechange = function () {
        if (req.readyState != 4) return 'State not 4';
        if (req.status != 200 && req.status != 304) {
            return 'Status 204';
        }
        callback(req);
    };
    if (req.readyState == 4) return 'State 4';
    req.send(postData);
}

function createXMLHTTPObject() {
    var xmlhttp = false;
    for (var i=0;i<4;i++) {
        try {
            xmlhttp = XMLHttpFactories[i]();
        }
        catch (e) {
            continue;
        }
        break;
    }
    return xmlhttp;
}

function handleQuote(req){
    addText("body", req.responseText);
    document.getElementById("body").focus();
}

function quotePost(post, session) {
    var requesturl = '/getpost?post=' + post + '&session=' + session;
    sendRequest(requesturl, handleQuote);
}

function like(requesturl, undourl, numlikes, textid, linkid){
	var likes = parseInt(numlikes);
	likes += 1;
	var likeText = " Like";
	if (likes > 1) {likeText += "s";};
	document.getElementById(textid).innerHTML = likes.toString() + likeText;
	likeLink = document.getElementById(linkid);
	likeLink.onclick = function(){
		unlike(undourl, requesturl, likes, textid, linkid);
		return false;};

	likeLink.innerHTML = "Unlike";
	likeLink.href = undourl;
	sendRequest(requesturl, handleLikePost);
	return false;
}

function handleLikePost(req){}

function unlike(requesturl, undourl, numlikes, textid, linkid){
	var likes = parseInt(numlikes);
	likes -= 1;
	var likeText = " Like";
	var temp = likes;
	if (likes == 0){
		temp = "";
		likeText = "";}
	else if (likes > 1) {likeText + "s";}
	
	document.getElementById(textid).innerHTML = temp.toString() + likeText;
	likeLink = document.getElementById(linkid);
	likeLink.innerHTML = "Like";
	
	likeLink.onclick = function() {
		like(undourl, requesturl, likes, textid, linkid);
		return false;
	};
	likeLink.href = undourl;
	sendRequest(requesturl, handleLikePost);
	return false;
}

function setpoststate(_state, post, requesturl, session, redirect){
	var state = parseInt(_state);
	redirect2 = encodeURI(redirect)
	redirect = redirect2

	showUrl = '/do_setpoststate?'+ 'state=0&post=' + post + '&session='+ session;
	hideUrl = '/do_setpoststate?'+ 'state=1&post=' + post + '&session=' + session;
	spamUrl = '/do_setpoststate?' + 'state=2&post=' + post + '&session=' + session;
	
	switch(state){
		case 0://make post normal
			hideElement = document.getElementById("hp" + post);
			hideElement.innerHTML = "Hide";
			hideElement.href = hideUrl;
			hideElement.onclick = function(){
				setpoststate("1", post, hideUrl, session, redirect);
				return false;};
			
			spamElement = document.getElementById("sp" + post);
			spamElement.innerHTML = "Mark Spam";
			spamElement.href = spamUrl;
			spamElement.onclick = function(){
				setpoststate("2", post, spamUrl, session, redirect);
				return false;
			};
			
			textElement = document.getElementById("ht" + post);
			textElement.innerHTML = "";
			undoGrey(post);
			
			sendRequest(requesturl, handleStateChange);
			break;
		case 1://hide post
			linkElement = document.getElementById("hp"+post);
			linkElement.innerHTML = "Show";
			linkElement.href = showUrl;
			linkElement.onclick = function(){
				setpoststate("0", post, showUrl, session, redirect);
				return false;};
			
			spamElement = document.getElementById("sp" + post);
			spamElement.innerHTML = "Mark Spam";
			spamElement.href = spamUrl;
			spamElement.onclick = function(){
				setpoststate("2", post, spamUrl, session, redirect);
				return false;};
			
			textElement = document.getElementById("ht" + post);
			textElement.innerHTML = "(HIDDEN!)";
			makePostGrey(post);
			sendRequest(requesturl, handleStateChange);
			break;
			
		case 2://mark as spam
			linkElement = document.getElementById("hp" + post);
			linkElement.innerHTML = "Not Spam";
			linkElement.href = showUrl;
			linkElement.onclick = function(){
				setpoststate("0", post, showUrl, session, redirect);
				return false;};
			
			hideElement = document.getElementById("sp" + post);
			hideElement.innerHTML = "Hide But Not Spam";
			hideElement.href = hideUrl;
			hideElement.onclick = function(){
				setpoststate("1", post, hideUrl, session, redirect);
				return false;};
			
			textElement = document.getElementById("ht" + post);
			textElement.innerHTML = "(SPAM!)";
			makePostGrey(post);
			sendRequest(requesturl, handleStateChange);
			break;
	}
}

function makePostGrey(post){
	postBody = document.getElementById("pb"+post);
	postBody.className += " gr";
	
	postSig = document.getElementById("posig"+post);
	if(postSig){postSig.className += " gr";}
}

function undoGrey(post){
	var reg = new RegExp("(?:^|\\s)gr(?!\\S)", "g");
	
	postBody = document.getElementById("pb"+post);
	postBody.className = postBody.className.replace(reg, '');
	
	postSig = document.getElementById("posig"+post);
	if(postSig){
		postSig.className = postSig.className.replace(reg, '');
	}
}

function handleStateChange(req){}

function handlefollows(undourl, requesturl, state, undoText, doText, classref){
	var allElements = document.getElementsByClassName(classref);
	state = parseInt(state);
	for(var i = 0; i < allElements.length; i++){
		allElements[i].innerHTML = doText;
		allElements[i].href = undourl;
		allElements[i].onclick = function(){
			handlefollows(requesturl, undourl, (state ? 0 : 1), doText, undoText, classref);
			return false;
		};
	}
	sendRequest(requesturl, handleStateChange);
}

function share(requesturl, undoUrl, id, count, state, textid){
	var element = document.getElementById(id);
	var countDisplay = document.getElementById(textid);
	
	state = parseInt(state);
	var text = "";
	var doText = "";
	var newCount = 0;
	
	if(state){
		newCount = parseInt(count) - 1;
		doText = "Share";
		
		if(newCount > 0){
			if(newCount == 1){text = newCount + " Share";}
			else{text = newCount + " Shares";}
		}
	}else{
		newCount = parseInt(count) + 1;
		doText = "Un-Share";
		
		if(newCount > 1){text = newCount + " Shares";}
		else{text = newCount + " Share";}
	}
	
	countDisplay.innerHTML = " " + text;
	element.innerHTML = doText;
	element.href = undoUrl;
	element.onclick = function(){
		share(undoUrl, requesturl, id, newCount, (state ? 0 : 1), textid);
		return false;
	};
	
	sendRequest(requesturl, handleStateChange);
	return false;
}

function unfollowtopic(requesturl, topic){
	var tablerow = document.getElementById('top'+topic);
	function dummyFunction(){
		tablerow.innerHTML = '';
		sendRequest(requesturl, handleStateChange);
	}
	window.setTimeout(function(){dummyFunction();}, 125);
}

function dismissreport(requesturl, report){
	var tablerow = document.getElementById('rep'+report);
	function dummyFunction(){
		tablerow.innerHTML = '<tr><td>';
		sendRequest(requesturl, handleStateChange);
	}
	window.setTimeout(function(){dummyFunction();}, 125);
}

function hideAppAd(){
	var element = document.getElementById("appad");
	element.innerHTML = "";
	
	sendRequest("/appadclosed", handleStateChange)
	return false;
}