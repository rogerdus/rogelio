<?php
require_once('seguridad.php');
$nivel = $_COOKIE['nivel'];
require_once('Materia.php');
require_once('db.php');
if($nivel==1){
    $seguridad = new Seguridad();
    $seguridad->seguridadAdmon($nivel);
    require_once('header.php');
    ?>
    <div class="table-responsive">
        <form name=alumno action="ajax.php" method="POST">
            <table class="table table-bordered">
                <tr><td>Maestro
                        <select name="maestro">
                            <?php
                            $sql="SELECT * FROM usuario WHERE estatus='1' AND nivel='2' ORDER BY Apellidopaterno ASC;";
                            $query=mysql_query($sql) OR DIE ('Error de Consulta'.mysql_error());
                            $rows=mysql_num_rows($query);
                            for ($x=0;$x<$rows;$x++){
                                $id=mysql_result($query,$x,'id');
                                $nombre=mysql_result($query,$x,'nombre');
                                echo"<option value='$id'>$nombre</option>";
                            } ?>
                        </select>
                    </td></tr>
                <tr><td><input type="submit" value="Seleccionar" class="btn btn-xs btn-primary"></td></tr>
            </table>
        </form>
    </div>
<?php

}
else
    if($nivel==2){
        $seguridad = new Seguridad();
        $seguridad->seguridadMaestro($nivel);
        require_once('menu2.php');
    }
$materia = new Materia();
///verifica que la variable accion se exista de lo contrario mostrara solo el combo de maestros
if(isset($_REQUEST['accion'])){
    ////si existe la variable la asigna a una variable local llamada accion y entra al switch; conforme accion realiza las operaciones
    $accion=$_REQUEST['accion'];
    ///verfica que las variables no lleguen y manda un mensaje de error
        ////asignacin de las variables de llegada

        switch($accion){
            case "Eliminar":
                    $idmaestro=$_REQUEST['idmaestro'];
                    $idmateria=$_REQUEST['idmateria'];
                ///llamada de la funcion que para eliminar la materia con ese maestro
                echo"<div class='alert alert-info'>";
                $materia->eliminarMateriaMaestro($idmaestro,$idmateria);
                echo"</div>";
                break;
            case"Agregar":
                    $idmaestro=$_REQUEST['idmaestro'];
                    $idmateria=$_REQUEST['idmateria'];
                ///verificacion de la variable idmateria
                if($idmateria==NULL OR $idmateria <=0){
                    echo"<div class='alert alert-info'>";
                    echo"Elegir una materia diferente";
                    echo"</div>";
                }else{
                    ///llamada de la funcion  para dar de agregar esa materia al maestro
                    $estatus=1;
                    echo"<div class='alert alert-success'>";
                    $materia->creaAsigMateriaMaestro($idmaestro,$idmateria,$estatus);
                    echo"</div>";
                }
                break;
            case "Mostrar":
                $idm = $_COOKIE['idu'];
                $materia->materiasAsignadasM($idm);
        }


}



require_once('footer.php');
?>
