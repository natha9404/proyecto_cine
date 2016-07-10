<?PHP

    require_once('tablas_active/usuario_lista.php');
    
    $opcion = $_POST['opcion'];
    
    if($opcion == 1){
        $usuario = $_POST['usuario'];
        $lista = $_POST['lista'];
        
        $usuario_lista = new usuario_lista();
        $usuario_lista->id_usuario = $usuario;
        $usuario_lista->nom_lista = $lista;
        
        
        $usuario_lista->save();
        
        //echo $pelicula;
        header('Location: '.'mi_lista.php');    
    }
    
    
    
    class ProcesarUsuariosListas {
        
        
        
        public function listas ($usuario){
            //$listas = usuario_lista::find_by_id_usuario($usuario);
            
             $listas = usuario_lista::find('all',array('conditions' => array('id_usuario=?',$usuario)));
            
            //$nombre_listas = $listas->nom_lista;
            
            //print_r ($listas);
            return $listas;
        }
        
    }

?>