<?php
class Articles {
    private $db;

    public function __construct() {
        $this->db = new Database;
        
    }

    public function getSiteTrending($current_page) {
        $trending = [];

        if(!isset($current_page)){
            $current_page = 1; // get current page number
        }


        $start = ($current_page * ARTICLE_PER_PAGE) - ARTICLE_PER_PAGE; // calculate number of pages
        
        $this->db->query("SELECT * FROM `topics` WHERE post_type='post' ORDER BY topic_id ASC");
        
        $PageCountResult = $this->db->rowCount();
        

        $endpage = ceil($PageCountResult / ARTICLE_PER_PAGE); // get the last page number
        
        $startpage = 1; // initial page set to 1
        $nextpage = $current_page + 1; // increament pages by 1
        $previouspage = $current_page - 1; // de-creament pages by 1
        $perpage = ARTICLE_PER_PAGE;


        $this->db->query("SELECT * FROM `topics` WHERE post_type='post' ORDER BY topic_id DESC LIMIT $start, $perpage");

        $SiteArticle =  $this->db->resultSet();

        $trending = [$SiteArticle, $current_page, $previouspage, $nextpage, $endpage];

        return $trending;

    }

    
}