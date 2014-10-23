<?php
    //Index Front Controller

    //Establece la zona horaria del sistema
    date_default_timezone_set('America/Mexico_City');
    //Se especifica el locale para poder establecer fechas
    setlocale(LC_TIME, array('es','esm','esm_mex','esp'));
    
    //Carga de liberias y demas funciones iniciales.
    include_once 'config.php';
    include_once 'clases/Base.php';
    include_once 'librerias/jsonSender.php';
    include_once 'librerias/logger.php';
    include 'controles/ctr_index.php';

    //Variable de conexion global
    $conexion = null;

    //Incluir modelo, vista y controlador principal.
    Base::importarModelo('p_modelo');   //se importa la clase de modelos
    //Base::importarControl('p_control'); //Se importa la interfaz de control
    Base::importarControl('if_control'); //Se importa la interfaz de control
    
    new ctr_index();
    
    
    /*
    spl_autoload_register('framework_autoload');
    
    function framework_autoload($class_name){

        if(strpos($class_name, "ent")===0){
            Base::importarEntidad($class_name);
        }
        else if(strpos($class_name, "ctr")===0){
            Base::importarControl($class_name);
        }
        else if(strpos($class_name, "md")===0){
            Base::importarModelo($class_name);
        }
        
    }
    */
    

?>
