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
    
?>
