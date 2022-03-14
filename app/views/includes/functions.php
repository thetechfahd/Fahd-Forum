<?php

//TURN ERROR REPORTING ON OR OFF
if(DEVELOPERS_MODE == 1){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}else{
    //do not display errors
}
