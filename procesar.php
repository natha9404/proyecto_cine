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
		$Confirmar = $_POST['Confirmar'];
		
		if($Passwod == $Confirmar)
			{

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
			
			}
		else{
			
			header('Location: '.'index1.php');
			
		}	
		
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
			if($UserName = 'admin'){
				session_start();
				$_SESSION['username'] = $UserName;
		
				header('Location: '.'Pagina_Admin.php');
			}else{
				session_start();
				$_SESSION['username'] = $UserName;
		
				header('Location: '.'Pagina_Pelicula_login.php');
			}
			
			
		}else{
			header('Location: '.'login_error.php');
		}
		
		
	}else if($opcion == 3){ // modificar usuario
		
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$UserName = $_POST['UserName'];
		$Passwod = $_POST['Passwod'];
		$fecha = $_POST['fecha'];
		
		echo $usuario1;
		echo $fecha1;
		
		$usuario = new Usuario();
		$usuario->usuario = $UserName;
		$usuario->nombres = $nombre;
		$usuario->apellidos = $apellido;
		$usuario->contrasena = $Passwod;
		$usuario->email = $email;
		$usuario->fecha_nacimiento = $fecha;
		
		echo $UserName;
		
		$nuevo = Usuario::find_by_usuario($UserName);
		
		$nuevo ->update_attributes(array('nombres'=>$nombre, 'apellidos'=>$apellido, 'email'=>$email, 'contrasena'=>$Passwod));
		
		//$nuevo->save();
		session_start();
		$_SESSION['username'] = $UserName;

		header('Location: '.'Pagina_Pelicula_login.php');
	}else if($opcion ==4) {
		
			session_start();
			$hola = Usuario::find_by_usuario($_SESSION['username']);
			echo 'hola';
			echo  $_SESSION['username'];
			$hola->delete();
			header('Location: '.'logout.php');
		
	}else if($opcion ==5){
		$UserName = $_POST['UserName'];
		$para = Usuario::find_by_usuario($UserName);
		$para->delete();
		session_start();
		header('Location: '.'Pagina_Admin.php');
	}
	
	
	
	
	
	
	class procesar {
		public function encontrar_usuario($usuario){
		$hola = Usuario::find_by_usuario($usuario);
		return $hola;
		}
		
		public function listar(){
			$lista = Usuario::all();
			return $lista;
		}
		
		public function eliminar_admin($usuario){
			$dos = Usuario::find_by_usuario($usuario);
			$dos->delete();
		}
	}
	
	
	/*$post = Usuario::find_by_nombres('edison felipe');
	$post -> contrasena = '123456';
	$post->save();
	
	echo $post->contrasena;
	
	$hola = Usuario::find_by_usuario('mamian');
	$hola->delete();*/
	
?>