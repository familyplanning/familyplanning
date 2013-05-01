<?php
    require dirname(__FILE__).'/../../lib/autoload.php';
    
    class FrontendApplication extends Application
    {
        public function __construct()
        {
            parent::__construct();
            
            $this->name = 'frontend';
        }
        
        public function run()
        {
            $router = new Router($this);
            
            $controller = $router->getController();
            $controller->execute();
            
            $this->httpResponse->setPage($controller->page());
            $this->httpResponse->send();
        }
    }