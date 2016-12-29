<?php

class contabilidadController extends managementController
{
      
    public function __construct() 
    {
        parent::__construct();       
        $this->_index = $this->loadModel('conta');
        $this->_pdf = new TCPDF; 
    }
    
    public function index()
    {
        
        $this->_view->assign('titulo', 'Contabilidad');        
        $this->_view->renderizar('index','management');
    }

    public function ventas()
    {       		
    	$this->_view->assign('boletas',$this->_index->getVentas());
        $this->_view->setJsPlugin(array('morris.min','morris-chart-settings.min','raphael.min'));
        $this->_view->assign('titulo', 'Ventas');        
        $this->_view->renderizar('ventas','management');
    }

        public function getBoletas(){    
        echo json_encode($this->_index->getVentas1());
    }

    public function getReporte(){
    	$fecha1 = $_GET['date1'];
        $fecha2 = $_GET['date2'];
        $this->generarReporte1($fecha1,$fecha2);
    }

    public function generarReporte1($fecha1,$fecha2){
       
       $pro = $this->_index->getVentasRango($fecha1,$fecha2);

        $this->_pdf->AddPage();
        $this->Header();          
        $this->_pdf->SetFont('Helvetica','B',9);
        $w = array(20,36,30,23,23,23,23);
        
        $header = array('Folio','Fecha/Hora','Encargado','Neto','IVA','Extras','TOTAL');
        $this->_pdf->Line(10, 71, 210-10, 71);
        $this->_pdf->Line(10, 75, 210-10, 75);
        $this->_pdf->Ln();
        for($i=0;$i<count($header);$i++){
            $this->_pdf->Cell($w[$i],6,$header[$i],0,0,'L');
        }
        
        $this->_pdf->Ln();
        
        foreach($pro as $row){
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[0],0,$row['folio'],0,0,'C');
            $this->_pdf->SetFont('Helvetica','',9);
            $this->_pdf->Cell($w[1],0,$row['fecha'],0,'LR');
            $this->_pdf->SetFont('Helvetica','',9);
            $this->_pdf->Cell($w[2],0,$row['nombre'],0,'LR');
            $this->_pdf->SetFont('Helvetica','',9);
            $this->_pdf->Cell($w[3],0,'$ ' .number_format($row['neto'],0,'.','.'),0,0,'LR');
            $this->_pdf->SetFont('Helvetica','',9);
            $this->_pdf->Cell($w[4],0,'$ ' .number_format($row['iva'],0,'.','.'),0,0,'LR');
            
            $this->_pdf->Cell($w[5],0,'$ ' . number_format($row['pro'],0,'.','.'),0,'LR');
            $this->_pdf->SetFont('Helvetica','B',9);
            $this->_pdf->Cell($w[6],0,'$ ' . number_format($row['total'],0,'.','.'),0,0,'LR');            
            $this->_pdf->Ln();
                      
        }        
       
        $this->_pdf->Ln();$this->_pdf->Ln();
        
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
        $this->_pdf->Cell(130,27,'Reporte de Boletas - Revision',0,0,'C',$this->_pdf->Image($logo,12,10,30));
        $this->_pdf->SetFont('Helvetica','B',11);
        $this->_pdf->SetY(50);
        $this->_pdf->Cell(40,10,"Revision a Cargo de: ",0,0,'L');
        $this->_pdf->Cell(40,10,$usuario,0,0,'');
        $this->_pdf->Cell(70,10,"Hora/Fecha: ",0,0,'R');
        $this->_pdf->Cell(0,10,$fecha,0,0,'R');
        $this->_pdf->Ln();
        
    }

}