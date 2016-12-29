<?php

class indexController extends mobileController
{    

	private $_index;
	
    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');        
    }
    
    public function index(){

        if(!Session::get('autenticado')){
            $this->redireccionar();
        }
        $signal = 0;
        date_default_timezone_set('America/Santiago');
        $fecha = date("Y-m-d");  
        $activo = $this->_index->verificarActivopos($fecha);
        if($activo['inicio']==''){
            $signal = 0;
        }else{
            $signal = 1;
        }
        $this->_view->assign('signal', $signal);  
        $this->_view->assign('lista', $this->_index->getAct(1));
        $this->_view->assign('activa', $this->_index->getAct(0));
    	$this->_view->assign('mesas', $this->_index->getMesas());
    	$this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('index','mobile');
    }     
}