<?php
/**
 * User: Rogelio
 * Date: 09/10/14
 * Time: 08:11 PM
 */
setCookie('idu','',time()+1,'/');
setCookie('acceso','',time()+1,'/');////tiempo de cookie
setCookie('nivel','',time()+1,'/');////tiempo de cookie
setCookie('user','',time()+1,'/');////tiempo de cookie
session_start();
session_unset();
session_destroy();
$msg="Iniciar Sesion";
header("Location:index.php?msg=$msg");
exit;