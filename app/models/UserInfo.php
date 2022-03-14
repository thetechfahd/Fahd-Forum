<?php
class UserInfo {
    private $db;

    public function __construct() {
        $this->db = new Database;
        
    }

    public function getUserDetails($user_id) {
        $this->db->query("SELECT * FROM users WHERE uid = :user_id");
        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        foreach ($result as $r) {
            $username =  $r->username;
            $access =  $r->access;
            $email =  $r->email;
            $status =  $r->status;
            $status_change_date =  $r->status_change_date;
            $status_change_day =  $r->status_change_day;
            $gender =  $r->gender;
            $active_since =  $r->activeSince;
            $registered_date =  $r->registered_date;
            $location =  $r->location;
            $personal_text =  $r->personaltext;
            $signature =  $r->signature;
            $fb =  $r->fb;
            $twitter =  $r->twitter;
            $bday =  $r->birthday;
            $bmonth =  $r->bmonth;
            $byear =  $r->byear;
        }
    }


    public function countFollowedTopic($user_id) {
        $this->db->query("SELECT COUNT(*) FROM followed_topics WHERE  user_id_fk= :user_id");
        $this->db->bind(':user_id', $user_id);

        $result = $this->db->single();
        foreach ($result as $r) {
            return $r;
        }
    }

    public function countFollowedBoard($user_id) {
        $this->db->query("SELECT COUNT(*) FROM followed_boards WHERE  user_id_fk= :user_id");
        $this->db->bind(':user_id', $user_id);

        $result = $this->db->single();
        foreach ($result as $r) {
            return $r;
        }
    }

    
}

$userinfos = new UserInfo();



