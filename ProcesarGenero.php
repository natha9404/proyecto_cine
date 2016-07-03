<?PHP

    require_once('tablas_active/genero.php');
    
    class ProcesarGenero{
        
        public function agregar($id, $titulo){
            $genero = new Genero();
            
            $genero->id_genero = $id;
            $genero->nombre = $titulo;
            
            $genero->save();
        }
        
        public function consultar($nombre){
            $genero = Genero::find_by_nombre($nombre);
            
            $id_genero = $genero->id_genero;
            
            return $id_genero;
        }
        
    }

?>