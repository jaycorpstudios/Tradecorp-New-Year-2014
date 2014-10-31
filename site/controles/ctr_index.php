<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctr_index
 * @author Sistemas
 */
class ctr_index {
    
    /**
     * Función constructor de la clase ctr_index
     */
    function __construct(){
        /* Aquí se inicia la sesión y se carga el token de seguridad */
        session_start();
        
        
        //session_regenerate_id(); //En cada petición se regenera la sesión para evitar robo de sesión (Highjack)

        //Si no se ha especificado ningun parametro en la url...
        if (count($_GET)==0 && count($_POST)==0){
            include_once FILES_BASE.'vistas/vs_index.php';
        }
        
        /* Este else es invocado cuando se pasó por una de las condiciones puestas por
         * mod_rewrite en el apache, específicamente cuando se desea invocar directamente
         * una vista (por ejemplo un enlace en el menú)
         */
        else if(array_key_exists('destino', $_GET)){

            /* se verifica que la sesión sea válida y que contenga el token de login,
             * si no lo tiene se mandará a vs_index.php
             */
            
            /*
            if(!isset($_SESSION['acceso'])){    //Si no se ha validado la sesión... 
                header('Location: '.URL_BASE);  //se manda a raiz de la aplicación
            }else{   //Si esta logeado
            */
                if($_GET['destino']=='vista'){  //si el destino es una vista
                    $vista = $_GET['vista'];
                    //Si en este punto la vista es el login, redirecciona al inicio;
                    if($_GET['vista']=='login'){
                        header('Location: '.URL_BASE);
                    }else{
                        $modulo=null;
                        if(array_key_exists('modulo', $_GET)){
                            $modulo = $_GET['modulo'];
                        }
                        $seccion = null;
                        if(array_key_exists('seccion', $_GET)){
                            $seccion = $_GET['seccion'];
                        }
                        $subseccion = null;
                        if(array_key_exists('subseccion', $_GET)){
                            $subseccion = $_GET['subseccion'];
                        }
                        //Habiendo obtenido los parámetros se limpian
                        $this->limpiarParametros($vista, $modulo, $seccion, $subseccion);

                        if(!Base::importarVista($vista, $modulo, $seccion, $subseccion)){
                            $this->send404();
                        }
                    }
                }else if($_GET['destino']=='404'){   //si el destino es diferente a vista se manda 404
                    $this->send404();
                }

            //} //fin de cuando si se ha hecho login

        }else{
            /* En este else es donde se redigirá a otros controles de acuerdo a lo
             * que sea necesario dinámicamente
             */

            /* Aquí se limpia la variable recibida para evitar que contenga caracteres
             * html u y evitar en lo posible carga de XSS
             */
            $modulo = $_POST['modulo'];
            $modulo = trim($modulo);
            $modulo = htmlentities($modulo);
            $this->cargarControl($modulo, false);   //si el módulo es acceso se permite la carga
        }


//        $this->f_desconectarDB();

    }



    /**
     * Carga el control indicado, y en caso de no encontrarlo manda un error ya sea como
     * html o como json
     * @param string $modulo nombre del control a cargar
     * @param boolean $vista  el modo en que debe procesar la petición si como html (true) o como json (false)
     */
    private function cargarControl($modulo, $vista=true){

        /* Aquí se busca si es que existe un archivo php con el nombre del módulo
         * a cargar, en caso de ser afirmativo se procese a crear la instancia
         */
        if(Base::importarControl($modulo)){    //se busca e incluye el archivo
            $type = 'ctr_'.$modulo;    // si se encontró el archivo se crea una variable
                                    // para permitir la instanciación dinámica del objeto
            $control = new $type;   // aquí se crea la instancia dinámica
            //se llama al método implementado por todos los controles de la aplicación
            $control->proc_Request((array)$_POST, (array)$_GET, (array)$_COOKIE);
        }
        else{
             //Aquí debe invocar un 404 si no se encontró el control;
            if($vista)
                $this->send404();
            else
                $this->send404json();
        }
    }

    private function send404(){
        Base::error404();
    }

    private function send404json(){
        Base::send404json();
    }

    /**
     * Limpia los parámetros recibidos para desplegar alguna vista en particular
     * @param String $vista
     * @param String $modulo
     * @param String $seccion
     * @param String $subseccion
     */
    private function limpiarParametros($vista, $modulo=null, $seccion=null, $subseccion=null){
        //$vista = trim($vista);

        $vista = escapeshellcmd(trim($vista));

        if($modulo!=null){
            if($modulo=='')
                $modulo = null;
            else
                $modulo = escapeshellcmd(trim($modulo));
        }

        if($seccion!=null){
            if($seccion=='')
                $seccion = null;
            else
                $seccion = escapeshellcmd(trim($seccion));
        }

        if($subseccion!=null){
            if($subseccion=='')
                $subseccion = null;
            else
                $subseccion = escapeshellcmd(trim($subseccion));
        }

    }

    private function conectarDB(){
        $b_band = false;
        $GLOBALS['conexion'] = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(mysqli_connect_errno()){
            logger::escribirError('ctr_index', 'Error al conectar a DB: '.mysqli_connect_error());
        }

        if($GLOBALS['conexion']!=null){
            return true;
        }
        else{
            return false;
        }
    }

    private function f_desconectarDB(){

        if($GLOBALS['conexion']!=null){
            $GLOBALS['conexion']->close();
        }
        if($GLOBALS['conexion_ado']!=null){
            $GLOBALS['conexion_ado']->close();
            $GLOBALS['conexion_ado']=null;
        }
    }

    /**
     * Limpia los valores que se pasen por la variable $var
     * @author Luis Fernando Curiel Cabrera
     * @param Mixed [String,Array,Object] $var
     * @param Integer $tab
     * @return Mixed Regresa $var ya con los valores limpios
     */
    private function limpiaVariable($var, $tab=0){
	$type=gettype($var);
	//echo str_repeat('	    ', $tab).$type.': '.$var.'<br>';
	if($type=='array' || $type=='object'){
	    foreach($var as $index=>$value){
		if($type=='array'){$var[$index]=$this->limpiaVariable($value,$tab++);}
		elseif($type=='object'){@eval('$var->'.$index.'=$this->limpiaVariable($value,$tab++);');}
	    }
	}
	else{$var=escapeshellcmd($var);}
	return $var;
    }

    
}
?>
