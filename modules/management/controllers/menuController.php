<?php

class menuController extends managementController
{
     
    private $_index; 

    public function __construct() 
    {
        parent::__construct();
        $this->_index = $this->loadModel('menu');         
    }
    
    public function index()
    {
        
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('index','menu');
    }

    public function catalogo()
    {
    	
        $this->_view->assign('menus', $this->_index->getMenus()); 
        $this->_view->assign('titulo', 'Catalogo');        
        $this->_view->renderizar('catalogo','menu');
    }

    public function agregar_menu()
    {   
    	if($this->getInt('agregar') == 1){
    		
            $this->_view->assign('datos', $_POST);
            $imagen = '';           
                          
                $ruta = ROOT . 'public' . DS . 'img' . DS . 'menu' . DS ;                
                $upload = new upload($_FILES['imagen'], 'es_Es');
                $upload->allowed = array('image/*');
                $upload->image_resize = true;
                $upload->image_x = 200;
                $upload->image_y = 150;
                $upload->file_new_name_body = 'thumb' . uniqid();
                $upload->process($ruta);                
                if($upload->processed){
                    $imagen = $upload->file_dst_name;                    
                }else {
                    $this->_view->assign('_error', $upload->error);
                    $this->_view->renderizar('agregar_menu','menu');
                    exit;
                }
                				
                $this->_index->insertProducto(
                $this->getPostParam('producto'),
                $this->getInt('precio'),
                $this->getInt('categoria'),                             
                $imagen,
                $this->getInt('stock'),
                $this->getInt('visible'),
                $this->getPostParam('descripcion')    
                );
            
            $this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', '<h3>Suceso Exitoso!</h3>Registro Completado.');

        }
        $this->_view->assign('categorias', $this->_index->getCategorias());     
        $this->_view->assign('titulo', 'Usuarios');        
        $this->_view->renderizar('agregar_menu','menu');
    }

    function GenerateRandomString($size=false,$chars=false) {
        if ($size===false) $size = 4;
        if ($chars!==false) {
            $string = "";
            for($i=0;$i<$size;$i++) $string .= $chars{mt_rand(0,strlen($chars)-1)};            
        } else {
            $string = md5(uniqid(mt_rand(0,time()),true));
        }
        return ($size) ? substr($string,0,$size) : $string;
    }

    
}