<?php

/**
 * Description of md_demo
 *
 * @author jay
 */
class md_demo extends p_modelo{

	unction getProducto($post){

        $producto = new ent_producto();
        if($this->conectarDB()){
            $query = 'SELECT imagen, logo, certificado, informacion, dosis
                      FROM productos
                      WHERE nombre = ?';
            $statement = $this->conexion->prepare($query);
            $statement->bind_param('s', $post['producto']);
            $statement->execute();
            $statement->bind_result($producto->imagen, $producto->logo, $producto->certificado, $producto->informacion, $producto->dosis);
            if($statement->fetch()){
                $statement->close();
                return $producto;
            }else{
                return false;
            }
        }
    }

}

?>
