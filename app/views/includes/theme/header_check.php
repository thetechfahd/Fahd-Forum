<?php
//require_once 'helpers/session_helper.php';

include_once APPROOT."/models/Userinfo.php";

//print_r ($userinfos->countAd('13'));

if (isLoggedIn() !== FALSE) {  // if session is called
	$userinformation = $userinfos->getUserDetails($_SESSION['user_id']);
	$FT = $userinfos->countFollowedTopic($_SESSION['user_id']);
	$FB = $userinfos->countFollowedBoard($_SESSION['user_id']);
	
	$gender = "";
	// switch gender
	switch ($userinformation[0]->gender) {
		case '1':
			$gender = '(m)';
			break;
		case '2':
			$gender = '(f)';
			break;
		case '0':
			$gender = '(n/a)';
			break;
	}
	echo '<p class="blog-nav"><a href="' . URLROOT . '/u/' . $userinformation[0]->username . '"><b>' . ucwords($userinformation[0]->username) . '</b></a> <span class="m">' . $gender . '</span>:
		<a href="' . URLROOT . '/editprofile">Edit Profile</a> |
		<a href="' . URLROOT . '/followed-topics">FT(' . number_format($FT) . ')</a> |
		<a href="' . URLROOT . '/followed-boards">FB(' . number_format($FB) . ')</a> |
		<a href="' . URLROOT . '/likes">My Likes & Shares (0)</a> | 
		<a href="' . URLROOT . '/following">Followed Post(0)</a> |
		<a href="' . URLROOT . '/followers"><span title="Followers">My Followers(4)</span></a> |
		<a href="' . URLROOT . '/newest">Newest</a> |
		<a href="' . URLROOT . '/user/logout">Logout</a><br>
	';
			// if it is admin show banned topic link
		
	if ($userinformation[0]->access == 1){ // get permission
	
		echo '<p class="blog-nav" style="text-align:center; color:#000; font-size: 12px !important; margin-top: 20px;">
			<a href="' . URLROOT . '/admin/list-banned-topics" style="color:#000;">Banned Topics</a> |
			<a href="' . URLROOT . '/reportedtopic" style="color:#000;">Reported Topics</a> |
			<a href="' . URLROOT . '/delete-topics" style="color:#000;">Topics</a> |
			<a href="' . URLROOT . '/list-banned-users" style="color:#000;">Users</a> |
			<a href="' . URLROOT . '/list-flagged-topics" style="color:#000;">Flagged Topics</a> |
			<a href="' . URLROOT . '/create-poll" style="color:#000;">Create Poll</a> |
			<a href="' . URLROOT . '/single" style="color:#000;">Post (single Comment)</a> |
			<a href="' . URLROOT . '/assignrank" style="color:#000;">Assign Rank</a> |
			<a href="' . URLROOT . '/settings" style="color:#000;">Settings</a> |
			</p>
		';
		// create admin post url
	}elseif ($userinformation[0]->access == 2){
		echo '<p class="blog-nav" style="text-align:center; color:#000; background-color:#097470;">
			<a href="' . URLROOT . '/list-banned-users" style="color:#000;">Users</a> |	
			<a href="' . URLROOT . '/list-my-board" style="color:#000;">Moderator Board</a> |
			</p>
		';
	}else{
		//show nothing more
	}		
}else{
	echo '<p class="blog-nav">
			<a href="' . URLROOT . '/user/join">Join '.TRADEMARK.'</a> |
			<b><a href="' . URLROOT . '/user/login">LOGIN!</a></b> |
			<!---<a href="' . URLROOT . '/trending">Trending</a> -->
			<a href="' . URLROOT . '/feed">Feeds</a> |
		</p>
	';
}
