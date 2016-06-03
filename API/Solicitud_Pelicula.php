<?PHP

    class Solicitu_Pelicula {
        const _API_URL_ = "http://api.themoviedb.org/3/";
        
        private $_apikey;
        private $_leng;
        private $_imgUrl;
        
        function _construct($apikey){
            $this->setApikey($apikey);
            $this->setLeng();
            
            $conf = $this->getConfig();
            
            if(empty($conf)){
                    echo "Imposible leer la configuracion, verifique que la Apikey sea correcta";
                    exit;
            }
            
            $this->setImgUrl($imgUrl);
        }
        
        public function titulosPelicula($idPelicula){
            $tituloTemp = $this -> infoPelicula ($idPelicula, "alternative_titles", false);
            
            foreach ($tituloTemp['titles'] as $tituloArr) {
                $titulo[]=$tituloArr['title']." - ".$tituloArr['iso_3166_1'];
            }
            
            return $titulo;
        }
        
        public function traduccionPelicula($idPelicula){
            $traduccionTemp = $this-> infoPelicula ($idPelicula, "translations", false);
            
            foreach ($traduccionTemp['translations'] as $traduccionArr) {
                $traduccion[] = $traduccionArr['english_name']. " - " .$traduccionArr['iso_639_1']; 
            }
            
            return $traduccion;
        }
        
        public function trailerPelicula($idPelicula){
            $trailer = $this->infoPelicula($idPelicula, "trailers", false);
            return $trailer;
        }
        
        public function detallePelicula($idPelicula){
            $detalle = $this->infoPelicula($idPelicula, "", false);
            return $detalle;
        }
        
        public function posterPelicula($idPelicula){
            $posters = $this -> infoPelicula($idPelicula, "images", false);
            $posters = $posters['posters'];
            return posters;
        }
        
        public function actoresPelicula($idPelicula){
            $actoresTemp = $this->infoPelicula($idPelicula, "casts", false);
            
            foreach($actoresTemp['cast'] as $actorArr){
                $actores[]=$actorArr['name']." - ".$actorArr['character'];
            }
            
            return $actores;
        }
        
        public function infoPelicula($idPelicula, $opcion="", $print=false){
            $opcion = (empty($opcion))?"":"/".$opcion;
            $parametros = "movie/". $idPelicula . $opcion;
            $pelicula = $this->_llamada($parametros,"");
            return $pelicula;
        }
        
        public function buscarPelicula ($tituloPelicula, $ano=-1, $pagina=-1){
            $busquedaArr = "query=".urlencode($tituloPelicula);
            if($ano>-1){
                $busquedaArr.="&year".urlencode($ano);
            }
            if($pagina>-1){
                $busquedaArr.="&page".urlencode($pagina);
            }
            
            return $this->_llamada("search/movie",$busquedaArr, "");
            
        }
        
        public function getConfig(){
            return $this->_llamada("configuration", "");
        }
        
        private function _llamada($accion, $texto, $leng = ""){
            $leng = (empty($leng))?$this->getLeng():$leng;
            $url = Solicitu_Pelicula::_API_URL_.$accion."?api_key=".$this->getApiKey()."&language=".$leng."&".$texto;
            
            $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
    			curl_setopt($ch, CURLOPT_HEADER, 0);
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    			curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    			
    		$resultados = curl_exec($ch);
    		$encabezados = curl_getinfo($ch);
    		
    		$numero_error = curl_errno($ch);
    		$mensaje_error = curl_error($ch);
    		
    		curl_close($ch);
    		
    		$resultados = json_decode(($resultados), true);
    		return (array) $resultados;
        }
        
        private function setApikey ($apikey){
            $this->_apikey = (string) $apikey;
        }
        
        private function getApiKey (){
            return $this->_apikey;
        }
        
        public function setLeng($leng="es"){
            $this->_leng = $leng;
        }
        
        public function getLeng(){
            return $this->_leng;
        }
        
        public function setImgUrl ($config){
            $this -> _imgUrl = (string) $config['images']["base_url"];
        }
        
        public function getImgUrl (){
            return $this->_imgUrl . "original";
        }
    }

?>
