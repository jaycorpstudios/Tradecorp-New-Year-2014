<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of p_modelo
 *
 * @author jay
 */
class p_modelo {
    /**
     * Variable que contiene la conexón con la base de datos
     * @var mysqli conexion
     */
    protected $conexion = null;

    /**
     * Función que conecta con la base de datos
     * @author Jay
     * @return boolean Estado de la conexi√≥n
     */
    protected function conectarDB(){
        if(!$this->conexion){
            try{
                $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            }  catch (exception $e){
                //Logear error
            }
        }
        
        if(!$this->conexion){
            return false;
        }else{
            return true;
        }       
    }
    
    
    /**
     * Funci√≥n que desconecta la conexi√≥n con la base de datos.
     */
    protected function desconectarDB(){
        if($this->conexion!=null){
            $this->conexion->close();
        }
    }

    /**
     * Crea una conexi√≥n adicional a la base de datos
     *
     * @return mixed La conexi√≥n o false
     */
}

?>
