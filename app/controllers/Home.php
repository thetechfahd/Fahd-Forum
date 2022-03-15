<?php
class Home extends Controller {
    public function __construct() {
        $this->articlesModel = $this->model('Articles');
        //$this->userModel = $this->model('User');
    }

    public function index() {
        
        $articles = $this->news('1');
       
        
        
        $data = [
            'title' => 'Home page',
            'articles' => $articles
        ];

        
        $this->view('index', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }
    public function news($current_page) {
        $articles = $this->articlesModel->getSiteTrending($current_page);
        
        $data = [
            'title' => 'Home page',
            'articles' => $articles[0],
            'previous_page' => $articles[1],
            'next_page' => $articles[2],
            'end_page' => $articles[3],
            'current_page' => $articles[4],
        ];

        
        $this->view('index', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }
}
