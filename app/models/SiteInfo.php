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



// $sid='index';
// if(isset($_GET['link']) & !empty($_GET['link']))
// {
// 	$curpage = $_GET['link']; // get current page number
// }else{
// 	$curpage = 1; // or setcurrent page to 1
// }
// $start = ($curpage * $perpage) - $perpage; // calculate number of pages
// $PageSql = "SELECT * FROM `topics` WHERE post_type='post' ORDER BY topic_id ASC"; // fetch post from db
// $pageres = $db->query($PageSql); // query post
// $totalres = mysqli_num_rows($pageres); // count total number of post available

// $endpage = ceil($totalres/$perpage); // get the last page number
// $startpage = 1; // initial page set to 1
// $nextpage = $curpage + 1; // increament pages by 1
// $previouspage = $curpage - 1; // de-creament pages by 1

// $ReadSql = "SELECT * FROM `topics` WHERE post_type='post' ORDER BY topic_id DESC LIMIT $start, $perpage";
// $res = $db->query($ReadSql); // query post with post limit


