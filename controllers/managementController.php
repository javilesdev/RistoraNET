<?php

class managementController extends Controller
{    
    public function __construct() 
    {
        parent::__construct();
        $this->_view->setTemplate('admin');
        $this->_acl->acceso('access_estadistics');
    }
    
    public function index()
    {
    	if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
    }
}