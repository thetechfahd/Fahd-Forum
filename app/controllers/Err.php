<?php
class Err extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        
        
        $data = [
            'title' => 'Error - Page Not Found'
        ];
        
        $this->view('error', $data);
        //$this->view('index', include_once APPROOT."/views/includes/footer.php");
    }


}
