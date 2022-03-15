<?php
class SiteInfo {
    private $db;

    public function __construct() {
        $this->db = new Database;
        
    }

    public function getSiteCategory() {
        $this->db->query("SELECT * FROM category");

        $result = $this->db->resultSet();
        return $result;
    }

    public function getSiteSubCategory($category_id) {
  
        $this->db->query("SELECT * FROM  sub_cat WHERE cid_fk=:category_id");
        $this->db->bind(':category_id', $category_id);
        $result = $this->db->resultSet();
        return $result;

    }

    public function getSiteAds($category_id) {
  
        $this->db->query("SELECT * FROM ads WHERE catId=:category_id AND adsStatus=:adstatus  ORDER BY rand()");
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':adstatus', '1');
        $result = $this->db->resultSet();
        return $result;

    }

    
}

$siteinfos = new SiteInfo();