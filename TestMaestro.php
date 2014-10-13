<?php
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
$seguridad->seguridadAdmon($nivel);

require_once('Maestro.php');
//Creacion de objeto alumno
$maestro = new Maestro();
///llamada de metodo para crear usuario
$maestro->createUsuario();
?>