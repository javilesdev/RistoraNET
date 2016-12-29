<?php

class configController extends managementController
{
      
    public function __construct() 
    {
        parent::__construct();        
    }
    
    public function index()
    {
        if($this->getInt('restaurar') == 1){
            $values = array_keys($_POST);
 			$handle = fopen($_FILES['buckup'], 'r');
 			echo $handle;exit;
        }
        $this->_view->assign('titulo', 'Configuracion');        
        $this->_view->renderizar('index','config');
    }

    public function tools()

    {        
      
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo 'This is a server using Windows!';
	} else {
    echo 'This is a server not using Windows!';
	}
        exit;
        $this->doBackup();
    }


    function doBackupWin(){       
            $dbhost = DB_HOST;
            $dbuser = DB_USER;
            $dbpwd = DB_PASS;
            $dbname = DB_NAME;            
            $ruta_mysqldump = "\"C:\\xampp\\mysql\\bin\\mysqldump\" " ;
            $hora=  date("H-i-s");
            $fecha = date("d-m-Y");
            $dumpfile = ROOT . 'private' . DS . 'backup' . DS . $dbname . "_" . $fecha . "_" . $hora . ".sql";           
            passthru($ruta_mysqldump." --add-drop-database --databases --host=".$dbhost." --user=". $dbuser ." --password=".$dbpwd." ".$dbname." > $dumpfile");
    }

    function doBackupLin(){
    	 $dbhost = DB_HOST;
            $dbuser = DB_USER;
            $dbpwd = DB_PASS;
            $dbname = DB_NAME;            
            $ruta_mysqldump = "/opt/lampp/bin/mysqldump" ;
            date_default_timezone_set('America/Santiago');
            $hora=  date("H-i-s");
            $fecha = date("d-m-Y");
            $dumpfile = ROOT . 'private' . DS . 'backup' . DS . $dbname . "_" . $fecha . "_" . $hora . ".sql";           
            passthru($ruta_mysqldump." --add-drop-database --databases --host=".$dbhost." --user=". $dbuser ." --password=".$dbpwd." ".$dbname." > $dumpfile");
            $this->_view->assign('_mensaje', 'Base de Datos Respaldadas con Nombre <b>'.$dbname.'_'.$fecha.'_'.$hora.'.sql</b>');
            $this->_view->renderizar('index','config');
            exit;           
    }

    function doRestoreLin($get){

    }
}