<?php

class hrmModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getRoles()
    {
        $roles = $this->_db->query("SELECT * FROM roles WHERE id_role!=1;");
        
        return $roles->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarUsuario($nombre, $usuario, $password, $email, $role)
    {
    	$this->_db->prepare(
                "insert into usuarios values" .
                "(null, :nombre, :usuario, :password, :email, :role, 1)"
                )
                ->execute(array(
                    ':nombre' => $nombre,
                    ':usuario' => $usuario,
                    ':password' => Hash::getHash('sha1', $password, HASH_KEY),
                    ':email' => $email,
                    ':role' => $role
                ));
    }

    public function getUsuarios(){
        $usuarios = $this->_db->query("SELECT usu.id AS id, usu.usuario AS usuario, usu.email AS email, usu.nombre AS nombre, usu.role AS idrol, usu.estado AS estado, rol.role AS rol FROM usuarios AS usu, roles AS rol WHERE usu.role=rol.id_role and usu.estado=1 order by usu.role ASC;");        
        return $usuarios->fetchall();
    }
}
