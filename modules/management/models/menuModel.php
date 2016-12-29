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
    
    public function getCategorias(){
        $usuarios = $this->_db->query("select * from menu_categorias;");        
        return $usuarios->fetchall();
    }
    
    public function getProducto()
    {
        $productos = $this->_db->query("select a.cod ,a.producto, a.precio, b.categoria, a.imagen from menu_productos a, menu_categorias b where b.cod = a.categoria;");
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
        $usuarios = $this->_db->query("select t2.id, t2.seccion from row_mesas AS t2;");        
        return $usuarios->fetchall();
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
}?>
