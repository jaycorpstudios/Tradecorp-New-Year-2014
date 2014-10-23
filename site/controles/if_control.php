<?php
/**
 * Interface base desde la cual se pueden heredar los controles para definirlos
 * uniformemente.
 *
 * @author Sistemas
 */
interface if_control {

    /**
     * Función para procesar las peticiones que llegan al control
     * @param $post Parámetros Post
     * @param $get Parámetros Get
     * @param $cookies Cookies de la Request.
     */
    public function proc_Request($post, $get, $cookies);
}
?>
