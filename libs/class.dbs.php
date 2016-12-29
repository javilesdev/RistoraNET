<?php
class dbs extends PDO{
	public function __construct($host, $dbname, $user, $pass, $char) {
        parent::__construct(
                'mysql:host=' . $host .
                ';dbname=' . $dbname,
                $user, 
                $pass, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $char
                    ));
                
    }

    public function getTransactEspera(){    
        echo json_encode($this->getAct(0));
    }

  
public function getAct($estado){
  $tran = $this->_dbs->query("SELECT ST12.SNVG_C00101 AS codTran, 
  ST12.SNVG_C00102 AS ST12fecha, 
  ST12.SNVG_C00103 AS ST12hora, 
  ST12.SNVG_C00104 AS ST12codUsu, 
  ST12.SNVG_C00105 AS ST12codMesa, 
  ST12.SNVG_C00106 AS ST12tranCod, 
  ST12.SNVG_C00107 AS ST12estado, 
  ST12.SNVG_C00108 AS ST12subtotal, 
  ST12.SNVG_C00109 AS ST12iva, 
  ST12.SNVG_C00110 AS ST12total, 
  ST12.SNVG_C00111 AS ST12comen,
  ST12.SNVG_C00112 AS ST12secMesa,
  STTA.SNVG_C00100 AS STTcodMesa, 
  STTA.SNVG_C00101 AS STTsecMesa, 
  STTA.SNVG_C00102 AS STTestado, 
  STTA.SNVG_C00103 AS STTcap, 
  STTA.SNVG_C00104 AS STTtran, 
  STTA.SNVG_C00105 AS STTusu, 
  USU.id AS USUid,
  USU.nombre AS USUnom 
  FROM snvg_tt012 AS ST12, 
  snvg_ttable AS STTA,  
  usuarios AS USU 
  WHERE ST12.SNVG_C00101=STTA.SNVG_C00104 AND
  STTA.SNVG_C00104=ST12.SNVG_C00101 AND
  ST12.SNVG_C00104=USU.id AND
  ST12.SNVG_C00107={$estado} ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetchall();
    }

}