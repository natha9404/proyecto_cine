<?PHP

    require_once('tablas_active/usuario_lista.php');
    
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