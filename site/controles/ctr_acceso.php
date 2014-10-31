<?php
/*
 * 
 * Control para el login de los usuarios del sitio 
 * 
 * @author Jay
 */
class ctr_acceso implements if_control {
    
    public function proc_Request($post, $get, $cookies) {
        $testing = Base::importarModelo('login');
        $sender = new jsonSender();        
        $modelo = new md_login();
        #para entrar
        if($post['accion'] == 'login'){
            $resp = false;
            $password_seguro = md5($post['password']."secrets");
            $resp = $modelo->checkLogin($post['username'], $password_seguro);
            if($resp){
                $sender->sendString('acceso', 'ok');
            }else{
                $sender->sendString('acceso', 'no');
            }
        }
        
        #para cerrar sesion
        if($post['accion']=='logout'){
            session_destroy();
            $sender->sendString('logout', 'ok');
        }        
    }
    
}

?>
