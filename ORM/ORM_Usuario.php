<?PHP
    class ORM_Usuario {
        private static $basedatos;
        protected static $tabla = 'usuarios';
        
        function __construct(){
            self::getConnection();
        }
        
        private static function getConnection(){
            require_once('BaseDatos.php');
            self::$basedatos = BaseDatos::getConexion('ProveedorMySQL.php', '127.0.0.1', 'mamian', 'desarrollo2', 'c9');
            
        }
        
        public static function encontrar($id){
            $resultado = self::where('id', $id);
            return $resultado[0];
        }
        
        public static function where ($campo, $valor){
            $obj = null;
            self::getConnection();
            $query = "SELECT * FROM" . stat::$tabla . " WHERE " . $campo . " = ?";
            $resultados = self::$basedatos->ejecutar($query, null, array($valor));
            
            if($resultados){
                $class = get_called_class();
                for($i=0; $i<sizeof($resultados); $i++){
                    $obj [] = new $class($resultados[$i]);
                }
            }
            
            return $obj;
        }
        
        public function save() {
            $values = get_object_vars($this);
            $filtered = null;
            foreach ($values as $key => $value) {
                if ($value !== null && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id') {
                    if ($value === false) {
                        $value = 0;
                    }
                    $filtered[$key] = $value;
                }
            }
            $columns = array_keys($filtered);
            if ($this->id) {
                $columns = join(" = ?, ", $columns);
                $columns.= ' = ?';
                $query = "UPDATE " . static ::$table . " SET $columns WHERE id =" . $this->id;
            } else {
                $params = join(", ", array_fill(0, count($columns), "?"));
                $columns = join(", ", $columns);
                $query = "INSERT INTO " . static ::$table . " ($columns) VALUES ($params)";
            }
            $result = self::$database->execute($query, null, $filtered);
            if ($result) {
                $result = array('error' => false, 'message' => self::$database->getInsertedID());
            } else {
                $result = array('error' => true, 'message' => self::$database->getError());
            }
            return $result;
        }
    }
?>