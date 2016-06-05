<?PHP
    
    require_once ("ProveedorBD.php");
    
    class ProveedorMySQL extends ProveedorBD {
        /*
        * Con esta funcion nos conectamos a la base de datos
        * En caso de haber un error se almacena en el LOG de errores de PHP
        */
        public function connect ($host, $usuario, $contrasena, $nombrebd){
            $this -> recurso = new mysqli($host, $usuario, $contrasena, $nombrebd);
            
            if($this->recurso->connect_errno){
                //la conexion fallo
                error_log($this->recurso->connect_error);
            }
            
            return $this->recurso;
        }
        /*
        * Cone esta funcion nos desconectamos de la base de datos
        */
        public function disconnect (){
            return $this->recurso->close();
        }
        /*
        * Esta función nos devuelve el número de error (en caso de haberlo)
        * al haberse ejecutado una consulta o procedimiento.
        */
        public function getErrorNo (){
            return $this->recurso->errno;
        }
        
        /*
        * Esta función nos devuelve el mensaje de error (sin el número).
        */
        public function getError () {
            return $this->recurso->error;
        }
        
        /*
        * Esta función se encarga de realizar una consulta a la base de datos.
        */
        public function query ($q) {
            
            return $this->recurso->query($q);
        }
        
        /*
        * Esta función nos devuelve el número de filas seleccionadas, 
        * actualizadas, insertadas o eliminadas
        */
        public function numRows($recurso){
            $num_rows = 0;
            
            if ($recurso){
                $num_rows = $recurso->num_rows;
            }
            
            return $num_rows;
        }
        
        /*
        * Esta funcion asocia la fila que devuelve la consulta con un array
        */
        public function fetchArray($resultado){
            return $resultado->fetch_assoc();
        }
        
        /*
        * Esta conexion nos dice si estamos conectados o no a la base de datos
        */
        public function isConnected (){
            return !is_null($this->recurso);
        }
        
        /*
        * Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL
        * tomando en cuenta el conjunto de caracteres actual de la conexión
        */
        public function scape ($var){
            
            return $this->recurso->real_escape_string($var);
        }
        
        /*
        * Devuelve el id autogenerado que se utilizó en la última consulta
        */
        public function getInsertedID (){
            return $this->recurso->insert_id;
        }
        
        /*
        * Esta funcion permite cambiar de base de datos
        */
        public function changeBD ($bd){
            return $this->recurso->select_db($bd);
        }
        
        /*
        * Esta funcion establece el conjunto de caracteres predeterminado
        */
        public function setCharset ($charset){
            return $this->recurso->set_charset($charset);
        }
    }
?>