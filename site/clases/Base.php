<?php

/**
 * Description of Base
 * 
 * @author Jay
 * @version 1.0 - 6/Septiembre/2012
 * Clase Base que contiene los metodos para ser usados de manera global en la aplicación
 *  
 */

class Base {
        /**
         * Obtiene el URL de la página/petición solicitada.
         * @return String El url de la página actual
         */
        public static function getPageURL() {
            $pageURL = 'http';
            if(isset($_SERVER["HTTPS"])){
                if ($_SERVER["HTTPS"] == "on"){
                    $pageURL .= "s";
                }
            }

            $pageURL .= "://";

            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
            }
            else {
                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            }
            
            return $pageURL;
        }

        /**
         * Regresa la fracción del url que representa la vista actual
         *
         * @return string
         */
        public static function getPagePartUrl(){
            $url = "";
            if(isset($_GET['vista'])){
                $url .= $_GET['vista'].'/';

                if(isset($_GET['seccion'])){
                    $url .=$_GET['seccion'].'/';

                    if(isset($_GET['subseccion'])){
                        $url .= $_GET['subseccion'].'/';
                    }
                }
            }
            return $url;
        }
        
        /** @todo Optimizar esta función */
        /**
         * Importa el contenido de una vista, se utiliza para los redirecciona
         * mientos dinámicos en los controles
         * @param String $nombre Nombre de la vista
         * @param String $modulo Módulo al cual pertenece la vista
         * @param String $seccion Sección a la cual pertenece la vista
         * @param String $subseccion Subsección a la cual pertenece la vista
         * @return boolean Si es que se pudo o no incluir el archivo.
         */
        public static function importarVista($nombre, $modulo=null, $seccion=null, $subseccion=null){
            $carpetas = '';
            if($modulo!=null && $modulo!='NAN'){
                $modulo = trim($modulo);
                $carpetas .= $modulo.'/';
            }

            if($seccion!=null){
                $seccion = trim($seccion);
                $carpetas .= $seccion.'/';
            }

            if($subseccion!=null){
                $subseccion = trim($subseccion);
                $carpetas .= $subseccion.'/';
            }
            //Agregar extension y prefijo al nombre en caso de requerirlo    
            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }
            if(!strstr($nombre,'vs_')){
                $nombre = 'vs_'.$nombre;
            }
            if(file_exists(FILES_BASE.'vistas/'.$carpetas.$nombre)){
                include_once FILES_BASE.'vistas/'.$carpetas.$nombre;
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Carga la pantalla de error 404, útil para cuando se cargan vistas
         */
        public static function error404(){
            //header("HTTP/1.0 404 Not Found");
            Base::importarVista('404');
        }
        
         /**
         * Indica un error 404, útil para cuando se hicieron peticiones asíncronas
         */
        public static function send404json(){
            header("HTTP/1.0 404 Not Found");
        }
        
        /**
         * Incluye el contenido de un bloque de vista.
         * @param String $nombre Nombre del bloque a incluir
         * @return boolean True o False si es que si incluyó.
         */
        public static function importarBloque($nombre){
            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }
            if(file_exists(FILES_BASE.'vistas/bloques/'.$nombre)){
                include FILES_BASE.'vistas/bloques/'.$nombre;
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Incluye un control
         * @param String $nombre Nombre del control a incluir
         * @return boolean True o False si es que si incluyó.
         */
        public static function importarControl($nombre){
            
            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }
            if(strstr($nombre,'ctr_') || strstr($nombre, 'if_') || strstr($nombre, 'p_')){
                /* do nothing */
            }
            else{
                $nombre = 'ctr_'.$nombre;
            }
            
            if(file_exists(FILES_BASE.'controles/'.$nombre)){
                include_once FILES_BASE.'controles/'.$nombre;
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Incluye un modelo
         * @param String $nombre Nombre del modelo a incluir
         * @return boolean True o False si es que si incluyó.
         */
        public static function importarModelo($nombre){
            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }
            if(strstr($nombre,'md_') || strstr($nombre, 'p_')){
                /* do nothing */
            }
            else{
                $nombre = 'md_'.$nombre;
            }
            if(file_exists(FILES_BASE.'modelos/'.$nombre)){
                include_once FILES_BASE.'modelos/'.$nombre;
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Incluye una entidad
         * @param String $nombre Nombre de la entidad a incluir
         * @return boolean True o False si es que si incluyó.
         */
        public static function importarEntidad($nombre){
            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }

            if(strstr($nombre,'ent_')){
                /* do nothing */
            }
            else{
                $nombre = 'ent_'.$nombre;
            }

            if(file_exists(FILES_BASE.'entidades/'.$nombre)){
                include_once FILES_BASE.'entidades/'.$nombre;
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Incluye una libreria PHP
         * @param String $nombre Nombre de la librería a incluir
         * @return boolean True o False si es que si incluyó.
         */
        public static function importarLibreriaPHP($nombre){

            if(strstr($nombre,'.php')==false){
                $nombre = $nombre.'.php';
            }

            if(file_exists(FILES_BASE.'librerias/'.$nombre)){
                include_once FILES_BASE.'librerias/'.$nombre;
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function importarLiberiaJS($nombre){
            //checar primero si existe el archivo dentro de un folder con ese nombre
            //Esto pasa por lo general si el js necesita una hoja de estilos e imagenes para funcionar.            
            if(file_exists(FILES_BASE.'js/librerias/'.$nombre.'/'.$nombre.'.js')){
                echo '<script src="'.URL_BASE.'js/librerias/'.$nombre.'/'.$nombre.'.js'.'" type="text/javascript"></script>';
                
                //Comprobar que existe una hoja de estilo asociada.
                if(file_exists(FILES_BASE.'js/librerias/'.$nombre.'/css/'.$nombre.'.css')){
                    echo '<link rel="stylesheet" href="'.URL_BASE.'js/librerias/'.$nombre.'/css/'.$nombre.'.css"/>';
                }
                return true;
                
            }//Si no importa solo el js
            elseif(file_exists(FILES_BASE.'js/librerias/'.$nombre.'.js')){
                echo '<script src="'.URL_BASE.'js/librerias/'.$nombre.'.js'.'" type="text/javascript"></script>';
                return true;
            }else{
                return false;
            }
        }
        
        public static function importarFuncionesJS($nombre){            
            if(file_exists(FILES_BASE.'js/funciones/'.'js_'.$nombre.'.js')){
                echo '<script src="'.URL_BASE.'js/funciones/'.'js_'.$nombre.'.js'.'" type="text/javascript"></script>';
                return true;
            }else{
                return false;
            }
        }

        public static function getImagen($nombre){
            return URL_BASE.'imagenes/'.$nombre;
        }

        public static function printImagen($nombre, $alt=""){
            echo '<img src="'.URL_BASE.'imagenes/'.$nombre.'" alt="'.$alt.'" />';
        }
        
        /**
         * Imprime el url base de la aplicación
         * @return boolean
         */
        public static function printUrl(){
            echo URL_BASE;
        }

        /**
         * Recibe un arreglo asociativo y pasa los datos a los atributos que
         * tengan los mismo nombres, útil para pasar una forma desde una vista
         * y convertir los parámetros en una entidad
         *
         * @param array $array El arreglo de datos
         * @param variable $obj El objeto al cual se le pasaran los atributos
         * @return variable El objeto ya con los atributos
         */
        public static function arrayToEntity($array, $obj){
            foreach($obj as $llave => $valor){
                if(isset($array[$llave])){
                    $obj->$llave = $array[$llave];
                }
            }

            return $obj;
        }
        
}
?>
