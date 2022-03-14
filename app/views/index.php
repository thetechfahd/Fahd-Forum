<?php

/* This is how you echo out database information on the screen
foreach ($data['users'] as $user) {
    echo "Information: " . $user->user_name . $user->user_email;
    echo "<br>";
}
*/
// foreach ($data['para'] as $para) {
//     echo $para;
//     echo "<br>";
// }
$category_id = 'index';

require_once APPROOT."/views/includes/theme/head_open.php";
require_once APPROOT."/views/includes/theme/metatag.php";
// open body tag

require_once APPROOT."/views/includes/theme/body_open.php";

include_once APPROOT."/views/includes/inc_header.php";





require_once APPROOT."/views/includes/inc_board.php";



//load system header ads template
require APPROOT."/views/includes/inc_ads.php";
//load articles from articles.php -->
//require_once APPROOT."/views/includes/inc_articles.php";

//load system header ads template
require APPROOT."/views/includes/inc_ads.php";

//load footer statistic from footer_stat.php
include_once APPROOT."/views/includes/inc_footer_stat.php";

echo '<p class="small">(<a href="#up"><b>Go Up</b></a>)</p>';

include_once APPROOT."/views/includes/inc_footer.php";
