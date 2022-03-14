<?php
/*
Developer: DAVID ADEGOKE
Fb: @davidadegoke247
Email: Admin@thetechfahd.com.ng
Whatsapp: +2349013185850
*/

require_once ('config.php');
require_once ('functions.php');

$site_title=APPNAME;

############################################### site content

require_once 'createxml.php';
require_once 'incfiles/theme/head_open.php';
############################### page title #######################

$page_title='Front Page Stat';
$site_dsc= 'See Users With The Most Trending Posts';
require_once 'incfiles/theme/blog_page_title.php';

require_once 'incfiles/theme/metatag.php';
require_once 'incfiles/theme/body_open.php';
require_once ('header.php');

echo '<a id="top" name="top"></a>';
require ('ads.php');
require_once ('incfiles/googleads.html');


$tim ="";
$tim= $_GET['time'];

function CleanData($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$time = CleanData($tim);

if(isset($time) && !empty($time)){
  if($time == 'last_month'){
    $timea = "l_frontpage";
  }else{
    $timea = "frontpage";
  }
}
else{
  $timea = "frontpage";
}

?>






<table class="boards">
  <tr style="color:white;">
    <th>Peageant</th>
  </tr>
 
    <td><div style="color:#963165;font-weight:bold;">Our country  Nigeria is blessed with the most beautiful ladies and here in Mozzem every Nigerian lady has an equal opportunity to contest and win the most beautiful lady in Nigeria. This is an online contest with pictures being the sole decision and so the beauty contest is purely based on physical attributes of the contestants.

                           <h3  style="text-align: center;">      What are the Criteria for entry   </h3> 
To participate in the beauty contest, you are required to have an account with Mozzem. The contest is just for ladies only and so you must be a lady to be able to participate in the contest.You hav to be single(never married) and between the age of 14 to 40 years. Finally if you are below 18 years old you will need to send us parental permission.

                <h3  style="text-align: center;">     When is the contest?    </h3> 
The context starts from 10th december to 17th December of every year. 


               <h3  style="text-align: center;">     How do i enter?     </h3> 
To join the contest is simple. On the 10th of December a thread will be posted on the front page. What you have to do is to upload 4 of your best and recent pictures on the thread. Then you are done

                <h3  style="text-align: center;">    What are the proceduers             </h3> 
Uploading of pictures by every female Mozzem member will run from 10th to 13th december and then picture submittions will be closed. Our super moderators will go though all the pictures on the 14 to 15th. The moderators will pick up 20 best pictures from the list.  On the 16th of December polls will be conducted on the front page where all mozzem members will vote for the top 5 contestants according to whatever preference they deem fit. On the 18th to 20th of December there will be final poll for the top 5 contestants to know the winner of the beauty contest. The voting will end by 8:00PM on 20th december and the winner declared!.
                         

                        <h3  style="text-align: center;">   What is the winner's reward?        </h3> 
The question should be, how glorious is it to be named the most beautiful girl in Nigeria. The winner will also have a queen crown attached to her username and will be there for lifetime.


                       <h3  style="text-align: center;">   What are the rules?       </h3> 

1) You must be a female and your Mozzem account will also be registered as such. <br>

2) Every contestant must use her own picture and if you are selected among the first 20 you will be contacted by the moderators to verify the authenticity of the pictures that you submited. Verification process may involve Whatsapp or Facebook video call. <br>

3) You must be Nigerian citizen but it doesn't matter if you live in Nigeria or Abroad. <br>

4) The pictures you will submit will be at most 1 year old. Contestants with unfiltered pictures has a better chance to be selected. <br> 

5) You must not create duplicate accounts or upload your pictures more than once in the thread. Once we notice that, you will be disqualified. So only post once



  
</table>






	

<?php


//load articles from articles.php -->





echo '<p class="small">(<a href="#up"><b>Go Up</b></a>)</p>';

//load footer from footer.php
require_once ('footer.php');

?>
</div>
</body>
</html>
