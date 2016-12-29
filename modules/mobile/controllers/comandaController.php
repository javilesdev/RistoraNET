<?php

class comandaController extends mobileController
{
      
    private $_index;
    

     public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');
        $this->_view->setJsPlugin(array('jquery.json'));        
    }
    
	public function index()
    {
        
        $this->_view->assign('titulo', 'Comanda');        
        $this->_view->renderizar('catalogo','comanda');
    }

    public function catalogo()        
    {   

        $mesa = $_GET["mesa"];
        $seccion = $_GET["seccion"];
        $capacidad = $_GET["capacidad"];
        $id_usuario = Session::get('id_usuario');
        $respaldo = array();
        $modelo = $this->_index->verificarMesa($mesa,$seccion);       
        if($modelo[2]==0){            
            a:
            $token = rand(1000000000, 9999999999);            
            
            $key =  $this->_index->verificarTransaccion($token);
            
            if($key){                                
                goto a;              
            }                                
            $this->_index->setOcupado($mesa,$seccion,$token,$id_usuario);
        }
        $codTrans =  $this->_index->getTransaccion($mesa, $seccion);              

        
        
       $totales = [];
       $subtotal = 0;
       $iva = 0;
       $propina = 0;
       
       $transact = "t_" . $codTrans['SNVG_C00104'];
       
       
        if(isset($_SESSION[$transact])){
           
            foreach($_SESSION[$transact] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                $subtotal += $totales[$id]['total'];
                $iva = $subtotal*0.19;
                
                $total = $subtotal + $iva;
                $propina = $total * 0.1;
                $total += $propina;
            }
        }        
        $this->_view->assign('mesa', $mesa);
        $this->_view->assign('seccion', $seccion);
        $this->_view->assign('capacidad', $capacidad);
        $this->_view->assign('trans', $codTrans);
        $this->_view->assign('titulo', 'Catalogo');        
        $this->_view->renderizar('catalogo','comanda');
    }

    public function update_catalogo($mesa, $seccion, $capacidad){
        $id_usuario = Session::get('id_usuario');
        $respaldo = array();
        $codTrans =  $this->_index->getTransaccion($mesa, $seccion);           
        $cod = $codTrans['SNVG_C00104'];
        
        
       $totales = [];
       $subtotal = 0;
       $iva = 0;
       $propina = 0;
        if(isset($_SESSION['t_'.$cod])){
           print_r($_SESSION['t_'.$cod]);
            foreach($_SESSION['t_'.$cod] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                $subtotal += $totales[$id]['total'];
                $iva = $subtotal*0.19;
                
                $total = $subtotal + $iva;
                $propina = $total * 0.1;
                $total += $propina;
            }
        }        
        $this->_view->assign('mesa', $mesa);
        $this->_view->assign('seccion', $seccion);
        $this->_view->assign('capacidad', $capacidad);
        $this->_view->assign('trans', $codTrans);
        $this->_view->assign('titulo', 'Catalogo');
        $this->_view->renderizar('update_catalogo','comanda');
    }    

    public function actualizar(){
       $transact = $_GET["transact"];       
       $row = $this->_index->getComanda($transact);
       $propina = $row['ST12total'] * 0.1;
       $this->_view->assign('propina', $propina);
       $this->_view->assign('cositas', $this->_index->getTabla($transact));
       $this->_view->assign('comanda', $this->_index->getComanda($transact));
       $this->_view->assign('trans', $transact);            
       $this->_view->renderizar('actualizar','comanda');
    }

    public function anular(){
        date_default_timezone_set('America/Santiago');
        $motivo = htmlspecialchars($_GET['motivo']);
        $transact = $_GET['transact'];
        $fecha = date('Y-m-d H:i:s');        
        $this->_index->anularTransaccion($transact,$fecha,$motivo);
        $this->redireccionar('mobile');
    }

    public function show(){
       $transact = $_GET["transact"];       
       $row = $this->_index->getComanda($transact);
       $propina = $row['ST12total'] * 0.1;
       $this->_view->assign('propina', $propina);
       $this->_view->assign('cositas', $this->_index->getTabla($transact));
       $this->_view->assign('comanda', $this->_index->getComanda($transact));
       $this->_view->assign('trans', $transact);           
       $this->_view->renderizar('show','comanda');
    }

    public function confirmar()        
    {
        $transact = $_GET["transact"];
        $mesa = $_GET["mesa"];
        $seccion = $_GET["seccion"];
        $capacidad = $_GET["capacidad"];
        $idusu = Session::get('id_usuario');
        $totales = array();
        $subtotal = 0;
        $total = 0;
        
       if(isset($_SESSION['t_'.$transact])){
            foreach($_SESSION['t_'.$transact] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                $subtotal += $totales[$id]['total'];
                $iva = $subtotal*0.19;
                $total = $subtotal + $iva;
                $propina = $total * 0.1;
            }
        }

        if($this->getInt('terminar') == 1){
        $this->datos = $_POST;
        $detalle = $_POST['detalle'];
                $this->_index->createTable($transact);                
                $mish='t_' . $transact;
                foreach($_SESSION[$mish] as $id => $cantidad){
                $prodCant = $totales[$id]['cantidad'];
                $prodPrecio = $totales[$id]['precio'];
                $prodTotal = $totales[$id]['total'];
                if(!$this->_index->existeTabla($id,$mish)>0){
                   $this->_index->insertarItem($id, $prodCant, $prodPrecio, $prodTotal, $mish);           
                }else{
                   $this->_index->updateItems($mish, $prodCant, $prodPrecio, $prodTotal, $id);
                }
                }
                if($this->_index->comprobarTransaction($transact)==false){
                //echo $transact . " " . $idusu . " " . $mesa . " " . $subtotal . " " . $iva . " " . $total . " " . $detalle . " " . $seccion;exit;    
                $this->_index->newTransact($transact, $idusu, $mesa, $subtotal, $iva, $total, $detalle, $seccion);
               
                }  else {
                    //echo $subtotal . ' ' . $iva . ' ' . $total . ' ' . $transact;exit; 
                    $this->_index->upTransact($subtotal, $iva, $total,$transact);
                }                
                
                $this->redireccionar('mobile');
        }
        

        $this->_view->assign('iva', $iva);
        $this->_view->assign('totales', $totales);
        $this->_view->assign('subtotal', $subtotal);
        $this->_view->assign('propina', $propina);
        $this->_view->assign('total', $total);
        $this->_view->assign('transact', $transact);
        $this->_view->assign('mesa', $mesa);
        $this->_view->assign('seccion', $seccion);
        $this->_view->assign('capacidad', $capacidad);
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('confirmar','comanda');
    }
    public function pagar(){
        $monto = $_GET['monto'];
        $modo = $_GET['modo'];
        $trans = $_GET['trans'];
        $this->_index->pagar($trans,$monto,$modo);
    }

    public function getCategoria(){
        echo json_encode($this->_index->getCategorias());
    }

    public function getProductos(){        
        if($this->getInt('categoria'))
        echo json_encode($this->_index->getProductos($this->getInt('categoria')));
    }



    public function cesta($codTrans, $idProducto, $accion){

        $codTrans = $this->filtrarInt($codTrans);
        $idProducto = $this->filtrarInt($idProducto);        
        $accion = (string) preg_replace('/[^A-Z_]/i', '', $accion);
         
        
        
        if(!$codTrans || !$idProducto || !$accion){
           
            $this->redireccionar('index/mesa');
        }       
        
        $transaccion = "t_" . $codTrans;
        
        switch($accion){
            case 'add':
                if(isset($_SESSION[$transaccion][$idProducto])){
                    $_SESSION[$transaccion][$idProducto]++;
                    /*if ($this->_index->beItem($codTrans, $idProducto)==TRUE){
                        $cant[$idProducto] = $this->_index->getCant($codTrans, $idProducto);
                        $cant[$idProducto] += 1;
                        $this->_index->addItem($codTrans, $idProducto, $cant[$idProducto]);
                    }*/
                }else{
                    $_SESSION[$transaccion][$idProducto] = 1;
                }
                break;
            case 'remove':
                if(isset($_SESSION[$transaccion][$idProducto])){
                    $_SESSION[$transaccion][$idProducto]--;
                    
                
                    if($_SESSION[$transaccion][$idProducto] == 0){                       
                       $totales = array();
                    $subtotal = 0;
                    $total = 0;
                    if(isset($_SESSION[$transaccion])){
            foreach($_SESSION[$transaccion] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                        $subtotal += $totales[$id]['total'];
                        $iva = $subtotal*0.19;
                        $total = $subtotal + $iva;
                        $propina = $total * 0.1;
                    }
                    }
                    
                    $idProd = $idProducto;

                              
                    $this->_index->removeId($transaccion, $idProd);
                    unset($_SESSION[$transaccion][$idProducto]);  
                    }
                    $totales = array();
                    $subtotal = 0;
                    $total = 0;
                    if(isset($_SESSION[$transaccion])){
            foreach($_SESSION[$transaccion] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                        $subtotal += $totales[$id]['total'];
                        $iva = $subtotal*0.19;
                        $total = $subtotal + $iva;
                        $propina = $total * 0.1;
                    }
                    }
                    foreach($_SESSION[$transaccion] as $id => $cantidad){
                        $prodCant = $totales[$id]['cantidad'];
                        $prodPrecio = $totales[$id]['precio'];
                        $prodTotal = $totales[$id]['total'];
                        $this->_index->updateItems($transaccion, $prodCant, $prodPrecio, $prodTotal, $id);
                    }
                }
                break;
            case 'delete':
                    $totales = array();
                    $subtotal = 0;
                    $total = 0;
                    if(isset($_SESSION[$transaccion])){
            foreach($_SESSION[$transaccion] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                        $subtotal += $totales[$id]['total'];
                        $iva = $subtotal*0.19;
                        $total = $subtotal + $iva;
                        $propina = $total * 0.1;
                    }
                    }
                    
                    $idProd = $idProducto;

                              
                    $this->_index->removeId($transaccion, $idProd);
                    unset($_SESSION[$transaccion][$idProducto]);                    
                break;
                
        }
        
        $totales = array();
        $total = 0;
        if(isset($_SESSION[$transaccion])){
            foreach($_SESSION[$transaccion] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                
                

                $total += $totales[$id]['total'];                
            }   
        }      
    }

    public function getTabla(){
        if($this->getInt('transact'))            
        $t = "t_" . $this->getInt('transact');    
        $totales = array();
        $total = 0;
        if(isset($_SESSION[$t])){
            foreach($_SESSION[$t] as $id => $cantidad){
                
                $totales[$id]['nombre'] = $this->_index->getNombreProducto($id);                
                $totales[$id]['precio'] = $this->_index->getPrecioProducto($id);
                
                $totales[$id]['cantidad'] = $cantidad;
                
                $totales[$id]['total'] = ($cantidad * (int) $totales[$id]['precio']);
                
                $totales[$id]['id_producto'] = $id;
                

                $total += $totales[$id]['total'];                
            }           
        }       
    $keys = array_keys($totales); 
    echo json_encode(array($totales,$total,$keys));
    }


    public function cesta_cookie($codTrans, $idProducto, $accion){
        $codTrans = $this->filtrarInt($codTrans);
        $idProducto = $this->filtrarInt($idProducto);        
        $accion = (string) preg_replace('/[^A-Z_]/i', '', $accion);
         
        
        
        if(!$codTrans || !$idProducto || !$accion){
           
            $this->redireccionar('index/mesa');
        }
        $transaccion = "t_" . $codTrans;


                switch($accion){
            case 'add':
                if(isset($_COOKIE[$transaccion][$idProducto])){
                    $_COOKIE[$transaccion][$idProducto]++;
                    /*if ($this->_index->beItem($codTrans, $idProducto)==TRUE){
                        $cant[$idProducto] = $this->_index->getCant($codTrans, $idProducto);
                        $cant[$idProducto] += 1;
                        $this->_index->addItem($codTrans, $idProducto, $cant[$idProducto]);
                    }*/
                }else{
                    $_COOKIE[$transaccion][$idProducto] = 1;
                }
                break;
            case 'remove':
                if(isset($_COOKIE[$transaccion][$idProducto])){
                    $_COOKIE[$transaccion][$idProducto]--;
                    if($_COOKIE[$transaccion][$idProducto] == 0){                    
                    unset($_COOKIE[$transaccion][$idProducto]);  
                    }          
                }
                break;
            case 'delete':                    
                    unset($_COOKIE[$transaccion][$idProducto]);                    
                break;
                
        }
        
        }

        public function cesta_a($codTrans, $idProducto, $accion){

        $codTrans = $this->filtrarInt($codTrans);
        $idProducto = $this->filtrarInt($idProducto);        
        $accion = (string) preg_replace('/[^A-Z_]/i', '', $accion);
         
        
        
        if(!$codTrans || !$idProducto || !$accion){
           
            $this->redireccionar('index/mesa');
        }       
        
        $transaccion = "t_" . $codTrans;
        
        switch($accion){
            case 'add':
                if(isset($_SESSION[$transaccion][$idProducto])){
                    $_SESSION[$transaccion][$idProducto]++;
                    /*if ($this->_index->beItem($codTrans, $idProducto)==TRUE){
                        $cant[$idProducto] = $this->_index->getCant($codTrans, $idProducto);
                        $cant[$idProducto] += 1;
                        $this->_index->addItem($codTrans, $idProducto, $cant[$idProducto]);
                    }*/
                }else{
                    $_SESSION[$transaccion][$idProducto] = 1;
                }
                break;
            case 'remove':
                if(isset($_SESSION[$transaccion][$idProducto])){
                    $_SESSION[$transaccion][$idProducto]--;
                    if($_SESSION[$transaccion][$idProducto] == 0){                    
                    unset($_SESSION[$transaccion][$idProducto]);  
                    }          
                }
                break;
            case 'delete':                    
                    unset($_SESSION[$transaccion][$idProducto]);                    
                break;
                
        }
    }

    public function setProdEntregado(){
        $transact = $_GET['transact'];
        $id = $_GET['producto'];
        $this->_index->setProductoEntregado($transact, $id);
    }
}