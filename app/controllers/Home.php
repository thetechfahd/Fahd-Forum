<?php
class Home extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        
        
        $data = [
            'title' => 'Home page'
        ];

        
        $this->view('index', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }
    public function page() {
        
        
        $data = [
            'title' => 'Home page'
        ];

        
        $this->view('index', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }


}
