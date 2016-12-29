<?php

class adminController extends managementController
{
    private $_index;
	private $_aclm;	

    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('hrm');  
		$this->_aclm = $this->loadModel('acl');
        $this->_usuarios = $this->loadModel('index');
        		
    }
    
   

    public function hrm()
    {
        $this->_view->setJs(array('index'));
        $this->_view->assign('titulo', 'HRM');
        $this->_view->assign('usuarios', $this->_index->getUsuarios());        
        $this->_view->renderizar('hrm','admin');
    }

    public function registro()

    {
        if($this->getInt('registrar') == 1){
            $this->_view->assign('datos', $_POST);
            
            $this->_index->registrarUsuario(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email'),
                    $this->getAlphaNum('rol')
                    );
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado, revise su email para activar su cuenta');
        }
        $this->_view->setJs(array('hrm'));
        $this->_view->assign('roles', $this->_index->getRoles()); 
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('registro','admin');
    }

    public function acl()
    {
        $this->_view->assign('titulo', 'Listas de acceso');
        $this->_view->renderizar('acl', 'admin');
    }
	
	public function roles()
    {
        $this->_view->assign('titulo', 'Administracion de roles');
        $this->_view->assign('roles', $this->_aclm->getRoles());
        $this->_view->renderizar('roles', 'admin');
    }
       
    public function permisos_role($roleID)
    {
        $id = $this->filtrarInt($roleID);
        
        if(!$id){
            $this->redireccionar('management/admin/acl/roles');
        }
        
        $row = $this->_aclm->getRole($id);
        
        if(!$row){
            $this->redireccionar('management/admin/acl/roles');
        }
        
        $this->_view->assign('titulo', 'Administracion de permisos role');
        
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();
            
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) - 5);
                    
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'role' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'role' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            
            for($i = 0; $i < count($eliminar); $i++){
                $this->_aclm->eliminarPermisoRole(
                        $eliminar[$i]['role'],
                        $eliminar[$i]['permiso']);
            }
            
            for($i = 0; $i < count($replace); $i++){
                $this->_aclm->editarPermisoRole(
                        $replace[$i]['role'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        
        $this->_view->assign('role', $row);
        $this->_view->assign('permisos', $this->_aclm->getPermisosRole($id));
        $this->_view->renderizar('permisos_role','admin');
    }
    
    public function nuevo_role()
    {
        $this->_view->assign('titulo', 'Nuevo Role');
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getSql('role')){
                $this->_view->assign('_error', 'Debe introducir el nombre del role');
                $this->_view->renderizar('nuevo_role', 'admin');
                exit;
            }
            
            $this->_aclm->insertarRole($this->getSql('role'));
            $this->redireccionar('admin/roles');
        }
        
        $this->_view->renderizar('nuevo_role', 'admin');
    }
    
    public function permisos()
    {
        $this->_view->assign('titulo', 'Administracion de permisos');
        $this->_view->assign('permisos', $this->_aclm->getPermisos());
        $this->_view->renderizar('permisos', 'admin');
    }
    
    public function nuevo_permiso()
    {
        $this->_view->assign('titulo', 'Nuevo Permiso');
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getSql('permiso')){
                $this->_view->assign('_error', 'Debe introducir el nombre del permiso');
                $this->_view->renderizar('nuevo_permiso', 'admin');
                exit;
            }
            
            if(!$this->getAlphaNum('key')){
                $this->_view->assign('_error', 'Debe introducir el key del permiso');
                $this->_view->renderizar('nuevo_permiso', 'admin');
                exit;
            }
            
            $this->_aclm->insertarPermiso(
                    $this->getSql('permiso'), 
                    $this->getAlphaNum('key')
                    );
            
            $this->redireccionar('management/admin/permisos');
        }
        
        $this->_view->renderizar('nuevo_permiso', 'admin');
    }

    public function permisos_usuario($usuarioID)
    {
        $id = $this->filtrarInt($usuarioID);
        
        if(!$id){
            $this->redireccionar('usuarios');
        }
        
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();
            
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) - 5);
                    
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            
            for($i = 0; $i < count($eliminar); $i++){
                $this->_usuarios->eliminarPermiso(
                        $eliminar[$i]['usuario'],
                        $eliminar[$i]['permiso']);
            }
            
            for($i = 0; $i < count($replace); $i++){
                $this->_usuarios->editarPermiso(
                        $replace[$i]['usuario'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        
        $permisosUsuario = $this->_usuarios->getPermisosUsuario($id);
        $permisosRole = $this->_usuarios->getPermisosRole($id);
        
        if(!$permisosUsuario || !$permisosRole){
            $this->redireccionar('usuarios');
        }
        
        $this->_view->assign('titulo', 'Permisos de usuario');
        $this->_view->assign('permisos', array_keys($permisosUsuario));
        $this->_view->assign('usuario', $permisosUsuario);
        $this->_view->assign('role', $permisosRole);
        $this->_view->assign('info', $this->_usuarios->getUsuario($id));
        
        $this->_view->renderizar('permisos_usuario', 'admin');
    }


    

}