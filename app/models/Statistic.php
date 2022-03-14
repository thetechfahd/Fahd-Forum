<?php
class Statistic {
    private $db;

    public function __construct() {
        $this->db = new Database;
        
    }

    // Test (database and table needs to exist before this works)
    public function getUserCount() {
        $this->db->query("SELECT COUNT(*) FROM users");

        $result = $this->db->single();
        foreach ($result as $r) {
            return $r; # code...
        }
    }

    public function getTopicCount() {
        $this->db->query("SELECT COUNT(*) FROM topics");

        $result = $this->db->single();
        foreach ($result as $r) {
            return $r; # code...
        }
    }
    
}

$statistics = new Statistic();
