<?php
	require_once('tablas_active/pelicula.php');
	require_once('tablas_active/usuario.php');

	$opcion = $_POST['opcion'];

	if ($opcion == 1){ // Registrar un usuario en la aplicacion
		// obtengo los datos por POST
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$UserName = $_POST['UserName'];
		$Passwod = $_POST['Passwod'];
		$fecha = $_POST['fecha'];

		$usuario = new Usuario();
		$usuario->usuario = $UserName;
		$usuario->nombres = $nombre;
		$usuario->apellidos = $apellido;
		$usuario->contrasena = $Passwod;
		$usuario->email = $email;
		$usuario->fecha_nacimiento = $fecha;
		
		$usuario->save();
		session_start();
		$_SESSION['username'] = $UserName;

		header('Location: '.'Pagina_Pelicula_login.php');
	}else if($opcion == 2){ // iniciar sesion
		$UserName = $_POST['UserName'];
		$Passwod = $_POST['Passwod'];
		
		$usuario = Usuario::find_by_usuario($UserName);
		$pass = $usuario->contrasena;
		//echo $pass;
		//echo $Passwod;
		//echo 'cualquier cosa';
		//echo $UserName;
		if($Passwod == $pass){
			session_start();
			$_SESSION['username'] = $UserName;
	
			header('Location: '.'Pagina_Pelicula_login.php');
		}else{
			header('Location: '.'login_error.php');
		}
		
		
	}else if($opcion == 3){ // registrar pelicula

	}

	
	/*$post = Usuario::find_by_nombres('edison felipe');
	$post -> contrasena = '123456';
	$post->save();
	
	echo $post->contrasena;
	
	$hola = Usuario::find_by_usuario('mamian');
	$hola->delete();*/
	
?>