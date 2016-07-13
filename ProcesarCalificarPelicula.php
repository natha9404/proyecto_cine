<?PHP

    require_once('tablas_active/calificar_pelicula.php');
    //('ProcesarUsuariosListas.php');
    require('conexion.php');
    
    $opcion = $_POST['opcion'];
    //echo $_POST['opcion'];
    
    if($opcion == 1){
        $usuario = $_POST['usuario'];
        $pelicula = $_POST['peli'];
        $lista = $_POST['mi_combobox'];
        $calificacion = $_POST['calificacion'];
        
        //echo $usuario;
        //echo $pelicula;
        
        $calificar_pelicula = new Calificar_pelicula();
        $calificar_pelicula->id_usuario = $usuario;
        $calificar_pelicula->id_pelicula = $pelicula;
        $calificar_pelicula->calificacion = $calificacion;
        
        $calificar_pelicula->save();
        
        
        
        //echo $pelicula;
        header('Location: '.'peli.php?id='.$pelicula."&calificacion=".$calificacion);    
    }else if($opcion == 2){
        $usuario = $_POST['usuario'];
        $pelicula = $_POST['peli'];
        $lista = $_POST['mi_combobox'];
        $calificacion = $_POST['calificacion'];
        
        //echo $usuario;
        //echo $pelicula;
        
        /*$calificar_pelicula = new Calificar_pelicula();
        $calificar_pelicula->id_usuario = $usuario;
        $calificar_pelicula->id_pelicula = $pelicula;
        $calificar_pelicula->calificacion = $calificacion;*/
        
        $nuevo = calificar_pelicula::find_all_by_id_usuario_and_id_pelicula($usuario,$pelicula);
        
        
        $query="UPDATE calificar_peliculas SET calificacion='".$calificacion."' WHERE id_usuario='".$usuario."' AND id_pelicula='".$pelicula."'";
	
	    $resultado=$mysqli->query($query);
        
        //$nuevo->update_attributes(array('calificacion'=>$calificacion));
        
        //$calificar_pelicula->save();
        //$nuevo ->update_attributes(array(/*'id_usuario'=>$usuario, 'id_pelicula'=>$pelicula,*/ 'calificacion'=>$calificacion));
        //Post::table()->update(array('calificacion' => $calificacion, array('id_usuario=? AND id_pelicula=?',$usuario,  $pelicula)));
        
        $nuevo[0]->id_usuario = "Pruebaaaaa";
        //echo $nuevo[0]->id_usuario;
        echo $nuevo[0]->id_pelicula;
        //echo $pelicula;
        header('Location: '.'peli.php?id='.$pelicula."&calificacion=".$calificacion);
    }
    
  
    class ProcesarCalificarPelicula{
        public function obtenerCalificacion ($usuario,$id_pelicula){
            //$listas = usuario_lista::find_by_id_usuario($usuario);
            
             //$listas = usuario_lista::find('all',array('conditions' => array('id_usuario=?',$usuario)));
            $arreglo = calificar_pelicula::find('all',array('conditions' => array('id_usuario=? AND id_pelicula=?',$usuario,  $id_pelicula)));
            //$nombre_listas = $listas->nom_lista;
            $miCalificacion=$arreglo[0]->calificacion;
            //print_r ($listas);
            return $miCalificacion;
        }
    }
  
    
?>