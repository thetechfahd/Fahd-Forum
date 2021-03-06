<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'home';
    protected $currentController_ = '';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
     

      $url = $this->getUrl();
 
      // Look in URL for first value
      if(isset($url[0])){
        if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
          // If exists, set as controller
          $this->currentController = ucwords($url[0]);
          // Unset 0 Index
          unset($url[0]);
        }else{
          //IF IT DOES NOT EXIST, SET THE CONTROLLER TO ERROR [USEFUL WHEN NON AVAILIABLE CONTROLLER IS CALLED IN URL]
          $this->currentController = 'Err';
          $this->currentMethod = 'index';
        }
      }

      //require the controller file
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;


      // Check for second part of url
      if(isset($url[1])){
        //Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          //set second part of url to current method
          $this->currentMethod = $url[1];
          // // Unset 1 index
          unset($url[1]);
        }else{         
          //IF SECOND PART DOESNT EXIST IN CONTROLLER METHOD, SET CONTROLLER TO ERROR CONTROLLER
          $this->currentController_ = 'Err';
          
          //REQUIRE THE ERROR CONTROLLER
          require_once '../app/controllers/'. $this->currentController_ . '.php';

          // Instantiate controller class
          $this->currentController = new $this->currentController_;
        }

      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }


