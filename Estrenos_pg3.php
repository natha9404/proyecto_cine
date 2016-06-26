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

						
	  </article>

		
<header>
	    <h2>ESTRENOS</h2>
								  <p>Desarrollado por: puntosoft</p>
								</header>
						
						<table class="tablaPeliculas">
							<?php 
							function leer_contenido_completo($url){
								$fichero_url = fopen ($url, "r");
									$texto = "";
									while ($trozo = fgets($fichero_url, 1024)){
    									$texto .= $trozo;
									}
									return $texto;
							}	
							
							$URL_API = "https://api.themoviedb.org/3/movie/upcoming?page=3&api_key=c7f7381bc44cd24b332ccc18f24fc126";
							
							$contenido_url = leer_contenido_completo($URL_API);
							
							$JSON = json_decode($contenido_url);
							
							$x=0;
							
							foreach($JSON->results as $movie){
								if(($x % 3 == 0)||($x==0)){
									echo "<tr id=filas>";
								}
								echo "<td>";
									echo "<a href="."peli.php"."?id=".$movie->id.">";
											echo "<img src="."http://image.tmdb.org/t/p/w185/".$movie->poster_path."></img>";
											//echo "<small>".$movie->original_title."</small>";
											echo "<p id="."titulopelicula".">".$movie->original_title."</p>";
									echo "</a>";
								echo "</td>";
								if((($x + 1) % 3) == 0){
									echo "</tr>";
								}
								$x += 1;
							}
							
							?>
							<!--
							<tr id="filas">
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/espias.png"></img>
									</a>
								</td>
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/san_andreas.png"></img>
									</a>
								</td>
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/child44.png"></img>
									</a>
								</td>
							</tr>
							
							<trid="filas">
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/snoopy.png"></img>
									</a>
								</td>
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/phoenix.png"></img>
									</a>
								</td>
								<td>
									<a href="peli.php">
										<img src="./images/peliculas/fant4stic.png"></img>
									</a>
								</td>
							</tr>
							-->
						</table>
							
						<p><a href="Estrenos_pg2.php">Pagina Anterior</a></p>
						<p><a href="Estrenos_pg3.php">Pagina Siguente</a></p>
						
                                

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