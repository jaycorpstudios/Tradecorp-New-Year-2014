<?php

/**
 * Description of md_productos
 *
 * @author jay
 */
class md_productos extends p_modelo{

	function getProducto($post){
		Base::importarEntidad('producto');
        $producto = new ent_producto();
        if($this->conectarDB()){
            $query = 'SELECT imagen, logo, certificadoOmri, certificadoEcocert, informacion, dosis
                      FROM productos
                      WHERE nombre = ?';
            $statement = $this->conexion->prepare($query);
            $statement->bind_param('s', $post['producto']);
            $statement->execute();
            $statement->bind_result($producto->imagen, $producto->logo, $producto->certificadoOmri, $producto->certificadoEcocert, $producto->informacion, $producto->dosis);
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
