<?php

class inventarioController extends managementController
{
	private $_index;
    private $_pdf;
    public $__total;
    public $_perdida1;
    public $_perdida2;
    public $_perdida3;
    public $_ven;
    public $_mer;
    public $_otr;
    public $_man;
    public $_tar;
    public $_noc;
    public $_max;
      
    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');
        $this->_conta = $this->loadModel('conta');
        $this->_pdf = new TCPDF;        
    }
    
    public function index()
    {
        if($this->getInt('ingresar') == 1){
            $this->_view->assign('datos', $_POST);
            $prod = $this->getPostParam('producto');
            $marc = $this->getPostParam('marca');
            $form = $this->getAlphaNum('formato');
            $cost = (int) $this->getAlphaNum('coste');
            $cant = (int) $this->getAlphaNum('cant');
            $total = $cost * $cant;            
            $this->_index->insertProd($prod,$marc,$form,$cant,$cost,$total);
            
            $this->_view->assign('datos', false);            
            $this->_view->assign('_mensaje', '<h3>Suceso Exitoso!</h3>Registro Completado.'); 
        }
        if($this->getInt('actualizar') == 1){
            $this->_view->assign('datos', $_POST);
        $inventario = $this->_index->getInv();
        $countinv = count($inventario);        
        for($i=0;$i<$countinv;$i++){
            $dif = 0;
           $ant = $inventario[$i]['Cantidad'];
            $act = $this->getAlphaNum('act'.$inventario[$i]['COD']);
            $cod = $inventario[$i]['COD'];
            $obs = $this->getAlphaNum('obs'.$inventario[$i]['COD']);
            if($ant>$act){
                $dif = $ant - $act;                
            }
            if($this->getAlphaNum('obs'.$inventario[$i]['COD'])==1){                
                $this->_mer += $dif * $inventario[$i]['Coste'];
                
            }elseif($this->getAlphaNum('obs'.$inventario[$i]['COD'])==2){                
                $this->_ven += $dif * $inventario[$i]['Coste'];                                
            }elseif($this->getAlphaNum('obs'.$inventario[$i]['COD'])==3){                
                $this->_otr += $dif * $inventario[$i]['Coste'];                                
            }           
            
         if(!$this->getAlphaNum('act'.$inventario[$i]['COD'])==0){
           $this->_index->actCant($cod,$act);
          }
        }
        
        $this->_total = $this->_mer + $this->_ven +$this->_otr;        
       $this->generarInventario($this->_mer, $this->_ven, $this->_otr, $this->_total);
       
       $this->_view->assign('datos', false);            
       $this->_view->assign('_mensaje', '<h3>Suceso Exitoso!</h3>Actualizacion Completada.'); 
        }
        
        $this->_view->assign('productos', $this->_index->getInv());        
        $this->_view->assign('titulo', 'Inventario');        
        $this->_view->renderizar('index','inventario');
    }
    
    

    public function generarReporte(){
        
        $this->_pdf->AddPage();
        $this->Header();          
        $this->_pdf->SetFont('Helvetica','B',9);
        $w = array(9,65,25,13,13,17,22,17);
        $pro = $this->_index->getInv();
        $header = array('COD','Descr.','Marca','Form.','Exist.','Cost. Uni.','Cant. Rev.','Observ.');
        $this->_pdf->Line(10, 71, 210-10, 71);
        $this->_pdf->Line(10, 75, 210-10, 75);
        $this->_pdf->Ln();
        for($i=0;$i<count($header);$i++){
            $this->_pdf->Cell($w[$i],6,$header[$i],0,0,'L');
        }
        
        $this->_pdf->Ln();
        
        foreach($pro as $row){
            $this->_pdf->SetFont('Helvetica','B',7);
            $this->_pdf->Cell($w[0],0,$row['COD'],0,0,'C');
            $this->_pdf->SetFont('Helvetica','',8);
            $this->_pdf->Cell($w[1],0,$row['Producto'],0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[2],0,$row['Marca'],0,'LR');
            $this->_pdf->SetFont('Helvetica','',7);
            $this->_pdf->Cell($w[3],0,$row['Formato'],0,0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[4],0,$row['Cantidad'],0,0,'LR');
            $this->_pdf->SetFont('Helvetica','',7);
            $this->_pdf->Cell($w[5],0,'$ ' . number_format($row['Coste'],0,'.','.'),0,'LR');
            $this->_pdf->Cell($w[6],0,'',1,0,'LR');
            $this->_pdf->Cell($w[7],0,$this->_pdf->writeHTML('<input type="checkbox" name="agree" value="1"/><label for="agree">ME</label><input type="checkbox" name="agree" value="1"/><label for="agree">VEN</label><input type="checkbox" name="agree" value="1"/><label for="agree">OTRO</label>',0,0),0,0,'LR');
            $this->_pdf->Ln();
                      
        }        
       
        $this->_pdf->Ln();$this->_pdf->Ln();
        $this->_pdf->Cell(140,10,"ME: Merma - VEN: Vencido",0,0,'R');
        $this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();     
        $this->_pdf->Cell(10,0,"",0,0,'L');
        $this->_pdf->SetFont('Helvetica','B',10);
        $this->_pdf->Cell(10,0,"__________________________",0,0,'L');
        $this->_pdf->Cell(150,0,"__________________________",0,1,'R');
        $this->_pdf->Cell(10,0,"",0,0,'L');        
        $this->_pdf->Cell(10,0,"Firma de Gerente/Sub-Gerente",0,0,'L');
        $this->_pdf->Cell(10,0,"",0,0,'R');        
        
        $this->_pdf->Cell(10,0,"",0,0,'L');        
        $this->_pdf->Cell(124,0,"Firma Revisor a Cargo",0,0,'R');
        $this->_pdf->LastPage();
        $this->_pdf->Output();
        
    }    
    
    
            
    function Header(){
        $usu = Session::get('usuario');
        $usuario = $this->_index->getNombre($usu);
        $usuario = $usuario['nombre'];          
        date_default_timezone_set('America/Santiago');
        $lunes = date('d-m-Y', strtotime('Last Monday', time()));
        $dom = date('d-m-Y', strtotime('Next Sunday', time()));
        $fecha = date("d-m-Y H:i:s");
        $logo = ROOT . DS . 'public' . DS . 'deliziare_5.png';
        $this->_pdf->SetFont('Helvetica','B',20);
        $this->_pdf->Cell(30,25,'',0,0,'C');
        $this->_pdf->Cell(130,27,'Reporte de Stock - Revision',0,0,'C',$this->_pdf->Image($logo,12,10,30));
        $this->_pdf->SetFont('Helvetica','B',11);
        $this->_pdf->SetY(50);
        $this->_pdf->Cell(40,10,"Revision a Cargo de: ",0,0,'L');
        $this->_pdf->Cell(40,10,$usuario,0,0,'');
        $this->_pdf->Cell(70,10,"Hora/Fecha: ",0,0,'R');
        $this->_pdf->Cell(0,10,$fecha,0,0,'R');
        $this->_pdf->Ln();
        $this->_pdf->Cell(80,10,"Revision Semanal: ".$lunes." Al " .$dom,0,0,'L');        
        $this->_pdf->Line(10, 45, 210-10, 45);
        
    }
    
    ////////////////////////////////////////////////////////////////////////////
    
    public function generarInventario($merma, $venc, $otro, $total){              
        
        
        $this->_pdf->AddPage();
        $this->Header2();          
        $this->_pdf->SetFont('Helvetica','B',9);
        $w = array(9,65,25,13,13,17,22,17);
        $pro = $this->_index->getInv();
        $header = array('COD','Descr.','Marca','Form.','Exist.','Cost. Uni.','Total');
        $this->_pdf->Line(10, 71, 210-10, 71);
        $this->_pdf->Line(10, 75, 210-10, 75);
        $this->_pdf->Ln();
        for($i=0;$i<count($header);$i++){
            $this->_pdf->Cell($w[$i],6,$header[$i],0,0,'L');
        }
        
        $this->_pdf->Ln();
        
        foreach($pro as $row){
            $this->_pdf->SetFont('Helvetica','B',7);
            $this->_pdf->Cell($w[0],0,$row['COD'],0,0,'C');
            $this->_pdf->SetFont('Helvetica','',8);
            $this->_pdf->Cell($w[1],0,$row['Producto'],0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[2],0,$row['Marca'],0,'LR');
            $this->_pdf->SetFont('Helvetica','',7);
            $this->_pdf->Cell($w[3],0,$row['Formato'],0,0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[4],0,$row['Cantidad'],0,0,'LR');
            $this->_pdf->SetFont('Helvetica','',7);
            $this->_pdf->Cell($w[5],0,'$ ' . number_format($row['Coste'],0,'.','.'),0,'LR');
            $this->_pdf->Cell($w[6],0,'$ ' . number_format($row['Total'],0,'.','.'),0,'LR');
            $this->_pdf->Ln();
                      
        }        
       
        $this->_pdf->Ln();$this->_pdf->Ln();
        $this->_pdf->Cell(140,10,"ME: Merma - VEN: Vencido",0,0,'R');        
        $this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();
        $this->_pdf->SetTextColor(0,0,0);
        $this->_pdf->SetFont('Helvetica','B',13);        
        $this->_pdf->Cell(150,0,"Detalle de Informe:",0,1,'R');
        $this->_pdf->SetFont('Helvetica','B',12);        
        $this->_pdf->Cell(160,0,"Merma: $ " .number_format($merma,0,'.','.'),0,1,'R');
        $this->_pdf->Cell(160,0,"Vencido: $ " .number_format($venc,0,'.','.'),0,1,'R');
        $this->_pdf->Cell(160,0,"Otro: $ " .number_format($otro,0,'.','.'),0,1,'R');
        $this->_pdf->SetTextColor(255,0,0);
        $this->_pdf->SetFont('Helvetica','B',16);
        $this->_pdf->Cell(160,0,"TOTAL: $ " .number_format($total,0,'.','.'),0,0,'R');
        
        $this->_pdf->SetTextColor(0,0,0);
        $this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();$this->_pdf->Ln();
        
        $this->_pdf->SetFont('Helvetica','B',10);
        $this->_pdf->Cell(70,0,"",0,0,'L');        
        $this->_pdf->Cell(0,0,"__________________________",0,1,'L');
        
        $this->_pdf->Cell(70,0,"",0,0,'L');        
        $this->_pdf->Cell(0,0,"Firma de Gerente/Sub-Gerente",0,0,'L');
        $this->_pdf->Cell(10,0,"",0,0,'R');       
        $this->_pdf->LastPage();
        $fecha = date("d-m-Y");        
        $titulo = "report_inv-".$fecha;
        $this->_pdf->Output(trim($titulo).'.pdf','D');        
    }
 
    function Header2(){
        $usu = Session::get('usuario');
        $usuario = $this->_index->getNombre($usu);
        $usuario = $usuario['nombre'];          
        date_default_timezone_set('America/Santiago');
        $lunes = date('d-m-Y', strtotime('Last Monday', time()));
        $dom = date('d-m-Y', strtotime('Next Sunday', time()));
        $fecha = date("d-m-Y H:i:s");
        $logo = ROOT . DS . 'public' . DS . 'deliziare_5.png';
        $this->_pdf->SetFont('Helvetica','B',20);
        $this->_pdf->Cell(30,25,'',0,0,'C');
        $this->_pdf->Cell(130,27,'Reporte de Stock Inventario',0,0,'C',$this->_pdf->Image($logo,12,10,30));
        $this->_pdf->SetFont('Helvetica','B',11);
        $this->_pdf->SetY(50);
        $this->_pdf->Cell(40,10,"Revision a Cargo de: ",0,0,'L');
        $this->_pdf->Cell(40,10,$usuario,0,0,'');
        $this->_pdf->Cell(70,10,"Hora/Fecha: ",0,0,'R');
        $this->_pdf->Cell(0,10,$fecha,0,0,'R');
        $this->_pdf->Ln();
        $this->_pdf->Cell(80,10,"Revision Semanal: ".$lunes." Al " .$dom,0,0,'L');        
        $this->_pdf->Line(10, 45, 210-10, 45);
       }
       
       
       
       public function proveedor(){
           $this->_view->setJsPlugin(array('jquery.dataTables.min'));
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            echo $this->getAlphaNum('email');exit;
        }
           $this->_view->renderizar('proveedor','inventario');
       }
}