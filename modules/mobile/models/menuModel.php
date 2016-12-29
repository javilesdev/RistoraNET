<?php
class menuModel extends Model{
    public function __construct() {
        parent::__construct();
    }
          
    public function insertProd($producto, $marca, $formato, $cant, $coste, $total){
        $this->_db->prepare("INSERT INTO snvg_tt013 VALUES (null, :producto, :marca, :formato, :cant, :coste, :total, now())")
                ->execute(
                        array(
                           ':producto' => $producto,
                            ':marca' => $marca,
                            ':formato' => $formato,
                            ':cant' => $cant,
                            ':coste' => $coste,
                            ':total' => $total
                        ));
    }    

    public function existeTabla($id, $mish){    
        $productos = $this->_db->query("SELECT cant FROM ". $mish ." where id_prod = '$id';");        
        $productos = $productos->fetch();
        return $productos['cant'];
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

    public function createTable($trans){
        $this->_db->query("create table t_$trans("
                . "id_prod int,"
                . "cant int,"
                . "precio int,"
                . "total int,"
                . "espera int,"
                . "retirar int,"
                . "entregado int,"
                . "estado int);");
    }

    public function insertarItem($id, $prodCant, $prodPrecio, $prodTotal, $mish){
        $this->_db->query("INSERT into $mish values($id,$prodCant,$prodPrecio,$prodTotal,$prodCant,0,0,0);");
    }

    public function actuaItem($trans){
        $this->_db->query("UPDATE snvg_tt012 SET SNVG_C00108=$sub, SNVG_C00109=$iva, SNVG_C00110=$total WHERE SNVG_C00100=$trans;");
    }

    public function newTransact($transact, $idusuario, $codmesa, $subtotal, $iva, $total, $comentario, $seccion){
        
        $this->_db->prepare("INSERT INTO snvg_tt012 VALUES (:tran, now(), now(), :codusu, :codmes, :tabtran, 0, :sub, :iva, :tot, :com, :sec, null, null)")
                ->execute(
                        array(
                            ':tran' => $transact,
                            ':codusu' => $idusuario,
                            ':codmes' => $codmesa,
                            ':tabtran' => 't_'.$transact,
                            ':sub' => $subtotal,
                            ':iva' => $iva,
                            ':tot' => $total,
                            ':com' => $comentario,
                            ':sec' => $seccion                            
                        ));
    }
    
    public function upTransact($sub, $iva, $total, $trans){
        $this->_db->query("UPDATE snvg_tt012 SET SNVG_C00108=$sub, SNVG_C00109=$iva, SNVG_C00110=$total, SNVG_C00107=0 WHERE SNVG_C00101=$trans;");
    }
    
    public function getCategorias(){
        $categorias = $this->_db->query("select * from menu_categorias;");        
        return $categorias->fetchall();
    }
    
    public function getProductos($categoria)
    {
        $productos = $this->_db->query("select * from menu_productos where categoria=$categoria;");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }

    public function getProducto2()
    {
        $productos = $this->_db->query("select * from menu_productos;");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }

    public function getMenus()
    {
        $productos = $this->_db->query("select a.cod ,a.producto, a.precio, b.categoria, a.imagen, a.stock, a.nivel, a.descripcion from menu_productos a, menu_categorias b where b.cod = a.categoria and a.visible=1 order by a.cod asc;");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }
    
    public function getInv()
    {
        $productos = $this->_db->query("SELECT SNVG_C00COD AS COD, SNVG_C00101 AS Producto, SNVG_C00102 AS Marca, SNVG_C00103 AS Formato, SNVG_C00104 AS Cantidad, SNVG_C00105 AS Coste, SNVG_C00106 AS Total, SNVG_C00107 AS Ulog  FROM snvg_tt013 AS INV;");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }
    
    public function getSeccion(){
        $usuarios = $this->_db->query("select * from seccion_mesas;");        
        return $usuarios->fetchall();
    }
    
    public function getMesas(){
        $mesas = $this->_db->query("select t1.SNVG_C00100, t1.SNVG_C00101, t1.SNVG_C00102 from snvg_ttable AS t1 order by  t1.SNVG_C00102, t1.SNVG_C00100 ,t1.SNVG_C00101 asc;");        
        $mesas->setFetchMode(PDO::FETCH_ASSOC);
        return $mesas->fetchall();
    }
    
    
    public function insertCategoria($categoria)
    {
        $this->_db->prepare("INSERT INTO menu_categorias VALUES (null, :categoria)")
                ->execute(
                        array(
                           ':categoria' => $categoria
                        ));
    }
    
    public function insertMesa($seccion)
    {
        $this->_db->prepare("INSERT INTO row_mesas VALUES (null, 0, :seccion, null);")
                ->execute(
                        array(
                           ':seccion' => $seccion
                        ));
    }
    
    public function insertProducto($producto, $precio, $categoria, $imagen, $stock,$visible,$descripcion)
    {
        $this->_db->prepare("INSERT INTO menu_productos VALUES (null, :producto, :precio, :categoria, :imagen, :stock,2,1,:descripcion);")
                ->execute(
                        array(
                            ':producto' => $producto,
                            ':precio' => $precio,
                            ':categoria' => $categoria,
                            ':imagen' => $imagen,
                            ':stock' => $stock,
                            ':descripcion' => $descripcion                                                                              
                        ));
    }
    
    public function verificarMenu($categoria)
    {
        $id = $this->_db->query(
                "select id from categorias where categoria = '$categoria'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
    public function eliminarCategoria($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM categorias WHERE id = $id");
    }
    
    public function eliminarProducto($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM productos WHERE id = $id");
    }
    
    public function eliminarMesa($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM row_mesas WHERE id = $id");
    }
    
    public function getNombre($usuario){
        $usuarios = $this->_db->query("select nombre from usuarios where usuario='$usuario';");        
        return $usuarios->fetch();
    }
    
    public function actCant($id,$val)
    {
        $id = (int) $id;
        $val = (int) $val;
        $this->_db->query("UPDATE snvg_tt013 SET SNVG_C00104=$val, SNVG_C00107=now()  WHERE SNVG_C00COD=$id;");
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

    public function verificarMesa($cod, $categoria)
    {
        $id = $this->_db->query(
                "select SNVG_C00100, SNVG_C00101, SNVG_C00102, SNVG_C00104 from snvg_ttable where SNVG_C00100 = '$cod' and SNVG_C00101 = '$categoria'"
                );
        
        return $id->fetch();
    }

    public function verificarTransaccion($transact)
    {
        $id = $this->_db->query(
                "select SNVG_C00104 from snvg_ttable where SNVG_C00104 = $transact;"
                );
        $id = $id->fetch(PDO::FETCH_ASSOC);
        return $id;
    }

    public function setOcupado($mesa,$seccion,$transact,$id){
        $this->_db->query("update snvg_ttable set SNVG_C00102=1, SNVG_C00104=$transact, SNVG_C00105=$id where SNVG_C00100=$mesa and SNVG_C00101='$seccion';");
    }

    public function getTransaccion($mesa, $seccion){
        $row1 = $this->_db->query("select SNVG_C00104, SNVG_C00105 from snvg_ttable where SNVG_C00100 = $mesa and SNVG_C00101 = '$seccion';");        
        $row1->setFetchMode(PDO::FETCH_ASSOC);
        return $row1->fetch();
    }

    public function removeId($transact, $id){
        $this->_db->query("delete from $transact where id_prod=$id");
    }

    public function anularTransaccion($transact,$fecha, $motivo){
      $this->_db->query("delete from snvg_tt012 where SNVG_C00101=$transact");
      $this->_db->query("update snvg_ttable set SNVG_C00102=0, SNVG_C00104=0, SNVG_C00105=0 where SNVG_C00104=$transact");
      $this->_db->prepare("INSERT into snvg_ttslog values(NULL,:transact,:fecha,0,0,0,0,0,3,:motivo)")
          ->execute(
                        array(
                            ':transact' => $transact,
                            ':fecha' => $fecha,
                            ':motivo' => $motivo                       
                        ));
      $this->_db->query("drop table t_$transact;");
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
  ST12.SNVG_C00107={$estado} ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetchall();
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
  ST12.SNVG_C00107=0 OR ST12.SNVG_C00107=1 AND ST12.SNVG_C00101=$transact ORDER BY ST12.SNVG_C00102 AND ST12.SNVG_C00103 ASC;");        
        $tran->setFetchMode(PDO::FETCH_ASSOC);
        return $tran->fetch();
    }

    public function getTabla($transact){
        $productos = $this->_db->query("SELECT p.producto, q.id_prod, q.cant,q.precio,q.total, q.estado, q.espera, q.retirar, q.entregado FROM `menu_productos` as p, `t_$transact` as q where p.cod=q.id_prod");
        $productos->setFetchMode(PDO::FETCH_ASSOC);
        return $productos->fetchall();
    }

    public function updateItems($mish, $prodCant, $prodPrecio, $prodTotal, $id){
        $this->_db->query("update $mish set espera=espera+($prodCant-cant), cant=$prodCant, precio=$prodPrecio, total=$prodTotal where id_prod=$id;");
    }

        public function verificarActivopos($fecha)
    {
        $activo = $this->_db->query(
                "select * from snvg_pos where inicio = '$fecha';"
                );
        $activo = $activo->fetch(PDO::FETCH_ASSOC);
        return $activo;
    }

    public function pagar($trans, $monto, $medio){
      $this->_db->query("update snvg_tt012 set SNVG_C00107=2, SNVG_C00113=$monto, SNVG_C00114=$medio where SNVG_C00101=$trans;");
    }

    public function setProductoEntregado($a1,$a2){
        $tabla = 't_' . $a1;
        $this->_db->query("update $tabla set retirar=(retirar-1), entregado=(entregado+1) where id_prod=$a2;"); 
    }
}?>
