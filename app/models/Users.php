<?php
class Users {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        If($row === FALSE) {
            return false;
        }else{

            $hashedPassword = $row->password;
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else { 
                return false;
            }
        }  
    }

    //Find user by email. Email is passed in by the Controller.
    public function loginprocess($username) {

        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        $access = $row->access;
        $status = $row->status;
        $status_change_day = $row->status_change_day;
        $datetoday = date('Y-m-d');

        if($status == 0 && $datetoday <= $status_change_day){
            //>
            $error = "<script> toastr.error('Sorry, You Have Been Banned!. The Bann Placed On Your Account Willl Expire On ".$status_change_day."') </script>";
            return $error;
        }else{
            $lastlogin=time();

            $this->db->query("UPDATE users SET status = :status , activeSince = :activeSince WHERE username = :username");
            $this->db->bind(':status', '1');
            $this->db->bind(':activeSince', $lastlogin);
            $this->db->bind(':username', $username);
            return true;
        }

    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassResetCode($code, $email) {
        $this->db->query('UPDATE users SET passreset = :code WHERE email = :email');

        //Bind values
        $this->db->bind(':code', $code);
        $this->db->bind(':email', $email);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserDetails($code, $password, $email) {
        $this->db->query('UPDATE users SET passreset = :code, password = :password WHERE email = :email');

        //Bind values
        $this->db->bind(':code', $code);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPasswordResetCode($code) {
        $this->db->query('SELECT * FROM users WHERE passreset = :code');

        //Bind value
        $this->db->bind(':code', $code);

        $row = $this->db->single();

        If($row === FALSE) {
            return false;
        }else{
            return $row;

        }  
    }

}
