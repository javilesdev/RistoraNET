<?php

class visualController extends Controller
{    
    public function __construct() 
    {
        parent::__construct();
        $this->_view->setTemplate('mobile');
        $this->_acl->acceso('access_visual');
            
    }
    
    public function index()
    {
    	if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }        
    }
}
