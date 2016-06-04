<?php

require('rb.php');

R::setup('mysql:host=127.0.0.1;dbname=c9','mamian','desarrollo2');

//Beans

$user= R::dispense('usuarios');
$user->usuario = 'natha9404';
$user->contrasena = 'hola';
$user->nombres = 'nathalia';
$user->apellidos = 'bedoya';
$user->fecha_nacimiento = '1995-04-04';
$user->email = 'natha9404';
$id = R::store($user);
echo $id;

