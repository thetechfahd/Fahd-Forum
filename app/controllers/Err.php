<?php
class Err extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        
        
        $data = [
            'title' => 'Error - Page Not Found'
        ];
        
        //display error view
        $this->view('error', $data);
      
    }


}
