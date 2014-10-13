<?php
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
$seguridad->seguridadAdmon($nivel);
    require_once('Alumno.php');
    //Creacion de objeto alumno
    $alumno = new Alumno();
    ///llamada de metodo para crear usuario
    $alumno->createUsuario();
?>