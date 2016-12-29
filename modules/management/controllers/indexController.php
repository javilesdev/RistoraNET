<?php

class indexController extends managementController
{
      
    public function __construct() 
    {
        parent::__construct();        
    }
    
    public function index()
    {
        
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('index','management');
    }
}