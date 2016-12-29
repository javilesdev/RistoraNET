<?php

class indexController extends posController
{
      
    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');
        $this->_acl->acceso('pos_use');  
                $this->_pdf = new TCPDF;       
    }
    
    public function index()
    {
        
        date_default_timezone_set('America/Santiago');
        $fecha = date("Y-m-d");
        $fechahora = date("Y-m-d H:i:s");        
        $activo = $this->_index->verificarActivopos($fecha);
        $fecha = date("Y-m-d");
        $fechahora = date("Y-m-d H:i:s"); 

        if($this->getInt('iniciar') == 1){            
            $this->_view->assign('datos', $_POST);
            if($activo['inicio']==$fecha){
                $this->redireccionar('pos/index');                
            }
            if($activo['termino']==$fecha){
                $this->redireccionar('pos/index');
            }
            $inicial = $this->getInt('inicial');            
            $usuario = Session::get('id_usuario');
            $fecha = date("Y-m-d");
            $fechahora = date("Y-m-d H:i:s"); 
            $this->_index->iniciarCaja($inicial,$usuario,$fecha,$fechahora);
            $this->redireccionar('pos/index');  
        }
        if($this->getInt('finalizar') == 1){            
            $this->_view->assign('datos', $_POST);
            $change = $this->_index->getPostDay($fecha);
            $monto = $this->getInt('final');
            $inicial = $change['SNVG_C00103'];
            $observacion = $this->getPostParam('obs');
            $final = $monto - $change['SNVG_C00108'] ;
            $ganancia = $monto - $inicial;
            $this->_index->cerrarCaja($monto,$ganancia,$observacion,$fecha,$fechahora);
            
            $this->redireccionar('pos');            
        }
        if($this->getInt('retirar') == 1){            
            $this->_view->assign('datos', $_POST);      
            $change = $this->_index->getPostDay($fecha);
            $monto = $this->getInt('retiro');
            $actual = $change['SNVG_C00108'];
            $momentaneo = ($actual) - ($monto);
            $this->_index->retirarCaja($momentaneo,$fecha);
            $this->redireccionar('pos/index');
        }
        if(!$activo){
            $signal = "0";
        }elseif($activo['inicio']==$fecha){ 
                if($activo['termino']==$fecha){
                    $signal = "2";
                }else{
                    $signal = "1";
                }    
            }            
        
        $change = $this->_index->getPostDay($fecha);    

        $usuario = $change['SNVG_C00107'];
        if(isset($usuario)){
            $nomusu = $this->_index->getUsuarioNombre($usuario);            
        }
               
        $this->_view->assign('activo', $this->_index->getPostDay($fecha));                
        $this->_view->assign('fecha', $fecha);
        $this->_view->assign('espera', $this->_index->getAct(0));                
        $this->_view->assign('activa', $this->_index->getAct(1));
        $this->_view->assign('terminada', $this->_index->getTerminado());
        if(isset($nomusu)){
        $this->_view->assign('usuario', $nomusu);    
        }
        $this->_view->assign('signal', $signal);
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('index','management');
    }

    public function pagarse()
    {   $transact = $_GET["transact"];
        $row = $this->_index->getComanda($transact);
        $propina = $row['ST12total'] * 0.1;
        $vuelto = $row['ST12monto'] - $row['ST12total'];
        
        $this->_view->assign('propina', $propina);

        $row2 = $this->_index->getTabla($transact);
        
        if($this->getInt('pago') == 1){
        $this->datos = $_POST;
           $total = $row['ST12total'];
           $iva = $row['ST12iva'];
           $subtotal = $row['ST12subtotal'];
           $extra = $propina;
           $nom = $row['USUnom'];
           date_default_timezone_set('America/Santiago');
           $fecha = date("d-m-Y H:i:s");
           $caja = "DEBIAN001";
           $metodo = "Efectivo";
           $idusu = Session::get('id_usuario');           
           $this->_index->regTransact($row['codTran'],$fecha,$idusu,$subtotal,$iva,$extra,$total);
           $this->generarBoleta($total,$subtotal,$nom,$fecha,$caja,$metodo,$row2,$row,$transact,$propina,$iva);           
           
        }
       $transact = $_GET["transact"];       
       $row = $this->_index->getComanda($transact);
       $propina = $row['ST12total'] * 0.1;
       $this->_view->assign('propina', $propina);
       $this->_view->assign('vuelto', $vuelto);
       //echo '<pre>';print_r($this->_index->getComanda($transact));exit;
       $this->_view->assign('cositas', $this->_index->getTabla($transact));
       $this->_view->assign('comanda', $this->_index->getComanda($transact));
       $this->_view->assign('trans', $transact);  
        $this->_view->renderizar('pagarse','management');
    }

    public function comprobante(){
        $transact = $_GET["transact"];
        if($this->getInt('pago') == 1){
        $this->datos = $_POST;
        $row = $this->_index->getComanda($transact);
        $propina = $row['ST12total'] * 0.1;
        $vuelto = $row['ST12monto'] - $row['ST12total'];
        
        $this->_view->assign('propina', $propina);

        $row2 = $this->_index->getTabla($transact);

        $total = $row['ST12total'];
           $iva = $row['ST12iva'];
           $subtotal = $row['ST12subtotal'];
           $extra = $propina;
           $nom = $row['USUnom'];
           date_default_timezone_set('America/Santiago');
           $fecha = date("d-m-Y H:i:s");
           $fecha2 = date("Y-m-d");
           
           $caja = "DEBIAN001";
           $metodo = "Efectivo";
           $idusu = Session::get('id_usuario');
           $monto =  $row['ST12monto'];
           $this->_index->finalizar($transact,$idusu,$subtotal,$iva,$extra,$total,$monto,$fecha2);
           $this->redireccionar('pos');
        }        
        $this->_view->assign('transact', $transact);
        $this->_view->renderizar('comprobante','management');
    }   

        public function generarBoleta($transact){ 

        $row = $this->_index->getComanda($transact);

        $propina = $row['ST12total'] * 0.1;
        $vuelto = $row['ST12monto'] - $row['ST12total'];
        
        $this->_view->assign('propina', $propina);

        $row2 = $this->_index->getTabla($transact);

        $total = $row['ST12total'];
           $iva = $row['ST12iva'];
           $subtotal = $row['ST12subtotal'];
           $extra = $propina;
           $nom = $row['USUnom'];
           date_default_timezone_set('America/Santiago');
           $fecha = date("d-m-Y H:i:s");
           $caja = "DEBIAN001";
           $metodo = "Efectivo";
           $idusu = Session::get('id_usuario');

       $this->_pdf->AddPage();
       $this->_pdf->SetFont('Helvetica','B',13);
        $this->_pdf->Cell(0,0,'DELIZIARE S.A.',0,0,'L');
        $this->_pdf->Cell(0,0,'BOLETA DE VENTAS Y SERVICIOS.',0,1,'R');
        $this->_pdf->SetFont('Helvetica','',10);
        $this->_pdf->Cell(70,0,'R.U.T.: 75.029.193-6',0,1,'L');
        
        $this->_pdf->Cell(70,0,'GIRO: Restaurant.',0,0,'L');
        $this->_pdf->SetFont('Helvetica','B',13);
        $this->_pdf->Cell(70,0,'N° '.$transact,0,1,'R');
        $this->_pdf->SetFont('Helvetica','',10);
        $this->_pdf->Cell(70,0,'San Martin # 01928.',0,1,'L');
        $this->_pdf->Cell(70,0,'FONO: 2-498736',0,1,'L');
        $this->_pdf->Cell(70,0,'Rancagua.',0,1,'L');        
        $this->_pdf->SetFont('Helvetica','B',11);        
        $this->_pdf->Cell(40,10,"Nombre Cajero: ",0,0,'L');
        $this->_pdf->Cell(40,10,$nom,0,0,'');
        $this->_pdf->Cell(40,10,"COD Caja: ",0,0,'L');
        $this->_pdf->Cell(40,10,$caja,0,0,'');
        $this->_pdf->Cell(70,10,"Hora/Fecha: ",0,0,'R');
        $this->_pdf->Cell(0,10,$fecha,0,0,'R');
        $this->_pdf->Ln();        
        $w = array(20,100,25,25,25);
        
        $header = array('COD','Descr.','Cant','Monto.','Total');
        
        for($i=0;$i<count($header);$i++){
            $this->_pdf->Cell($w[$i],6,$header[$i],0,0,'L');
        }
        $this->_pdf->Line(10, 50, 210-10, 50);
        $this->_pdf->Line(10, 55, 210-10, 55);
        $this->_pdf->Ln();
        $tabla = $this->_index->getTabla($transact);
        foreach($tabla as $row){
            $this->_pdf->SetFont('Helvetica','B',7);
            $this->_pdf->Cell($w[0],0,$row['id_prod'],0,0,'C');
            $this->_pdf->SetFont('Helvetica','',8);
            $this->_pdf->Cell($w[1],0,$row['producto'],0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[2],0,$row['cant'],0,'LR');
            $this->_pdf->SetFont('Helvetica','',7);
            $this->_pdf->Cell($w[3],0,$row['precio'],0,0,'LR');
            $this->_pdf->Cell($w[4],0,$row['total'],0,0,'LR');
            $this->_pdf->Ln();                      
        }
        $this->_pdf->Ln();
        $this->_pdf->SetFont('Helvetica','B',10);
        $this->_pdf->Cell(160,0,'Subtotal: '.number_format($subtotal,0,'.','.'),0,1,'R');
        $this->_pdf->Cell(160,0,'IVA %19: '.number_format($iva,0,'.','.'),0,1,'R');
        $this->_pdf->Cell(1,0,'Metodo de pago: '. $metodo,0,0,'L');
        $this->_pdf->Cell(160,0,'Propina %10: '.number_format($propina,0,'.','.'),0,1,'R');
        $this->_pdf->SetFont('Helvetica','B',13);
        $this->_pdf->Cell(160,0,'TOTAL: '.number_format($total,0,'.','.'),0,1,'R');
        $this->_pdf->SetFont('Helvetica','B',10);
        $this->_pdf->Cell(0,0,'N° :                             BANCO:',0,0,'C');
        $titulo = "boleta_trans_".$transact;  
        $this->_pdf->Output(trim($titulo).'.pdf','I');
    }

        public function getTransact(){
        $transact = $_GET['transact'];
        echo json_encode($this->_index->getComanda($transact));
    }    
}