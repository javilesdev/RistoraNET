<?php

class indexController extends visualController
{
      
    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');
            
    }
    
    public function index()
    {
        if(!Session::get('autenticado')){
            $this->redireccionar('login');
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
        $this->_view->assign('terminada', $this->_index->getAct(1));
        $this->_view->assign('activa', $this->_index->getAct(0));
    	$this->_view->assign('mesas', $this->_index->getMesas());
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('index','visual');
    }

    public function show()
    {
        if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        date_default_timezone_set('America/Santiago');
        $fecha = date("Y-m-d");  
       $transact = $_GET["transact"];       
       $row = $this->_index->getComanda($transact);
       $propina = $row['ST12total'] * 0.1;
       $this->_view->assign('propina', $propina);
       $this->_view->assign('cositas', $this->_index->getTabla($transact));
       $this->_view->assign('comanda', $this->_index->getComanda($transact));
       $this->_view->assign('trans', $transact);         
        $this->_view->renderizar('show','visual');
    }

    public function getTransactEspera(){    
        echo json_encode($this->_index->getAct(0));
    }

    public function setListo(){
        $a1 = $_GET['transact'];
        $a2 = $_GET['producto'];
        echo json_encode($this->_index->setListo($a1,$a2));
    }  

    public function setTransListo(){
        $a1 = $_GET['transact'];        
        echo json_encode($this->_index->setTransListo($a1));
    } 

    public function setProdListo(){
        $transact = $_GET['transact'];
        $id = $_GET['producto'];
        $this->_index->setProdListo($transact, $id);
    }
}