<?php

class menuModelWidget extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getMenu($menu)
    {
        
        $menus['sidebar'] = array(            
            array(
                'id' => '',
                'titulo' => 'Gestion de Recursos Humanos',
                'enlace' => '#',
                'imagen' => '',
                'sub_menu' => array(                   
                     array(
                'id' => 'admin',
                'titulo' => 'Control de HRM',
                'enlace' => BASE_URL . 'management/admin/hrm'
                    ),
                     array(
                'id' => 'registro',
                'titulo' => 'Registro de Usuario',
                'enlace' => BASE_URL . 'management/admin/registro'
                    ),
                     array(
                'id' => 'roles',
                'titulo' => 'Roles',
                'enlace' => BASE_URL . 'management/admin/roles'
                    ),
                     array(
                'id' => 'permisos',
                'titulo' => 'Permisos',
                'enlace' => BASE_URL . 'management/admin/permisos'
                    )

                    )
            ),
            array(
                'id' => 'restaurant',
                'titulo' => 'Menues y Productos',
                'enlace' => '#',
                'imagen' => '',
                'sub_menu' => array(
                     array(
                'id' => 'menu',
                'titulo' => 'Catalogo de Productos',
                'enlace' => BASE_URL . 'management/menu/catalogo'
                    )
                    )
            ),
            array(
                'id' => 'inven',
                'titulo' => 'Proveedores e Inventario',
                'enlace' => '#',
                'imagen' => '',
                'sub_menu' => array(
                    array(
                'id' => 'inventario',
                'titulo' => 'Inventario',
                'enlace' => BASE_URL . 'management/inventario'
                    )
                    )
            ),
            array(
                'id' => 'marketing',
                'titulo' => 'Marketing y Ventas',
                'enlace' => '#',
                'imagen' => ''
            ),
            array(
                'id' => 'contabilidad',
                'titulo' => 'Finanzas y Contabilidad',
                'enlace' => '#',
                'imagen' => '',
                'sub_menu' => array(                   
                     array(
                'id' => 'ventas',
                'titulo' => 'Revision de Boletas',
                'enlace' => BASE_URL . 'management/contabilidad/ventas'
                    ))
            ),
            array(
                'id' => 'config',
                'titulo' => 'Configuraciones y Ajustes',
                'enlace' => BASE_URL . 'management/config',
                'imagen' => ''
            )
        );        
        $menus['top'] = array(
            array(
                'id' => 'ristoranet',
                'titulo' => 'RistoraNET',
                'enlace' => BASE_URL,
                'imagen' => ''
                )
        );      
        
        $menus['backbar'] = array(
            array(
                'id' => 'prueba',
                'titulo' => 'Prueba',
                'enlace' => BASE_URL,
                'imagen' => ''
                )
        );
        return $this->filter($menus[$menu]);
    }

    private function filter($menu){
    // obtenemos la instancia del registro
    $reg = Registry::getInstancia();

    // arreglo que almacena los items filtrados
    $filtro = array();
    
    foreach ($menu as $item) {
        // verificamos si está presente la clave "permiso" en el arreglo del item del menú
        if(isset($item['permiso'])){
            // si el usuario no tiene el permiso habilitado se salta en el bucle
            if( ! $reg->_acl->permiso($item['permiso'])){
                continue;
            }
        }
        
        // verificamos si está presente la clave "sub_menu" en el arreglo del item del menú
        if(isset($item['sub_menu']) && sizeof($item['sub_menu']) > 0){
            // pasamos el filtro a los sub-enlaces del item
            $sub_links = array_map(function($item) use ($reg){
                if(isset($item['permiso'])){
                    if( ! $reg->_acl->permiso($item['permiso'])){
                        return false;
                    }
                }

                return $item;
            }, $item['sub_menu']);

            $item['sub_menu'] = array_filter($sub_links);
        }

        // asignamos el item
        $filtro[] = $item;
    }

    return $filtro;
    }
}

?>