<?PHP
    
    require_once('ORM.php');
    require_once('tablas/Usuario.php');
    
    class Usuario_ORM extends ORM {
        public $usuario,$contrasena, $email, $fecha_nacimiento, $nombres,$apellidos;
        protected static $tabla = 'usuarios';
        protected static $ident = 'usuario';
        public function __construct($data) {
        parent::__construct();
        
        if ($data && sizeof($data)) {
                $this->populateFromRow($data);
            }
        }
        
        public function populateFromRow($data) {
            
            $this->usuario = isset($data['usuario']) ? $data['usuario'] : null;
            $this->contrasena = isset($data['contrasena']) ? $data['contrasena'] : null;
            $this->email = isset($data['email']) ? $data['email'] : null;
            $this->fecha_nacimiento = isset($data['fecha_nacimiento']) ? $data['fecha_nacimiento'] : null;
            $this->nombres = isset($data['nombres']) ? $data['nombres'] : null;
            $this->apellidos = isset($data['apellidos']) ? $data['apellidos'] : null;
        }
        
        
        public function guardarUsuarios($usuario, $contrasena, $email, $fecha_nacimiento, $nombres, $apellidos){
            $user = new Usuario();
            $user->usuario = $usuario;
            $user->contrasena = $contrasena;
            $user->email = $email;
            $user->fecha_nacimiento = $fecha_nacimiento;
            $user->nombres = $nombres;
            $user->apellidos = $apellidos;
            
            $salvar= ORM::save();
            $user->$salvar;
        }
    }

?>