<?php
//echo$_SERVER["HTTP_USER_AGENT"]//
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
$seguridad->seguridadAdmon($nivel);
require_once('header.php');
require_once('db.php');
require_once('Grupo.php');
$grupo = new Grupo();

if(isset($_POST['submit']) AND isset($_POST['x']) AND isset($_POST['idalumno'])){
    $x = $_POST['x'];
for ($y =0; $y < $x; $y++){
    if (isset($_POST['idalumno'])){
        $id = $_POST['idalumno'];
        echo"LLeno ";
    }
    else{
        echo"Vacio";
    }
}
        /*$id=array();
    if(array_key_exists('idalumno',$id)):
        $this->get($id['idalumno']);
        foreach($id as $campo=>$valor):
            $$campo=$valor;
         endforeach;
    endif ;
   $sql ="Insert Into "*/
}
else{
    if(isset($_GET['accion']) AND isset($_GET['alumno'])){
        $accion = $_GET['accion'];
        $idalumno = $_GET['alumno'];
       echo"<div class='alert alert-info'>";

        $grupo->eliminarAlumno($idalumno);
        echo"</div>";
    }
    else{
        echo"Elegir almenos un  Alumno";
    }
}
$grupo->muestraAlumnos();
require_once('footer.php');
?>
