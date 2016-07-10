<?PHP

    require_once('tablas_active/lista_pelicula.php');
    
    $opcion = $_POST['opcion'];
    
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
    }
    
  
    class ProcesarListaPelicula{
        public function listar ($usuario, $lista){
            
            $listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=? AND nom_lista=?',$usuario,  $lista)));
            //$listas = lista_pelicula::find('all',array('conditions' => array('id_usuario=?',$usuario, 'nom_lista=?', $lista)));
            return $listas;
        }
        
        
    }
  
    
?>