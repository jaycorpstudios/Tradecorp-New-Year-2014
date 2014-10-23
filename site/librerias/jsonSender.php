<?php
/**
 * jsonSender, Librería de envio de JSON
 *
 * Librería de uso general que permite el envio de mensajes JSON basados en
 * distintos parametros de entrada tales como Objetos, arreglos y cadenas de texto
 * @author David Osiris Magallón Chávez
 * @version 1.0
 */
    class jsonSender{

        /**
         * Envia un objeto en formato JSON
         * @param Object $var Objeto a ser convertido en mensaje JSON
         * @return boolean
         */
        public function sendObject($obj){
            try{
                $valores = get_object_vars($obj);
                return ($this->enviar($valores));
            }
            catch(Exception $e){
                return false;
            }
        }

        /**
         * Recibe un objeto y un arreglo con parámetros adicionales
         * y los convierte en un mensaje JSON
         * @param Object $obj El objeto a convertir en JSON
         * @param array $arreglo El arreglo de valores adicionales a agregar
         * @return boolean
         */
        public function sendMultiple($obj, $arr){
            try{
                $valores = get_object_vars($obj);
                $juntos = array_merge($valores, $arr);
                return $this->enviar($juntos);
            }
            catch(Exception $e){
                return false;
            }
        }

        /**
         * Arma un mensaje JSON desde un par de parámetros (llave y valor)
         * @param string $llave Llave del la cadena a enviar via JSON
         * @param string $valor Valor a enviar via JSON
         * @return boolean
         */
        public function sendString($llave, $valor){
            $valores = array();
            $valores[$llave]=$valor;

            return $this->enviar($valores);
        }

        /**
         * Arma un mensaje JSON desde un par de parámetros (llave y valor)
         * @param string $llave Llave del la cadena a enviar via JSON
         * @param numeric $valor Valor a enviar via JSON
         * @return boolean
         */
        public function sendNumeric($llave, $valor){
            $valores = array();
            $valores[$llave]=$valor;

            return $this->enviar($valores);
        }

        /**
         * Arma un mensaje JSON desde un arreglo asociativo
         * @param array $valores Los datos a enviar
         * @return boolean
         */
        public function sendArray($arr){
            return $this->enviar($arr, true);
        }

        /**
         * Establece el encabezado para el envio del mensaje JSON
         */
        private function setHeaders(){
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json charset=utf8');
        }

        /**
         * Obtiene los arreglos armados por las demás funciones de envio y manda
         * respuesta al cliente
         * @param array $temp El arreglo a enviar
         * @return boolean
         */
        private function enviar($valores, $force=false){
            try{
                //$temp;
                //if(!$force){
                    //$temp = json_encode(array_map('utf8_encode', $valores));
                //$temp = json_encode($valores);
                $temp = $this->array_to_json($valores);
                /*}
                else{
                    $temp = json_encode(array_map('utf8_encode', $valores), JSON_FORCE_OBJECT);
                }*/


                $this->setHeaders();

                //$temp = ereg_replace("/\n\r|\r\n|\n|\r/", "\\n", $temp);
                //$temp = preg_replace("/\t/", "", $temp);
                $temp = preg_replace("/\n\r|\r\n|\n|\r/", "\\n", $temp);
                $temp = preg_replace("/\t/", "", $temp);

                echo($temp);
                return true;
            }
            catch(Exception $e){
                return false;
            }
        }


        /**
         * Converts an associative array of arbitrary depth and dimension into JSON representation.
         *
         * NOTE: If you pass in a mixed associative and vector array, it will prefix each numerical
         * key with "key_". For example array("foo", "bar" => "baz") will be translated into
         * {'key_0': 'foo', 'bar': 'baz'} but array("foo", "bar") would be translated into [ 'foo', 'bar' ].
         *
         * @param $array The array to convert.
         * @return mixed The resulting JSON string, or false if the argument was not an array.
         * @author Andy Rusterholz en http://www.php.net/manual/en/function.json-encode.php#89908
         */
        private function array_to_json( $array ){

            if( !is_array( $array ) ){
                //return false;
                $valores = get_object_vars($array);
                if(count($valores)!=0){
                    return $this->array_to_json($valores);
                }
                else{
                    return false;
                }
            }

            $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
            if( $associative ){

                $construct = array();
                /* $key = llave, $value = valor */
                foreach( $array as $key => $value ){

                    /* las llaves numéricas en algún asociativo se les agregan comillas */
                    if( is_numeric($key) ){
                        $key = "$key";
                    }
                    $key = '"'.addslashes($key).'"';

                    // Format the value:
                    if( is_array( $value )){
                        $value = $this->array_to_json( $value );
                    }
                    else if(is_object($value)){
                        $value = $this->array_to_json(get_object_vars($value));
                    }
                    else if( !is_numeric( $value ) || is_string( $value ) ){
                        $value = '"'.addslashes($value).'"';
                    }


                    // Add to staging array:
                    $construct[] = "$key:$value";
                }

                // Then we collapse the staging array into the JSON form:
                $result = "{" . implode( ",", $construct ) ."}";

            } else { // If the array is a vector (not associative):

                $construct = array();
                foreach( $array as $value ){
                    // Format the value:
                    if(is_object($value)){
                        $value = $this->array_to_json(get_object_vars($value));
                    }
                    else if( is_array( $value )){
                        $value = $this->array_to_json( $value );
                    } else if( !is_numeric( $value ) || is_string( $value ) ){
                        $value = '"'.addslashes($value).'"';
                    }

                    // Add to staging array:
                    $construct[] = $value;
                }

                // Then we collapse the staging array into the JSON form:
                $result = "[" . implode( ",", $construct ) . "]";
            }

            return $result;
        }

}
?>