<?php
class Home extends Controller {
    public function __construct() {

        $this->articlesModel = $this->model('Articles');
    }

    public function index() {
        
        $articles = $this->news('1');
        
        $data = [
            'title' => 'Homepage',
            'articles' => $articles
        ];

        
        $this->view('index', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }
    public function news($current_page = 1) {
        $articles = $this->articlesModel->getSiteTrending($current_page);
        
        $data = [
            'title' => 'Home page',
            'articles' => $articles[0],
            'start_front' => $articles[1],
            'end_front' => $articles[2],
            'start_back' => $articles[3],
            'end_back' => $articles[4],
            'current_page' => $articles[5],
            'end_page' => $articles[6],
        ];

        
        $this->view('index', $data);
        
    }
}
