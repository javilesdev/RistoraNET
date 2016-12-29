<?php

class posController extends Controller
{    
    public function __construct() 
    {
        parent::__construct();
        $this->_view->setTemplate('pos');
        $this->_acl->acceso('access_pos');
            
    }
    
    public function index()
    {
    	if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
    }
}