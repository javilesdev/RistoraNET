<?php

class contaModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUltimos(){
        $usuarios = $this->_db->query("SELECT usu.id AS id, usu.usuario AS usuario, usu.email AS email, usu.nombre AS nombre, usu.apellido AS apellido, usu.`fecha nacimiento` AS fc, usu.`estado civil` AS ec, usu.direccion AS direccion, usu.role AS idrol, usu.`area` AS dist, usu.`fecha registro` AS fr, usu.estado AS estado, rol.role AS rol FROM usuarios AS usu, roles AS rol WHERE usu.role=rol.id_role and usu.estado=1 order by usu.id DESC LIMIT 5;");        
        return $usuarios->fetchall();
    }

    public function getConsumidos(){
        $tendencia = $this->_db->query("SELECT tendencia.SNVG_C00101 AS codigo, tendencia.SNVG_C00102 AS man, tendencia.SNVG_C00103 AS tar, tendencia.SNVG_C00104 AS noc, product.producto AS producto, ABS(tendencia.SNVG_C00102+tendencia.SNVG_C00103+tendencia.SNVG_C00104) as total FROM snvg_ttprodt AS tendencia, menu_productos AS product, menu_categorias AS cat WHERE tendencia.SNVG_C00101=product.cod AND product.categoria=cat.cod order by total DESC LIMIT 5;");
        $tendencia->setFetchMode(PDO::FETCH_ASSOC);
        return $tendencia->fetchall();
    }

    public function getFacturas(){
        $facturas = $this->_db->query("select * from facturas;");        
        return $facturas->fetchall();
    }
    
    public function getProveedores(){
        $facturas = $this->_db->query("select * from conta_proveedores;");        
        return $facturas->fetchall();
    }   
    
    public function ingresarProveedor($empresa, $rut, $repre, $tel, $otele, $email, $direc, $ciudad){
        $this->_db->prepare(
                "insert into conta_proveedores values" .
                "(null, :empresa, :rut, :repre, :tel, :otele, :email, :direc, :ciudad)"
                )
                ->execute(array(
                    ':empresa' => $empresa,   
                    ':rut' => $rut,
                    ':repre' => $repre,
                    ':tel' => $tel,
                    ':otele' => $otele,
                    ':email' => $email,
                    ':direc' => $direc,
                    ':ciudad' =>  $ciudad
                ));
    }    
    
    public function ingresarFactura($cod,$fecha,$proveedor,$imagen){
        $this->_db->prepare(
                "insert into facturas values" .
                "(null, :cod, :fecha, :proveedor, :imagen)"
                )
                ->execute(array(
                    ':cod' => $cod,
                    ':fecha' => $fecha,
                    ':proveedor' => $proveedor,
                    ':imagen' => $imagen
                ));
    }
    
    public function getVentas(){
        $ventas = $this->_db->query("SELECT ventas.SNVG_C00101 AS folio,"
                . " date(ventas.SNVG_C00102) AS fecha,"
                . " ventas.SNVG_C00103 AS usu,"
                . " ventas.SNVG_C00104 AS neto,"
                . " ventas.SNVG_C00105 AS iva,"
                . " ventas.SNVG_C00106 AS pro,"
                . " ventas.SNVG_C00107 AS total"
                . " FROM snvg_ttslog AS ventas"
                . " WHERE ventas.SNVG_C00108 = 0"
                . " ORDER BY ventas.SNVG_C00102 DESC;");
        $ventas->setFetchMode(PDO::FETCH_ASSOC);
        return $ventas->fetchall();
    }

        public function getVentas1(){
        $ventas = $this->_db->query("SELECT ventas.SNVG_C00101 AS folio,"
                . " ventas.SNVG_C00102 AS fecha,"
                . " ventas.SNVG_C00103 AS usu,"
                . " ventas.SNVG_C00104 AS neto,"
                . " ventas.SNVG_C00105 AS iva,"
                . " ventas.SNVG_C00106 AS pro,"
                . " ventas.SNVG_C00107 AS total,"
                . " usu.nombre AS nombre"
                . " FROM snvg_ttslog AS ventas, usuarios AS usu"
                . " WHERE usu.id=ventas.SNVG_C00103 AND ventas.SNVG_C00108 = 0"
                . " ORDER BY ventas.SNVG_C00102 DESC;");
        $ventas->setFetchMode(PDO::FETCH_ASSOC);
        return $ventas->fetchall();
    }

    public function getVentasRango($fecha1,$fecha2){
        $ventas = $this->_db->query("SELECT ventas.SNVG_C00101 AS folio,"
                . " ventas.SNVG_C00102 AS fecha,"
                . " ventas.SNVG_C00103 AS usu,"
                . " ventas.SNVG_C00104 AS neto,"
                . " ventas.SNVG_C00105 AS iva,"
                . " ventas.SNVG_C00106 AS pro,"
                . " ventas.SNVG_C00107 AS total,"
                . " usu.nombre AS nombre"
                . " FROM snvg_ttslog AS ventas, usuarios AS usu"
                . " WHERE ventas.SNVG_C00103=usu.id AND ventas.SNVG_C00108 = 0 AND (date(ventas.SNVG_C00102) BETWEEN '".$fecha1."' AND '".$fecha2."')"
                . " ORDER BY ventas.SNVG_C00102 ASC;");
        $ventas->setFetchMode(PDO::FETCH_ASSOC);
        return $ventas->fetchall();
    }
    
    public function getVentasGraph(){
        $ventas = $this->_db->query("SELECT ventas.SNVG_C00104 AS fecha,"                
                . " ventas.SNVG_C00106 AS total"
                . " FROM snvg_tclog AS ventas"
                . " ORDER BY ventas.SNVG_C00104 ASC;");
        $ventas->setFetchMode(PDO::FETCH_ASSOC);
        return $ventas->fetchall();
    }
    
    public function getTendencia(){
        $tendencia = $this->_db->query("SELECT * FROM snvg_ttprodt AS tendencia, menu_productos AS product, menu_categorias AS cat WHERE tendencia.SNVG_C00101=product.cod AND product.categoria=cat.cod;");
        $tendencia->setFetchMode(PDO::FETCH_ASSOC);
        return $tendencia->fetchall();
    }
    
    public function getTendenciaGraph(){
        $tendencia = $this->_db->query("SELECT tendencia.SNVG_C00101 AS codigo, tendencia.SNVG_C00102 AS man, tendencia.SNVG_C00103 AS tar, tendencia.SNVG_C00104 AS noc, product.producto AS producto FROM snvg_ttprodt AS tendencia, menu_productos AS product, menu_categorias AS cat WHERE tendencia.SNVG_C00101=product.cod AND product.categoria=cat.cod;");
        $tendencia->setFetchMode(PDO::FETCH_ASSOC);
        return $tendencia->fetchall();
    }
        public function getNombre($usuario){
        $usuarios = $this->_db->query("select nombre from usuarios where usuario='$usuario';");        
        return $usuarios->fetch();
    }
}
    

