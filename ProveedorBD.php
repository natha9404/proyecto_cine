<?PHP

    abstract class ProveedorBD {
        protected $recurso;
        public abstract function connect($host, $usario, $contrasena, $nombrebd);
        public abstract function disconnect();
        public abstract function getErrorNo();
        public abstract function getError();
        public abstract function query($q);
        public abstract function numRows($recurso);
        public abstract function fetchArray($recurso);
        public abstract function isConnected();
        public abstract function scape($var);
        public abstract function getInsertedID();
        public abstract function changeBD($bd);
        public abstract function setCharset($charset);
    }
    /*
    $link = mysql_connect('127.0.0.1', 'mamian', '')
        or die ("No se pudo conectar: ".mysql_error());
    
    
    mysql_select_db('c9') or die (" No se pudo conectar a la base de datos");
    */
?>
