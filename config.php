<?php 
 /*
Note: please don't edit any thing from here except you know what you are
doing, this file contain your php configuration and the whole site settings

------------------------ SETTINGS ------------------------------------
You can modify website title, name, trademark etc

*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



 require_once('incfiles/online_status.php'); 
// online users status 

 
 if (file_exists('metatags.php')) {
   require_once('metatags.php'); 
  require_once('incfiles/applytheme.php'); 
 }



//db configuraton details 
session_start();
// define('DB_SERVER', 'localhost'); 
// define('DB_USERNAME', 'mozzsxvr_admin'); 
// define('DB_PASSWORD', 'highzLUrflT3');
// define('DB_DATABASE', 'mozzsxvr_forum'); 

define('DB_SERVER', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');
define('DB_DATABASE', 'mozzem_forum'); 





$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 


//Connect and select the database

define('DEVELOPER', 'Marshall');

$perpage = 20; // how many post to display per page

define('GOOGLE', '');  // define custom root for web app
define('YANDEX', ''); // set application name
define('ALEXA', ''); // set application name
define('METATAGS', ''); // set application trade mark name


define('THEME', 'nl');  // define custom theme
define('HEADER_COLOR', '#000000'); // set title header color
define('DISPLAY_STATUS', 'title'); // set application trade mark name

//define('WEBROOT', 'https://mozzem.com');  // define custom root for web app ... REAL INFO
define('WEBROOT', 'https://localhost/mo');  // define custom root for web app ... FAKE INFO
define('APPNAME', 'Mozzem'); // set application name
define('APPINFO', 'Mozzem'); // set application name
define('TRADEMARK', 'Mozzem'); // set application trade mark name
//define('URL', 'https://mozzem.com'); // set website url... REAL INFO
define('URL', 'https://localhost/moz'); // set website url ... FAKE INFO
define('FB', 'FACEBOOK-PAGENAME'); // set application trade mark name
define('TW', 'TWITTER-HANDLE'); // set website url
define('GPLUS', 'GOOGLEPLUS-USERNAME'); // GPLUS url
define('INSTA', 'INSTAGRAM-PAGENAME'); // set INSTA url
define('YOUTUBE', 'YOUTUBE-USERNAME'); // set YOUTUBE url
define('TITLE', 'Mozzem');
define('DSC', 'Mozzem');
define('EMAIL', 'info@mozzem.com');  // define email

 ?>