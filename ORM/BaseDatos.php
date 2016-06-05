<?PHP
    require_once ('ProveedorMySQL.php');
    class BaseDatos {
        private $proveedor;
        private $parametros;
        private static $_con;
        
        public function __construct($proveedor, $host, $usuario, $contrasena, $bd){
            
            if(!class_exists ($proveedor)){
                throw new Exception ("El proveedor no existe o no esta siendo implementado");
            }
            
            $this->proveedor = new $proveedor;
            
            $this->proveedor->connect($host, $usuario, $contrasena, $bd);
            
            if(!$this->proveedor->isConnected()){
                throw new Exception ("No se ha podido conectar a la base de datos");
            }else{
                $this->proveedor->setCharset('utf-8');
            }
        }
        
        public static function getConexion($proveedor, $host, $usuario, $contrasena, $bd){
            if(self::$_con){
                return self::$_con;
            }else{
                $class = __CLASS__;
                self::$_con = new $class ($proveedor, $host, $usuario, $contrasena, $bd);
                return self::$_con;
            }
        }
        
        private function reemplazarParametros(){
            $b = current($this->parametros);
            next($this->parametros);
            return $b;
        }
        
        private function prepare ($sql, $parametros){
            $escaped = '';
            
            if($parametros){
                foreach($parametros as $key => $value){
                    if (is_bool($value)){
                        
                        $value = $value ? 1:0 ;
                        
                    }elseif (is_double($value)) {
                        
                        $value = str_replace(',' , '.', $value);
                        
                    }elseif(is_numeric($value)){
                        
                        if(is_string($value)){
                            $value = "'" .$this->proveedor->scape($value) . "'";
                        }else{
                            $value = $this->proveedor->scape($value);
                        }
                        
                    }elseif(is_null($value)){
                        
                        $value = "NULL";
                        
                    }else{
                        
                        $value = "'" . $this->proveedor->scape($value)."'";
                        
                    }
                    
                    $escaped [] = $value;
                }
                
                
            }
            
            $this -> parametros = $escaped;
                
            $q = preg_replace_callback("/(\?)/i", array($this, "reemplazarParametros"), $sql);
            
            return $q;
            
        }
        
        private function enviarConsulta ($q, $parametros){
            
            $consulta = $this->prepare($q, $parametros);
            
            $resultado = $this->proveedor->query($consulta);
            
            if($this->proveedor->getErrorNo()){
                error_log($this->proveedor->getError());
            }
            
            return $resultado;
        }
        
        public function ejecutarEscalar($q, $parametros = null){
            $resultado = $this->enviarConsulta($q, $parametros);
            if(!is_null($resultado)){
                if(!is_object($resultado)){
                    return $resultado;
                }else{
                    $fila = $this->proveedor->fetchArray($resultado);
                    return $fila[0];
                }
            }
            return null;
        }
        
        public function ejecutar($q, $array_index=null, $parametros=null){
        
            $resultado = $this->enviarConsulta($q, $parametros);
            
            
            if((is_object($resultado) || $this->proveedor->numRows($resultado) || $resultado) && ($resultado !== true && $resultado !== false)){
                $arr = array();
                while($row = $this->proveedor->fetchArray($resultado)){
                   
                    if($array_index){
                        $arr[$row[$array_index]] = $row;
                        
                    }else {
                        $arr[] = $row; 
                    }
                    
                }
                return $arr;
            }
            
            print_r($this->proveedor->getErrorNo() ? false : true);
            return $this->proveedor->getErrorNo() ? false : true;
        }
        
        public function changeBD($bd){
            $this->proveedor->changeBD($bd);
        }
        
        public function getInsertedID (){
            return $this->proveedor->getInsertedID();
        }
        
        public function getError(){
            return $this->proveedor->getError();
        }
        
        public function __destruct(){
            $this->proveedor->disconnect();
        }
        
    }

?>