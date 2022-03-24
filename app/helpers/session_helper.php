<?php
    session_start();
    //connect model, if session exist get 

    function loginCheck() {
        if (isset($_SESSION['user_id'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isLoggedIn() {
        if (loginCheck()) {
            $user_id=$_SESSION['user_id']; //Storing user ID in SESSION variable.
            $username=$_SESSION['username']; //Storing USERNAME in SESSION variable.
            $email=$_SESSION['email'];
        } else {
            return FALSE;
        }
    }
