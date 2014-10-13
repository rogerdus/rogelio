<?php
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
$seguridad->seguridadAdmon($nivel);
//*Se verfica que la variable sea 1 */
if (!isset($_POST['maestro'])){
    echo"Se debe elegir un maestro ";
}
else{
    $idmaestro=$_POST['maestro'];
}
require_once('header.php');
require_once('db.php');
require_once('Materia.php');
//informacion del maestro
$materia = new Materia();
$materia->seleccionaMaestro($idmaestro);
$materia->materiasAsignadas($idmaestro);
$materia->asignarMateriasMaestro($idmaestro);
require_once('footer.php');
?>




