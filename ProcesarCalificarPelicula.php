<?PHP

    require_once('tablas_active/calificar_pelicula.php');
    
    $opcion = $_POST['opcion'];
    
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
        header('Location: '.'peli.php?id='.$pelicula);    
    }
    
  
    class ProcesarCalificacionPelicula{
        public function listar ($usuario, $lista){
            
            $listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=? AND nom_lista=?',$usuario,  $lista)));
            //$listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=?',$usuario, 'nom_lista=?', $lista)));
            return $listas;
        }
        
        
    }
  
    
?>