<?php
/**
 * Created by PhpStorm.
 * User: Rogelio
 * Date: 9/10/14
 * Time: 05:34 PM
 */
require_once('seguridad.php');

$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
if($nivel==1){
    $seguridad->seguridadAdmon($nivel);
    require_once('header.php');
}
else
    if($nivel==2){
        require_once('menu2.php');
        $seguridad->seguridadMaestro($nivel);
    }
    else{
        if($nivel!=2 OR $nivel!=1){
            $msg ="Usuario No valido para ";
            print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        }
    }
require_once('footer.php');
