<?php
class Materia {
    private $id ;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;
    //Creacion de funciones
    public function  creaAsigMateriaMaestro($idmaestro,$idmateria,$estatus){
        $sql02="Insert Into asignarmaterias (IdMaestro,IdMateria,Estatus) VALUES ('$idmaestro','$idmateria','$estatus');";
        $query02=mysql_query($sql02) OR DIE ("Error en consulta $sql02".mysql_error());
        echo"Creado Correctamente";
    }
    public function  eliminarMateriaMaestro($idmaestro,$idmateria){
        $sql03="UPDATE asignarmaterias SET Estatus='0' WHERE IdMaestro='$idmaestro' AND IdMateria='$idmateria';";
        $query03=mysql_query($sql03) OR DIE ("Error en consulta".mysql_error());
        echo"Eliminado Correctamente";
    }
    public function seleccionaMaestro($idmaestro){
        if($idmaestro==""){
            echo"Elegir un maestro diferente";
        }
        $sql01="SELECT * FROM usuario WHERE id='$idmaestro' ORDER BY ApellidoPaterno ASC ;";
        $result01= mysql_query($sql01) OR DIE ("Error En Consulta".mysql_error());
        echo"<div id='table-responsive'>";
        echo"<table class='table table-striped'>";
        echo"<tr> <td colspan='5' align='center'><strong>Informacion del Maestro</strong></strong></td></tr>";
        echo"<tr> <th>Clave</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Status</th> </tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = utf8_decode($field['id']);
            $this->Nombre = utf8_decode($field['Nombre']);
            $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
            $this->Nivel = utf8_decode($field['Nivel']);
            $type=1;
            echo"<br>";
            echo"<tr><th>$this->Id</th><th>$this->Nombre</th><th>$this->ApellidoPaterno</th><th>$this->ApellidoMaterno</th><th>$type</th></tr>";
        }///fin while
        echo"</table>";
        echo"</div>";
    }
    public function  materiasAsignadas($idmaestro){
        if($idmaestro==""){
            echo"Se debe elegir almenos un maestro";
        }
        echo"<div id='table-responsive'>";
        echo"<table class='table table-striped'>";
        echo"<tr> <td colspan='5' align='center'><strong>Materias Asignadas</strong></strong></td></tr>";
        $sql1="SELECT m.Id,m.Nombre FROM asignarmaterias AS asi,materias AS m WHERE asi.IdMaestro='$idmaestro' AND asi.IdMateria=m.Id AND asi.Estatus!=0;";
        $query1=mysql_query($sql1) OR DIE ("Error de consulta".mysql_error());
        while($row = mysql_fetch_array($query1)){
            $idmateria = $row['Id'];
            $nombremateria = $row['Nombre'];
            echo"<tr><td>$nombremateria</td><td><a href='TestMateria.php?idmateria=$idmateria&accion=Eliminar&idmaestro=$idmaestro'>Eliminar</td></tr>";
        }
    }
    public function  materiasAsignadasM($idmaestro){
        if($idmaestro==""){
            echo"Se debe elegir almenos un maestro";
        }
        echo"<div id='table-responsive'>";
        echo"<table class='table table-striped'>";
        echo"<tr> <td ><strong>Materias Asignadas</strong></strong></td></tr>";
        $sql1="SELECT m.Id,m.Nombre,u.Nombre as Nombrem FROM  asignarmaterias AS asi,materias AS m, usuario AS u WHERE asi.IdMaestro='$idmaestro' AND asi.Estatus!=0 AND asi.IdMateria=m.Id  AND asi.IdMaestro=u.id;";
        $query1=mysql_query($sql1) OR DIE ("Error de consulta".mysql_error());
        while($row = mysql_fetch_array($query1)){
            $this-> Idm = $row['Id'];
            $this->Nombrem = $row['Nombre'];
            $this->Nombremaestro = $row['Nombrem'];
            echo"<tr><td>El Maestro: $this->Nombremaestro  Tiene asignada la materia $this->Nombrem  </td><td></tr>";
        }
    }
    public function asignarMateriasMaestro($idmaestro){
       ?> <div class="table-responsive">
            <form name=alumno action="TestMateria.php" method="POST">
                <table class="table table-bordered">
                    <tr><td>Materias
                            <select id='materia' name=idmateria>
                                <option value='NULL'>Selecciona</option>
                                <?php
                                $sql03 = "Select Id as idmat,nombre FROM materias WHERE Estatus=1 ORDER BY Id ASC;";
                                $query03 = mysql_query($sql03) OR DIE ('Error de Consulta'.mysql_error());
                                while($result = mysql_fetch_array($query03)){
                                    $idmateria = $result['idmat'];
                                    $nombremateria = $result['nombre'];
                                    echo"--$idmateria";
                                    $sql04 = "Select IdMaestro,IdMateria FROM asignarmaterias WHERE IdMaestro='$idmaestro' AND IdMateria='$idmateria' AND Estatus='1'";
                                    $query04 =mysql_query($sql04) OR DIE ("Error de Consulta 4".mysql_error());
                                    $rows=mysql_num_rows($query04);
                                    if ($rows >0){
                                        echo"<option value=0>No Disponible</option>";
                                    }
                                    else{
                                        echo"<option value=$idmateria>$nombremateria</option>";
                                    }
                                }

                                ?>
        </select></td></tr>
        <tr><td>
                <input type="hidden" name="idmaestro" id="idmaestro" value="<?php echo $idmaestro; ?>">
                <input type="hidden" name="accion" id="accion" value="Agregar">
                <input type="submit"  value="Agregar"></td></tr>
        </table>
        </form>
        </div>
<?php
    }//fin public muestra
}
 ?>