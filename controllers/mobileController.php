<?php

class mobileController extends Controller
{    
    public function __construct() 
    {
        parent::__construct();
        $this->_view->setTemplate('mobile');
        $this->_acl->acceso('access_mobile');
    }
    
    public function index()
    {
        
    	if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
    }
}