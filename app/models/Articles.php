<?php
class Articles {
    private $db;

    public function __construct() {
        $this->db = new Database;
        
    }

    public function getSiteTrending($currentpage) {

        $trending = [];

        $current_page = ($currentpage) ? $currentpage : '1';


        $start = ($current_page * ARTICLE_PER_PAGE) - ARTICLE_PER_PAGE; // calculate number of pages
        
        $this->db->query("SELECT COUNT(*) FROM `topics` WHERE post_type='post'");
        $result = $this->db->single();
        foreach ($result as $r) {
            $ArticleCountResult  = $r; # code...
        }
        
        $endpage = ceil($ArticleCountResult / ARTICLE_PER_PAGE); 
        
        $perpage = ARTICLE_PER_PAGE;

        if($current_page > 5){
            $start_front = $current_page - 5;
        }else{
            $start_front = 1;
        }
        
        $end_front = $current_page - 1;



        $start_back = $current_page + 1;
        $end_back = $current_page + 5;

        if($end_back >= $endpage){
            $end_back = $endpage;
        }else{
            $end_back = $endpage - $current_page;
            $end_back = $current_page + $end_back; 
        }


        $this->db->query("SELECT * FROM `topics` WHERE post_type='post' ORDER BY topic_id DESC LIMIT $start, $perpage");

        $SiteArticle =  $this->db->resultSet();

        $trending = [$SiteArticle, $start_front,$end_front, $start_back, $end_back, $current_page, $endpage];

        return $trending;

    }

    
}
