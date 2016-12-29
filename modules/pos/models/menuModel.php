<?php

class menuModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getMesas(){
        $mesas = $this->_db->query("select t1.SNVG_C00100, t1.SNVG_C00101, t1.SNVG_C00102 from snvg_ttable AS t1 order by  t1.SNVG_C00102, t1.SNVG_C00100 ,t1.SNVG_C00101 asc;");        
        $mesas->setFetchMode(PDO::FETCH_ASSOC);
        return $mesas->fetchall();
    }
    
    public function getCategorias(){
        $mesas = $this->_db->query("select * from menu_categorias;");        
        $mesas->setFetchMode(PDO::FETCH_ASSOC);
        return $mesas->fetchall();
    }
    
    public function getProductos($categoria)
    {
        
        $productos = $this->_db->query("select * from menu_productos where categoria=$categoria;");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }

    public function finalizar($transact,$camarero,$neto,$iva,$extra,$total,$monto,$fecha){
         $this->_db->prepare("INSERT INTO snvg_ttslog VALUES (null,:tran, now(), :codusu, :neto, :iva, :extra,:total, 0, '', :monto, 1)")
                ->execute(
                        array(
                            ':tran' => $transact,
                            ':codusu' => $camarero,
                            ':neto' => $neto,                            
                            ':extra' => $extra,
                            ':iva' => $iva,
                            ':total' => $total,
                            ':monto' => $monto                            
                        ));
        $this->_db->query("update snvg_tclog set SNVG_C00108=(SNVG_C00108+$total) where date(SNVG_C00102)='$fecha';");        
        $this->_db->query("drop table t_$transact;");
        $this->_db->query("delete from snvg_tt012 where SNVG_C00101=$transact;");
        $this->_db->query("update snvg_ttable set SNVG_C00102=0, SNVG_C00104=0, SNVG_C00105=0 where SNVG_C00104=$transact;");
    }
    
    public function comprobarTransaction($trans){
        $transact = $this->_db->query(
                "select SNVG_C00101 from snvg_tt012 where SNVG_C00101 = $trans;"
                );        
        if($transact->fetch()){
            return true;
        }
        return false;
        
    }
    
    public function getUltimo(){
        $transact = $this->_db->query("select SNVG_C00101 from snvg_ttslog ORDER BY SNVG_C00101 DESC;");
        $transact = $transact->fetch(PDO::FETCH_ASSOC);
        return $transact['SNVG_C00101'];
    }
    
    public function getUltimoActive(){
        $transact = $this->_db->query("select SNVG_C00101 from snvg_tt012 ORDER BY SNVG_C00101 DESC;");
        $transact = $transact->fetch(PDO::FETCH_ASSOC);
        return $transact['SNVG_C00101'];
    }
    
    
    public function comprobarTransactionMesa($trans){
        $transact = $this->_db->query(
                "select SNVG_C00101 from snvg_ttable where SNVG_C00104 = $trans;"
                );        
        if($transact->fetch()){
            return true;
        }
        return false;
    }
    
    public function comprobarMesa($mesa,$seccion){
        $estado = $this->_db->query("select SNVG_C00102 from snvg_ttable where SNVG_C00100=$mesa and SNVG_C00101='$seccion'");
        $estado = $estado->fetch(PDO::FETCH_ASSOC);
        return $estado['SNVG_C00102'];
    }
    
    public function setOcupado($mesa,$seccion,$transac,$id){
        $this->_db->query("update snvg_ttable set SNVG_C00102=1, SNVG_C00104=$transac, SNVG_C00105=$id where SNVG_C00100=$mesa and SNVG_C00101='$seccion';");
    }
    
    public function getEstado($mesa,$seccion){
        $tr = $this->_db->query(
                "select SNVG_C00102 from snvg_ttable where SNVG_C00100 = $mesa and SNVG_C00101 = '$seccion';"
                );        
        $tr = $tr->fetch(PDO::FETCH_ASSOC);
        return $tr['SNVG_C00102'];
    }
    
    public function existeProducto($idProducto)
    {
         $productos = $this->_db->query(
                "SELECT COUNT(*) AS cn FROM menu_productos WhERE cod = $idProducto;"
                );
        
        $productos = $productos->fetch(PDO::FETCH_ASSOC);
        
        if($productos['cn'] > 0){
           return true; 
        }
        
        return false;
    }
    
    
   
    
     public function getPrecioProducto($idProducto)
    {
        $producto = $this->_db->query("SELECT precio FROM menu_productos WHERE `cod` = $idProducto");
        $producto = $producto->fetch(PDO::FETCH_ASSOC);
        
        return $producto['precio'];
    }
    
    public function getNombreProducto($idProducto)
    {
        $producto = $this->_db->query("SELECT `producto` FROM menu_productos WHERE `cod`= $idProducto");
        $producto = $producto->fetch(PDO::FETCH_ASSOC);        
        return $producto['producto'];
    }
    
    public function getTransact($mesa,$seccion){
        $transact = $this->_db->query("select SNVG_C00104 from snvg_ttable where SNVG_C00100=$mesa and SNVG_C00101='$seccion'");
        $transact = $transact->fetch(PDO::FETCH_ASSOC);
        return $transact['SNVG_C00104'];
    }
    
    public function getTransactd($mesa,$seccion){
        $transact = $this->_db->query("select * from snvg_tt012 where SNVG_C00105=$mesa and SNVG_C00112='$seccion'");
        $transact = $transact->fetch(PDO::FETCH_ASSOC);
        return $transact;
    }
    
    public function existeTabla($id, $mish){    
        $productos = $this->_db->query("SELECT cant FROM ". $mish ." where id_prod = '$id';");        
        $productos = $productos->fetch();
        return $productos['cant'];
    }
    
    public function newTransact($codtransact, $idusuario, $codmesa, $subtotal, $iva, $total, $comentario, $seccion){
        $this->_db->prepare("INSERT INTO snvg_tt012 VALUES (:tran, now(), now(), :codusu, :codmes, :tabtran, 1, :sub, :iva, :tot, :com, :sec)")
                ->execute(
                        array(
                            ':tran' => $codtransact,
                            ':codusu' => $idusuario,
                            ':codmes' => $codmesa,
                            ':tabtran' => 'trans_'.$codtransact,
                            ':sub' => $subtotal,
                            ':iva' => $iva,
                            ':tot' => $total,
                            ':com' => $comentario,
                            ':sec' => $seccion                            
                        ));
    }
    
    public function upTransact($sub, $iva, $total, $trans){
        $this->_db->query("UPDATE snvg_tt012 SET SNVG_C00108=$sub, SNVG_C00109=$iva, SNVG_C00110=$total WHERE SNVG_C00100=$trans;");
    }
    
    public function getAct($estado){
        $tran = $this->_db->query("SELECT ST12.SNVG_C00101 AS codTran, 
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
  ST12.SNVG_C00107=$estado ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetchall();
    }


        public function getTerminado(){
        $tran = $this->_db->query("SELECT ST12.SNVG_C00101 AS codTran, 
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
  ST12.SNVG_C00113 AS ST12monto,
  ST12.SNVG_C00114 AS ST12modo,
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
  ST12.SNVG_C00107=2 ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetchall();
    }
    
    
    public function beItem($trans, $id){
        $transact = $this->_db->query(
                "select * from trans_$trans where id_prod = $id;"
        );   
        if($transact->fetch()){
            return true;
        }
        return false;
    }
    
    public function getCant($trans, $id){
        $transact = $this->_db->query(
                "select cant from trans_$trans where id_prod = $id;"
        );   
        $transact = $transact->setFetchMode(PDO::FETCH_ASSOC);
        return $transact['cant'];
    }
    
    public function addItem($trans, $id, $cant){
        $this->_db->query(
                "UPDATE trans_$trans SET cant=$cant where id_prod = $id;"
        );
        
    }


    public function getRoles()
    {
        $roles = $this->_db->query("SELECT * FROM roles");
        
        return $roles->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getComanda($transact){
        $tran = $this->_db->query("SELECT ST12.SNVG_C00101 AS codTran, 
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
  ST12.SNVG_C00113 AS ST12monto,
  ST12.SNVG_C00114 AS ST12modo,
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
  ST12.SNVG_C00104=USU.id AND ST12.SNVG_C00101=$transact ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetch();
    }
    
    
    
    public function getTabla($transact){
        $productos = $this->_db->query("SELECT p.producto, q.id_prod, q.cant,q.precio,q.total, q.estado FROM `menu_productos` as p, `t_$transact` as q where p.cod=q.id_prod");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }
    
    
    public function setReadyState($transact,$id){
        $this->_db->query("UPDATE trans_$transact set estado=1 where id_prod=$id;");
        
    }


    public function verificarActivopos($fecha)
    {
        $activo = $this->_db->query(
                "select * from snvg_pos where inicio = '$fecha';"
                );
        $activo = $activo->fetch(PDO::FETCH_ASSOC);
        return $activo;
    }

    public function iniciarCaja($monto,$usuario,$fecha1,$fecha2)
    {
        $this->_db->query("INSERT INTO snvg_tclog VALUES(null,'$fecha2',$monto,null,null,null,$usuario,$monto,null);");
        $this->_db->query("INSERT INTO snvg_pos VALUES('$fecha1',null);");
    }

    public function getUsuarioNombre($id){
        $activo = $this->_db->query(
                "select nombre from usuarios where id = $id;"
                );
        $activo = $activo->fetch(PDO::FETCH_ASSOC);
        return $activo;
    }

    public function getPostDay($fecha){
        $activo = $this->_db->query(
                "select * from snvg_tclog where date(SNVG_C00102) = '$fecha';"
                );
        $activo = $activo->fetch(PDO::FETCH_ASSOC);
        return $activo;
    }

    public function retirarCaja($monto,$fecha)
    {
        $this->_db->query("UPDATE snvg_tclog SET SNVG_C00108=$monto where date(SNVG_C00102)='$fecha';");
        
    }

     public function cerrarCaja($final,$ganancia,$obs,$fecha,$fechahora)
    {
        $this->_db->query("UPDATE snvg_tclog SET SNVG_C00104='$fechahora', SNVG_C00105=$final, SNVG_C00106=$ganancia,SNVG_C00109='$obs' where date(SNVG_C00102)='$fecha';");
        $this->_db->query("UPDATE snvg_pos SET termino='$fecha' where inicio='$fecha';");
        
    }

            public function regTransact($a1,$fecha,$usu,$mneto,$miva,$mext,$mtotal){
        
        $this->_db->prepare("INSERT INTO snvg_ttslog VALUES (null,:a1,:fecha,:usu,:mneto,:miva,:mext,:mtotal,0,null,null,null)")
                ->execute(
                        array(
                            ':a1' => $a1,                           
                            ':usu' => $usu,
                            ':fecha' => $fecha,
                            ':mneto' => $mneto,
                            ':miva' => $miva,
                            ':mext' => $mext,
                            ':mtotal' => $mtotal                          
                        ));
    }
}
