<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<p>Bienvenid@
	<?php
	    /* Empezamos la sesión */
	    session_start();
	 
	    /* Creamos la sesión */
	    echo $_SESSION['username'];
	?>
</p>

<p>Gracias por registrase, espero disfrute sus películas preferidas.</p>

</body>
</html>