<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
 <?php
		session_start();
		//manejamos en sesion el nombre del usuario que se ha logeado
		if (!isset($_SESSION['username'])){
    		
    
		}
		if (! empty($_SESSION['username'])) 
	$_SESSION['username'];
?>


<html>
	<head>
		<title>Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body background="images/pic02.jpg">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><img src="images/logo.png" width="250" height="52"></a></h1>
						<nav class="links">
							<ul>
							  <li><a href="#">EN CARTELERA</a></li>
                             
                              <li>
                              <?php
              //CREAR INICIO SESION 
				 if (! empty($_SESSION['username'])) 
				 
				 //FALTA CREAR LOGOUT
 				 echo '<a href="logout.php">Cerrar Sesion</a>';
 				else
 				echo '<a href="login.php">Iniciar Sesion</a>';
 				 ?>
  </li>
                              
						
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									 
									
									 <li>
										 <?php
              //CREAR INICIO SESION 
				 if (! empty($_SESSION["username"])) 
				 
				 //FALTA CREAR LOGOUT
 				 echo '<a href="mi_lista.php"><h2>Mi lista de Peliculas</h2></a>';
 				
 				 ?>
									</li>
									
									
									<li>
										<a href="Estrenos.php">
										<h2>ESTRENOS</h2>
										
										</a>
									</li>
									<li>

										<a href="Mejor_puntuadas.php">
										<h2>MEJOR PUNTUADAS</h2>
										</a>
									</li>
									<li>
										<a href="Mas_Visitadas.php">
										<h2>MAS VISITADAS</h2>
										
										</a>
									</li>
									<li>
										<a href="acerca.php">
											<h2>ACERCA DE MOVIE</h2>
											
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							

					</section>

				<!-- Main -->
	<div id="main">

						<!-- Post --> <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

						<!-- Post ---> 
							<article class="post">
							  <header> </header>
                              <center><h3> PELICULAS</h3></center>
								<!--
								<center><iframe width="560" height="315" src="https://www.youtube.com/embed/vKa_wDG2mxg" frameborder="0" allowfullscreen></iframe></a></center>
								-->
                                
                              <div class="ec-stars-wrapper">
	<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
	<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
	<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
	<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
	<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
    <a href="#" data-value="1" title="Votar con 6 estrellas">&#9733;</a>
	<a href="#" data-value="2" title="Votar con 7 estrellas">&#9733;</a>
	<a href="#" data-value="3" title="Votar con 8 estrellas">&#9733;</a>
	<a href="#" data-value="4" title="Votar con 9 estrellas">&#9733;</a>
	<a href="#" data-value="5" title="Votar con 10 estrellas">&#9733;</a>
