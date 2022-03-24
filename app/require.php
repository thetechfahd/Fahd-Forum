<?php


//Require libraries from folder libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
require_once 'config/config.php';
include_once APPROOT."/views/includes/functions.php";

require_once 'helpers/session_helper.php';
require_once 'helpers/input_cleaner.php';


$core = new Core();
