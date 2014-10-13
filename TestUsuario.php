<?php
/**
 * User: dhuster
 * Date: 18/09/14
 */
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
$seguridad = new Seguridad();
$seguridad->seguridadAdmon($nivel);

require_once('db.php');
require_once('header.php');
require_once('Usuario.php');
/* Creacion de objeto usuario para instanciar la clase usuario y traer los metodos y atributos que contiene la clase*/
$usuario = new Usuario();
///Traer los objetos de manera estatica
   /*$usuario->readUsuarioG();
    $usuario->readUsuarioS(1);
    $usuario->createUsuario('Jorge','Garcia','Nava','1','1');
    $usuario->updateUsuario('2','Jorge','Garcia','Navas','1','1');
    $usuario->deleteUsuario(9);*/
?>
<!--Creacion del formulario general para crear, modificar, buscar o eliminar un usuario-->
<div class="table-responsive">
    <form name=alumno action="TestUsuario.php" method="POST">
        <table class="table table-bordered">
            <tr><td>Nombre(s):</td><td><input type="text" name="nombre"></td></tr>
            <tr><td>Apellido Paterno:</td><td><input type="text" name="apellidop"></td></tr>
            <tr><td>Apellido Materno(s):</td><td><input type="text" name="apellidom"></td></tr>
            <tr><td>Nivel</td>
                <td><select name="nivel">
            <option value="1">Administrador</option>
            <option value="2">Maestro</option>
            <option value="3">Alumno</option></td></tr>
            <tr><td>Estatus:</td><td><input type="text" name="estatus"></td></tr>
       <tr><td colspan="2" align="center">
               <input type="submit" name="submit1"  class="btn btn-xs btn-primary" value="Alta"></td></tr>
       <tr><td>ID: <input type="text" name="idm"></td><td><input type="submit" class="btn btn-xs btn-primary" name="submit1" value="modificar"></td></tr>
       <tr><td>ID: <input type="text" name="idb"></td><td><input type="submit" class="btn btn-xs btn-primary" name="submit1" value="borrar"></td></tr>
       <tr><td>ID: <input type="text" name="idbuscar"></td><td><input type="submit"  class="btn btn-xs btn-primary" name="submit1" value="buscar"></td></tr>
</div>
<?php
///Verificacion de la variable submit; entra al case y realizar la operacion que adecuada
    if (isset($_POST['submit1'])){
        switch($_POST['submit1']){
            case "Alta":
                echo "<div class='alert alert-danger' role=alert>";
                echo"<br>Bot&oacute;n ". $_POST['submit1'];
                ///trae el metodo para dar de alta un usuario y le envia las variables que recibe el documento
                $usuario->createUsuario($_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['nivel'],$_POST['estatus']);
                echo"</div>";
                break;
            case"borrar":
                echo"<div class='alert alert-info'>";
                echo"<br>Bot&oacute;n ". $_POST['submit1'];
                ////trae el metodo de eliminacion de borrar y le envia una variable
                $usuario->deleteUsuario($_POST['idb']);
                echo"</div>";
                break;
            case "modificar":
                echo"<div class='alert alert-success'>";
                echo"<br>Bot&oacute;n ". $_POST['submit1'];
                $usuario->updateUsuario($_POST['idm'],$_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['nivel'],$_POST['estatus']);
                    echo"</div>";
                break;
            case"buscar":
				echo"<div class='alert alert-success'>";
                    echo"<br>Bot&oacute;n ". $_POST['submit1'];
                if($_POST['idbuscar'] != NULL){
                    
                    $usuario->readUsuarioS($_POST['idbuscar']);
                }
                else{
                    $usuario->readUsuarioG();
                }
				echo"</div>";
        }
    }
require_once('footer.php');
?>