</div>
<noscript>Necesitas tener habilitado javascript para poder votar</noscript>
                                
								
									<?php
									
										include 'API/TMDb.php';
										//include 'API/tmbd-api.php';
										
										$api_key = 'c7f7381bc44cd24b332ccc18f24fc126';
										
										
										
										//$tmdb2 = new TMDB();
										//$tmdb = new TMDb($api_key);
										
										function leer_contenido_completo($url){
											$fichero_url = fopen ($url, "r");
											$texto = "";
											while ($trozo = fgets($fichero_url, 1024)){
    											$texto .= $trozo;
											}
											return $texto;
										}
										
										
										//$json = json_decode($tmdb->searchMovie($_GET['term']));
										//$json = json_decode($tmdb->titulosPelicula('551'));
										
										$id_pelicula=325789;
										$URL_API_PANORAMIO = "https://api.themoviedb.org/3/movie/".$id_pelicula."?api_key=c7f7381bc44cd24b332ccc18f24fc126";
										//$URL_API_PANORAMIO = "https://api.themoviedb.org/3/movie/254578?api_key=c7f7381bc44cd24b332ccc18f24fc126";
										//$URL_API_PANORAMIO = "https://api.themoviedb.org/3/discover/movie?primary_release_year=2010&sort_by=vote_average.desc";
										//$URL_API_PANORAMIO = "https://api.themoviedb.org/3/movie/550?api_key=c7f7381bc44cd24b332ccc18f24fc126";
										//https://api.themoviedb.org/3/movie/254578?api_key=c7f7381bc44cd24b332ccc18f24fc126
										//http://api.themoviedb.org/3/search/movie?api_key=c7f7381bc44cd24b332ccc18f24fc126&query=Phoenix
										//http://api.themoviedb.org/3/configuration?api_key=c7f7381bc44cd24b332ccc18f24fc126
										//http://api.themoviedb.org/3/search/movie?query=Monsters+University&api_key=c7f7381bc44cd24b332ccc18f24fc126
										//http://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=c7f7381bc44cd24b332ccc18f24fc126
										//http://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=c7f7381bc44cd24b332ccc18f24fc126
										//https://api.themoviedb.org/3/movie/popular?api_key=c7f7381bc44cd24b332ccc18f24fc126
										
										$contenido_url = leer_contenido_completo($URL_API_PANORAMIO);
				
										
										/*echo "<p>";
										echo $contenido_url;
										echo "</p>";*/
										
										$JSON_PANORAMIO_PHP = json_decode($contenido_url);
										//$JSON_PANORAMIO_PHP = json_decode($tmdb->searchMovie('Phoenix'));
										
										/////////////////////////////////////////
										/*
										//$json = json_decode($tmdb->searchMovie('Phoenix'));
										//$json = json_decode($tmdb->getMovie("551"));
										
										
										//$URL = "http://api.themoviedb.org/3/search/movie?api_key=c7f7381bc44cd24b332ccc18f24fc126&query=deadpool";
										$URL = "https://api.themoviedb.org/3/movie/553?api_key=c7f7381bc44cd24b332ccc18f24fc126";
										$contenido = leer_contenido_completo($URL);
										$json= json_decode($contenido);
										
										
										
										$response = array();

										$i=0;
										foreach($json as $movie){
										
											// Only movies existing in the IMDB catalog (and are not adult) are shown
										
											if(!$movie->imdb_id || $movie->adult) continue;
											if($i >= 8 ) break;
										
											// The jQuery autocomplete widget shows the label in the drop down,
											// and adds the value property to the text box.
										
											$response[$i]['value'] = $movie->name;
											$response[$i]['label'] = $movie->name . ' <small>(' . date('Y',strtotime($movie->released)).')</small>';
											$i++;
										}
										
										echo $json->original_title;
										//echo $response[0]['value'];
										*/
										/*
										$jsondec = json_encode($response);
										echo "<p>";
										//echo json_encode($response);
										echo "</p>";
										*/
										/////////////////////////////////////////
										/*
										$arreglo = $tmdb->getMovie("551");
										//$string = $tmdb->getVersion('movie/550');
										//$a = $tmdb->searchMovie('Phoenix');
										$filepath = $JSON_PANORAMIO_PHP->poster_path;
										//$imagen = $tmdb->getImageUrl($filepath,IMAGE_POSTER,60);
										$cast = $tmdb->getMovieCast(550);
										echo "<p>";
										echo $arreglo[0]->original_title;
										//echo $string;
										//echo $JSON_PANORAMIO_PHP;
										//echo $a[0];
										//echo "<img src=".$imagen."></img>";
										echo "</p>";
										*/
										//$JSON_PANORAMIO_PHP = json_decode($tmdb->getMovie("551"));
										
										$id = $JSON_PANORAMIO_PHP->id;
										$URL_trailer="http://api.themoviedb.org/3/movie/".$id."/videos?api_key=c7f7381bc44cd24b332ccc18f24fc126";
										$contenido_url_trailer = leer_contenido_completo($URL_trailer);
										/*echo "<p>";
										echo $contenido_url_trailer;
										echo "</p>";*/
										
										$JSON_trailer = json_decode($contenido_url_trailer);
										/*echo "<p>";
										echo $JSON_trailer->results[0]->key;
										echo "</p>";*/
										//echo "trailer: "."<src="."https://www.youtube.com/watch?v=".$JSON_trailer->results[0]->key.">"; 
										
										echo "<p>";
										echo "<center><iframe width=560 height=315 src='"."https://www.youtube.com/embed/".$JSON_trailer->results[0]->key."'frameborder=0 allowfullscreen></iframe></a></center>";
										echo "</p>";
										
										//echo "<center><iframe width=560 height=315 src='"."https://www.youtube.com/embed/vKa_wDG2mxg"."'frameborder=0 allowfullscreen></iframe></a></center>";
										//echo "<center><iframe width=560 height=315 src='".$JSON_PANORAMIO_PHP->homepage."'frameborder=0 allowfullscreen></iframe></a></center>";
										//echo "<img src='" . $JSON_PANORAMIO_PHP->poster_path . "' width='" . $foto_actual->width . "' height='" . $foto_actual->height . "'>";
										
										//echo "<p>";
										//echo "<img src='" . $JSON_PANORAMIO_PHP->poster_path . "'>";
										//echo "</p>";
										
										echo "<p>";
										echo "Titulo Original: " . $JSON_PANORAMIO_PHP->title;
										echo "</p>";
										
										echo "<p>" . "Año: ". substr($JSON_PANORAMIO_PHP->release_date,0,4) . "</p>";
										
										echo "<p>" . "Duración: ". $JSON_PANORAMIO_PHP->runtime. " min" . "</p>";
										
										echo "<p>" . "Género: ". $JSON_PANORAMIO_PHP->genres[0]->name . "</p>";
										
										echo "<p>" . "Sinopsis: ". $JSON_PANORAMIO_PHP->overview . "</p>";
										
										/*
										echo "<p>";
										echo "Género: ";
										for($i=0; next(genres))
										echo $JSON_PANORAMIO_PHP->genres[0]->name
										echo "</p>";
										*/
										
										/*echo "<hr>";
										
										//echo $JSON_PANORAMIO_PHP->count; //esto muestra el número de fotos totales que existen en Panoramio en esa localización
										for ($i=0; $i<count($JSON_PANORAMIO_PHP->photos); $i++){
										   $foto_actual = $JSON_PANORAMIO_PHP->photos[$i];
										   echo "<p>";
										   echo "<img src='" . $foto_actual->photo_file_url . "' width='" . $foto_actual->width . "' height='" . $foto_actual->height . "'>";
										   echo "<br>";
										   echo "<small>" . $foto_actual->photo_title . ", por " . $foto_actual->owner_name . "</small>";
										   echo "</p>";
										}*/
										/*function leer_contenido_completo($url){
											$fichero_url = fopen ($url, "r");
											$texto = "";
											while ($trozo = fgets($fichero_url, 1024)){
    											$texto .= $trozo;
											}
											return $texto;
										}
										
										$URL_API_PANORAMIO = "http://www.panoramio.com/map/get_panoramas.php?order=popularity&set=full&from=0&to=5&minx=-0.35&miny=39.44&maxx=-0.34&maxy=39.46&size=medium";
										
										$contenido_url = leer_contenido_completo($URL_API_PANORAMIO);
										
										echo $contenido_url;
										
										$JSON_PANORAMIO_PHP = json_decode($contenido_url);
										
										echo "<hr>";
										
										//echo $JSON_PANORAMIO_PHP->count; //esto muestra el número de fotos totales que existen en Panoramio en esa localización
										for ($i=0; $i<count($JSON_PANORAMIO_PHP->photos); $i++){
										   $foto_actual = $JSON_PANORAMIO_PHP->photos[$i];
										   echo "<p>";
										   echo "<img src='" . $foto_actual->photo_file_url . "' width='" . $foto_actual->width . "' height='" . $foto_actual->height . "'>";
										   echo "<br>";
										   echo "<small>" . $foto_actual->photo_title . ", por " . $foto_actual->owner_name . "</small>";
										   echo "</p>";
										}*/
										
										//http://image.tmdb.org/t/p/w185/bI7SEgPy1SEZFmOeYmP8keskIrU.jpg/
									?>
								
								
								
								<!--
								<p>Reparto: Nina Hoss, Ronald Zehrfeld, Uwe Preuss, Nina Kunzendorf, Michael Maertens, Uwe Preuss, Imogen Kogge, Eva Bay, Kirsten Block, Megan Gay, Valerie Koch </p>
								
								<p>Sinopsis :Una cantante es traicionada y enviada a un campo de concentración. Al finalizar su calvario, vuelve con la cara totalmente desfigurada y pide a un eminente cirujano que se la reconstruya para que sea lo más parecida a como era antes. Recuperada de la operación empieza a buscar a su marido, un pianista. Pero el reencuentro no es lo que ella esperaba. </p>
								<p>(FILMAFFINITY) </p>
								<p>Cine Colombia Chipichape Martes, Mayo 3 de 2016 </p>
								<p>| Avenida 6A Norte N° 37N-25 3D - Hablada en Español 3D - Subtítulos en Español 11:50 am12:45 pm02:55 pm03:45 pm 01:30 pm04:40 pm07:50 pm09:45 pm </p>
								<p>Cine Colombia Cosmocentro Martes, Mayo 3 de 2016 </p>
								<p>| Calle 5 N° 50-103 2D - Hablada en Español 3D - Hablada en Español 11:40 am01:50 pm02:50 pm 03:30 pm05:30 pm06:30 pm08:50 pm09:30 pm <br>
							  </p>
							  -->
							  
								<footer>
									<ul class="actions">
										<li></li>
									</ul>
									<ul class="stats">
										<li></li>
										<li></li>
										<li></li>
									</ul>
								</footer>
							</article>

						<!-- Post 
	  <article class="post">
		<header>
		  <div class="title">
										<h2><a href="#">Euismod et accumsan</a></h2>
			<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-22">October 22, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Cras vehicula tellus eu ligula viverra, ac fringilla turpis suscipit. Quisque vestibulum rhoncus ligula.</p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

						<!-- Post -->
						<!--
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Elements</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-18">October 18, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header>

								<section>
									<h3>Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
  print 'Iteration ' + i;
  deck.shuffle();
  i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3>Lists</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<h4>Unordered</h4>
											<ul>
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
											<h4>Alternate</h4>
											<ul class="alt">
												<li>Dolor pulvinar etiam.</li>
												<li>Sagittis adipiscing.</li>
												<li>Felis enim feugiat.</li>
											</ul>
										</div>
										<div class="6u$ 12u$(medium)">
											<h4>Ordered</h4>
											<ol>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis viverra.</li>
												<li>Felis enim feugiat.</li>
												<li>Dolor pulvinar etiam.</li>
												<li>Etiam vel felis lorem.</li>
												<li>Felis enim et feugiat.</li>
											</ol>
											<h4>Icons</h4>
											<ul class="icons">
												<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
											</ul>
										</div>
									</div>
									<h3>Actions</h3>
									<div class="row">
										<div class="6u 12u$(medium)">
											<ul class="actions">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
											<ul class="actions vertical">
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
												<li><a href="#" class="button">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
												<li><a href="#" class="button small">Small</a></li>
											</ul>
										</div>
										<div class="6u 12u$(medium)">
											<ul class="actions vertical">
												<li><a href="#" class="button fit">Default</a></li>
												<li><a href="#" class="button fit">Default</a></li>
											</ul>
											<ul class="actions vertical small">
												<li><a href="#" class="button small fit">Small</a></li>
												<li><a href="#" class="button small fit">Small</a></li>
											</ul>
										</div>
									</div>
								</section>

								<section>
									<h3>Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3>Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button big">Big</a></li>
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions fit">
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
										<li><a href="#" class="button fit">Fit</a></li>
									</ul>
									<ul class="actions fit small">
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
										<li><a href="#" class="button fit small">Fit + Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-upload">Icon</a></li>
										<li><a href="#" class="button icon fa-save">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button disabled">Disabled</span></li>
										<li><span class="button disabled icon fa-download">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3>Form</h3>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Category -</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-normal" name="demo-priority">
												<label for="demo-priority-normal">Normal</label>
											</div>
											<div class="4u$ 12u$(small)">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="6u 12u$(small)">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="6u$ 12u$(small)">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="12u$">
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>

								<section>
									<h3>Image</h3>
									<h4>Fit</h4>
									<div class="box alt">
										<div class="row uniform">
											<div class="12u$"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic05.jpg" alt="" /></span></div>
											<div class="4u"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
											<div class="4u$"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
										</div>
									</div>
									<h4>Left &amp; Right</h4>
									<p><span class="image left"><img src="images/pic07.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
									<p><span class="image right"><img src="images/pic04.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
								</section>

							</article>
						-->

						<!-- Pagination
							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul>
 -->
					</div>

				<!-- Sidebar -->
	<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
<header>
	    <h2>CINE DEL BUENO</h2>
								  <p>Desarrollado por: puntosoft</p>
								</header>
							</section>

						<!-- Mini Posts 
							<section>
								<div class="mini-posts">

									<!-- Mini Post 
										<article class="mini-post">
											<header>
												<h3><a href="#">Vitae sed condimentum</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
										</article>

									<!-- Mini Post 
										<article class="mini-post">
											<header>
												<h3><a href="#">Rutrum neque accumsan</a></h3>
												<time class="published" datetime="2015-10-19">October 19, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
										</article>

									<!-- Mini Post 
										<article class="mini-post">
											<header>
												<h3><a href="#">Odio congue mattis</a></h3>
												<time class="published" datetime="2015-10-18">October 18, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
										</article>

									<!-- Mini Post 
										<article class="mini-post">
											<header>
												<h3><a href="#">Enim nisl veroeros</a></h3>
												<time class="published" datetime="2015-10-17">October 17, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
										</article>
			-->
								</div>
							</section>

						<!-- Posts List 
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
                                -->
							</section>

						<!-- About 
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
                                
	-->						</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
								  <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
							  </ul>
								<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
	</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>