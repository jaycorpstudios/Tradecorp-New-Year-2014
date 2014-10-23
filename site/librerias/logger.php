<?php
/**
 * Clase para guardar un log del sitema utilizando archivos de texto o
 * una base de datos
 *
 * @author Jay
 */
class logger {
    
    private static function getID(){
        if(array_key_exists(SESSION_ID, $_SESSION)){
            return $_SESSION[SESSION_ID];
        }
        else{
            return 0;
        }
    }

    /**
     * Escribe un mensaje en el archivo de errores de la aplicación
     * @param String $archivo El archivo en el cual se está ejecutando el código
     * @param String $mensaje El mensaje de error
     */
    public static function escribirError($archivo, $mensaje){
        $fecha = logger::getFecha();
        $error = 'error_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');
        $ruta = "";

        if(logger::verificarArchivos(false, true)){
            if(LOG_DIR!=''){
                $ruta = LOG_DIR.$folder.'/';
            }
            else{
                $ruta = FILES_BASE.'logs/'.$folder.'/';
            }
            $ruta .=$error;

            $file = fopen($ruta, 'a');

            $cadena = $fecha.', SESSION ID: '.logger::getID().', File: '.$archivo."\n".
                      '         Mensaje: '.$mensaje."\n";
            fwrite($file, $cadena);
            fclose($file);
        }
    }

    /**
     * Escribe un mensaje en el archivo de errores de la aplicación
     * @param Exception $e
     */
    public static function escribirErrorExcepcion($e){
        $fecha = logger::getFecha();
        $error = 'error_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');
        $ruta = "";

        if(strpos($e->getFile(), 'mpdf')===false){
            if(logger::verificarArchivos(false, true)){
                if(LOG_DIR!=''){
                    $ruta = LOG_DIR.$folder.'/';
                }
                else{
                    $ruta = FILES_BASE.'logs/'.$folder.'/';
                }
                $ruta .=$error;

                $file = fopen($ruta, 'a');

                $cadena = $fecha.' --- '.logger::getID().' --- '.$e->getFile().' ('.$e->getLine().') --- '.$e->getMessage()."\n";
                fwrite($file, $cadena);

                fclose($file);
            }
        }
    }

    /**
     * Escribe un mensaje de Error en el archivo de Errores, solo se utiliza por
     * las excepciones no previstas y se llama automáticamente
     * @param String $archivo Archivo en el que se generó el error
     * @param String $mensaje Mensaje de error
     * @param String $linea Línea donde ocurrió el error
     */
    public static function escribirErrorSystem($archivo, $mensaje, $linea){
        $fecha = date('d/m/Y - H:i:s');
        $error = 'error_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');
        $ruta = "";

        if(strpos($archivo, 'mpdf')===false){
            if(logger::verificarArchivos(false, true)){
                if(LOG_DIR!=''){
                    $ruta = LOG_DIR.$folder.'/';
                }
                else{
                    $ruta = FILES_BASE.'logs/'.$folder.'/';
                }
                $ruta .=$error;

                $file = fopen($ruta, 'a');

                $cadena = $fecha.' --- '.logger::getID().' --- '.$archivo.' - Línea: '.$linea.' --- '.$mensaje."\n";
                fwrite($file, $cadena);

                fclose($file);
            }
        }
    }

    /**
     * Escribe un mensaje en la bitácora de actividades
     * @param String $usuario El usuario que está ejecutando
     * @param String $archivo El archivo que ejecutó
     * @param String $mensaje El mensaje a guardar en la bitácora
     */
    public static function escribirBitacora($archivo, $mensaje, $usuario='Jay'){
        $fecha = logger::getFecha();
        $log = 'log_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');

        if(logger::verificarArchivos(true, false)){
            if(LOG_DIR!=''){
                $ruta = LOG_DIR.$folder.'/';
            }
            else{
                $ruta = FILES_BASE.'logs/'.$folder.'/';
            }
            $ruta .=$log;

            $file = fopen($ruta, 'a');
            
            $cadena = $fecha.', Usuario: '.$usuario.', File: '.$archivo."\n".
                      '         Mensaje: '.$mensaje."\n";
            fwrite($file, $cadena);

            fclose($file);
        }

    }

    /**
     * Escribe un mensaje en la bitácora de actividades
     * @param String $archivo El archivo que ejecutó
     * @param String $mensaje El mensaje a guardar en la bitácora
     */
    public static function escribirBitacoraAviso($archivo, $mensaje){
        $fecha = date('d/m/Y - H:i:s');
        $log = 'log_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');

        if(logger::verificarArchivos(true, false)){
            if(LOG_DIR!=''){
                $ruta = LOG_DIR.$folder.'/';
            }
            else{
                $ruta = FILES_BASE.'logs/'.$folder.'/';
            }
            $ruta .=$log;

            $file = fopen($ruta, 'a');

            $cadena = $fecha.' --- '.logger::getID().' --- '.$archivo.' --- '.$mensaje."\n";
            fwrite($file, $cadena);

            fclose($file);
        }

    }

    /**
     * Prepara los archivos de errores y bitácora
     * @return boolean Si están listos los archivos
     */
    private static function verificarArchivos($logFile, $errorFile){
        $band = true;
        $error = 'error_'.logger::getID().'_'.date('Y-m-d').'.log';
        $log = 'log_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = date('Y-m-d');

        try{
            if(LOG_DIR!=''){
                if(file_exists(LOG_DIR)){
                    if(!file_exists(LOG_DIR.$folder.'/')){
                        mkdir(LOG_DIR.$folder);
                    }
                    if(!file_exists(LOG_DIR.$folder.'/'.$error)){
                        if($errorFile){
                            $error_file = fopen(LOG_DIR.$folder.'/'.$error, 'a');
                        }
                    }
                    if(!file_exists(LOG_DIR.$folder.'/'.$log)){
                        if($logFile){
                            $LOG_DIR = fopen(LOG_DIR.$folder.'/'.$log, 'a');
                        }
                    }
                }
                else{
                    mkdir(LOG_DIR);
                    if($errorFile){
                        $error_file = fopen(LOG_DIR.$error, 'a');
                    }
                    if($logFile){
                        $log_file = fopen(LOG_DIR.$log, 'a');
                    }
                }
            }
            else{
                if(file_exists(FILES_BASE.'logs')){
                    if(!file_exists(FILES_BASE.'logs/'.$folder)){
                        mkdir(FILES_BASE.'logs/'.$folder);
                    }

                    if(!file_exists(FILES_BASE.'logs/'.$folder.'/'.$error)){
                        if($errorFile){
                            $error_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$error, 'a');
                        }
                    }
                    if(!file_exists(FILES_BASE.'logs/'.$folder.'/'.$log)){
                        if($logFile){
                            $log_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$log, 'a');
                        }
                    }
                }
                else{
                    mkdir(FILES_BASE.'logs');
                    mkdir(FILES_BASE.'logs/'.$folder);

                    if($errorFile){
                        $error_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$error, 'a');
                    }
                    if($logFile){
                        $log_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$log, 'a');
                    }
                }
            }
        }
        catch(Exception $e){
            $band=false;
        }

        return $band;
    }

    /**
     * Escribe un mensaje en la bitácora de actividades
     * @param String $archivo El archivo que ejecutó
     * @param String $mensaje El mensaje a guardar en la bitácora
     */
    public static function escribirDebug($archivo, $mensaje){
        $aMicrotime = explode(' ', microtime());

        $fecha = date('d/m/Y - H:i s.'. $aMicrotime[0] * 1000000, $aMicrotime[1]);
        $log = 'debug_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = 'debug';

        if(logger::verificarDebug()){
            if(LOG_DIR!=''){
                $ruta = LOG_DIR.$folder.'/';
            }
            else{
                $ruta = FILES_BASE.'logs/'.$folder.'/';
            }
            $ruta .=$log;

            $file = fopen($ruta, 'a');

            $cadena = $fecha.' --- '.logger::getID().' --- '.$archivo.' --- '.$mensaje."\n";
            fwrite($file, $cadena);

            fclose($file);
        }

    }


    /**
     * Prepara los archivos de errores y bitácora
     * @return boolean Si están listos los archivos
     */
    private static function verificarDebug(){
        $band = true;
        $log = 'debug_'.logger::getID().'_'.date('Y-m-d').'.log';
        $folder = 'debug';

        try{
            if(LOG_DIR!=''){
                if(file_exists(LOG_DIR)){
                    if(!file_exists(LOG_DIR.$folder.'/')){
                        mkdir(LOG_DIR.$folder);
                    }
                    if(!file_exists(LOG_DIR.$folder.'/'.$log)){

                            $LOG_DIR = fopen(LOG_DIR.$folder.'/'.$log, 'a');

                    }
                }
                else{
                    mkdir(LOG_DIR);


                        $log_file = fopen(LOG_DIR.$log, 'a');

                }
            }
            else{
                if(file_exists(FILES_BASE.'logs')){
                    if(!file_exists(FILES_BASE.'logs/'.$folder)){
                        mkdir(FILES_BASE.'logs/'.$folder);
                    }

                    if(!file_exists(FILES_BASE.'logs/'.$folder.'/'.$log)){

                            $log_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$log, 'a');

                    }
                }
                else{
                    mkdir(FILES_BASE.'logs');
                    mkdir(FILES_BASE.'logs/'.$folder);

                    if($logFile){
                        $log_file = fopen(FILES_BASE.'logs/'.$folder.'/'.$log, 'a');
                    }
                }
            }
        }
        catch(Exception $e){
            $band=false;
        }

        return $band;
    }
    
    private static function getFecha(){
        $dia = date('d');
        $mes = intval(date('m'));
        $anio = date('Y');
        $hora = date('H:i:s');
        $nombre_mes = array('',
                            'Enero',
                            'Febrero',
                            'Marzo',
                            'Abril',
                            'Mayo',
                            'Junio',
                            'Julio',
                            'Agosto',
                            'Septiembre',
                            'Octubre',
                            'Noviembre',
                            'Diciembre'
                            );
        return 'Fecha: '.$dia.' de '.$nombre_mes[$mes].' de '.$anio.' Hora: '.$hora;
    }
}
?>