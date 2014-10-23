<?php
/**
 * Clase que padre de la cual heredan los controles
 *
 * @author Sistemas
 */
class p_control {

    /**
     * variable para enviar respuestas JSON al front-end
     *
     * @var jsonSender
     */
    protected $sender = null;

    function __construct(){
        $this->sender = new jsonSender();
    }
}
?>
