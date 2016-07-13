<?PHP

    require_once('tablas_active/usuario_lista.php');
    require('conexion.php');
    
    $opcion = $_POST['opcion'];
    
    if($opcion == 1){
        $actual2 = $_POST['actual2'];
        $usuario = $_POST['usuario'];
        $lista = $_POST['lista'];
        
        $usuario_lista = new usuario_lista();
        $usuario_lista->id_usuario = $usuario;
        $usuario_lista->nom_lista = $lista;
        
        
        $usuario_lista->save();
        
        //echo $pelicula;
        header('Location: '.'mi_lista.php?actual='.$actual2);    
        
    }else if($opcion == 2){
        $actual = $_POST['actual'];
        $usuario = $_POST['usuario'];
        $lista = $_POST['lista'];
        
        $query="DELETE FROM usuario_listas WHERE id_usuario='".$usuario."' AND nom_lista='".$lista."'";
	
	    $resultado=$mysqli->query($query);
	    
	    $query="DELETE FROM lista_peliculas WHERE id_usuario='".$usuario."' AND nom_lista='".$lista."'";
	
	    $resultado=$mysqli->query($query);
        
        /*$usuario_lista = new usuario_lista();
        $usuario_lista->id_usuario = $usuario;
        $usuario_lista->nom_lista = $lista;*/
        
        //$miLista = usuario_lista::find_by_id_usuario_and_nom_lista($usuario,$lista);
        
        //echo $miLista[0]->nom_lista;
        //$miLista->delete();
        //$usuario_lista->save();
        
		
		//$para->delete();
		//session_start();
		//header('Location: '.'Pagina_Admin.php');
        
        //echo $pelicula;
        //echo $actual;
        header('Location: '.'mi_lista.php?actual='.$actual);    
    }
    
    
    
    class ProcesarUsuariosListas {
        
        
        
        public function listas ($usuario){
            //$listas = usuario_lista::find_by_id_usuario($usuario);
            
             $listas = usuario_lista::find('all',array('conditions' => array('id_usuario=?',$usuario)));
            
            //$nombre_listas = $listas->nom_lista;
            
            //print_r ($listas);
            return $listas;
        }
        
        /*public function defecto ($usuario){
            $lista1 = 'por ver';
            $lista2 = 'vistas';
            $lista3 = 'recomendadas';
            
            echo $usuario;
            
            $ver = new usuario_lista();
            $ver->id_usuario = $usuario;
            $ver->nom_lista = $lista1;
            $ver->save();
            
            $vista = new usuario_lista();
            $vista->id_usuario = $usuario;
            $vista->nom_lista = $lista2;
            $vista->save();
            
            $rec = new usuario_lista();
            $rec->id_usuario = $usuario;
            $rec->nom_lista = $lista3;
            $rec->save();
            
        }*/
        
    }

?>