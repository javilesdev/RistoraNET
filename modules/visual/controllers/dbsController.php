<?php

class dbsController extends visualController
{
      
    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');            
    }

    public function index(){}
    
    public function mish(){   	 
    	$estado = 0;    	
    	 echo json_encode($this->_index->getAct($estado));    	   	
    }

   
}