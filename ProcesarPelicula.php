<?PHP

    require_once('tablas_active/pelicula.php');
    
    class ProcesarPelicula{
        
        public function agregar($id, $titulo){
            $pelicula = new Pelicula();
            
            $pelicula->id_pelicula = $id;
            $pelicula->nombre = $titulo;
            
            $pelicula->save();
        }
        
    }

?>