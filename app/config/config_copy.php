<?php

//TURN ON ERROR REPORTING

//TURN ON DEVELOPERS MODE, THE MODE ENABLES ERROR REPORTING 
define('DEVELOPERS_MODE', '1');

//DATABASE CONFIGURATIONS
define('DB_HOST', ''); //Add your db host
define('DB_USER', ''); // Add your DB root
define('DB_PASS', ''); //Add your DB pass
define('DB_NAME', ''); //Add your DB Name



//LOCATION LINKING    
define('APPROOT', dirname(dirname(__FILE__))); //APP LINK
define('URLROOT', 'https://localhost/moz'); //URLROOT (Dynamic links)
define('ASSETURL', URLROOT .'/public/assets'); //(Dynamic links) ASSETS URL
define('SITENAME', 'Mozzem'); //Sitename
define('TRADEMARK', 'Mozzem'); // set application trade mark name

//SOCIAL PAGES LINK
define('FACEBOOK', 'FACEBOOK_PAGE_URL_HERE'); // SET FACEBOOK PAGE URL
define('TWITTER', 'TWITTER_HANDLE_URL_HERE'); // SET TWITTER HANDLE URL
define('INSTAGRAM', 'INSTAGRAM_PAGE_URL_HERE'); // SET INSTAGRAM PAGE URL
define('YOUTUBE', 'YOUTUBE_PAGE_URL_HERE'); // SET YOUTUBE PAGE URL
define('SITE_EMAIL', 'SITE_EMAIL_HERE');  // SET SITE EMAIL

//OTHER SITE CONFIG
define('ARTICLE_PER_PAGE', '20'); // how many post to display per page


//THEME OPTION
define('THEME', 'nl');
define('HEADER_COLOR', '#000000');
define('DISPLAY_STATUS', 'logo'); //display option [logo, title, both] at the logo area of the website

//INDEXING
define('ALEXA', ''); 
define('GOOGLE', ''); 
define('YANDEX', ''); 
