<?PHP

    require_once('tablas_active/lista_pelicula.php');
    require('conexion.php');
    
    $opcion = $_POST['opcion'];
    //echo $opcion;
    
    if($opcion == 1){
        $usuario = $_POST['id_usuario'];
        $pelicula = $_POST['id_pelicula'];
        $lista = $_POST['mi_combobox'];
        $peli = $_POST['nombre_peli'];
        
        $peli = str_replace(
			array('+'), array(' '), $peli
		);
        
        echo $peli;
        //echo $usuario;
        //echo $pelicula;
        
        $lista_pelicula = new lista_pelicula();
        $lista_pelicula->id_usuario = $usuario;
        $lista_pelicula->id_pelicula = $pelicula;
        $lista_pelicula->nom_lista = $lista;
        $lista_pelicula->nom_pelicula = $peli;
        
        $lista_pelicula->save();
        
        echo $pelicula;
        header('Location: '.'peli.php?id='.$pelicula);    
    }else if($opcion==2){
        $usuario = $_POST['usuario'];
        //$pelicula = $_POST['id_pelicula'];
        $lista = $_POST['comboboxMidificar'];
        $peli = $_POST['nombre_peli'];
        $listaAnterior = $_POST['anterior'];
        //echo $lista." ".$usuario." ".$peli." ".$listaAnterior ;
        
        $query="UPDATE lista_peliculas SET nom_lista='".$lista."' WHERE id_usuario='".$usuario."' AND nom_pelicula='".$peli."' AND nom_lista='".$listaAnterior."'";
	
	    $resultado=$mysqli->query($query);
	    
	    header('Location: '."mi_lista.php?actual=".$listaAnterior."");
    }
    
  
    class ProcesarListaPelicula{
        public function listar ($usuario, $lista){
            
            $listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=? AND nom_lista=?',$usuario,  $lista)));
            //$listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=?',$usuario, 'nom_lista=?', $lista)));
            return $listas;
        }
        
        
    }
  
    
?>