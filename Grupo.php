<?php
class Grupo {
    private $id;
    private  $nombre;
    private $estatus;

public function eliminarAlumno($id){
    $sql = "UPDATE asignagrupo SET Estatus=0 WHERE Id=$id;";
    $query =mysql_query($sql) OR DIE ("Error en consulta".mysql_error());
    echo"Eliminado Exitosamente";
}
    public function muestraAlumnos(){
        ?>
        <div class="table-responsive">
           <form name=alumno action="TestGrupo.php" method="POST">
              <table class="table table-striped">
               <tr><td colspan="4" align="center"><b>ALUMNOS</b></td></tr>

<?php
                           ////Consulta solo los alumnos o usuarios nivel 3
            $sql = "SELECT id,nombre,ApellidoPaterno,ApellidoMaterno, Nivel, Estatus FROM usuario WHERE estatus='1' AND nivel='3' ORDER BY Apellidopaterno ASC;";
            $query = mysql_query($sql) OR DIE ('Error de Consulta'.mysql_error());
                           ///creacion de variable x para saber cuantos alumnos existen sin ser agregados a un  grupo
                           $x=0;
                           while($field = mysql_fetch_array($query)){
                                         /////asignacion de variables resultado de la consulta
                                       $this->Id = utf8_decode($field['id']);
                                       $this->Nombre = utf8_decode($field['nombre']);
                                       $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
                                       $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
                                       /////seleccion del grupo comparando la clave del alumno exista en la tabla asignagrupo
                                       $sql1 = "SELECT  alumn.Nombre,alumn.ApellidoPaterno,alumn.ApellidoMaterno, asig.IdGrupo, g.Nombre as g
                                       FROM asignagrupo AS asig, grupo AS g, usuario AS alumn
                                       WHERE alumn.id='$this->Id' AND asig.Estatus='1' AND alumn.id=asig.IdAlumno AND asig.IdGrupo=g.Id;";
                                       $query1 = mysql_query($sql1) OR DIE ("Error en consulta 2".mysql_error());
                                       $rows = mysql_num_rows($query1);
                               ///si existe no mostrara el checkbox pero mostrara el grupo al que esta asignado el alumno
                                 if($rows>0){
                                     $grupo = mysql_result($query1,0,'g');
                                   echo"<tr><td>$this->Id $this->Nombre $this->ApellidoPaterno $this->ApellidoMaterno</td><td><a href='TestGrupo.php?accion=Eliminar&alumno=$this->Id'>Desasignar</a></td><td>Ya esta asignado a $grupo</td></tr>";
                                 }///fin if
                               else{
                                  ///de lo contrario hara un array de checkbox llamada idalumno y aumentara la variable x para saber cuantos checkbox se crearon
                                   $x=$x+1;
                                   echo"<input type='hidden' name='x' value='$x'>";
                                    echo"<tr><td><input type='checkbox' name='idalumno[]'></td><td>$this->Id $this->Nombre $this->ApellidoPaterno $this->ApellidoMaterno</td><td></td></tr>";
                               }
                           }///fin while
?>
            </td></tr>
                  <tr><td colspan="3" align="center"><select name="maestro">
                  <?php
                  $sql2 = "SELECT Id ,Nombre FROM grupo WHERE Estatus ='1' ORDER BY Id ASC ;";
                  $query2 = mysql_query($sql2) OR DIE ("Error de consulta 3".mysql_error());
                while($rows = mysql_fetch_array($query2)){
                    $clave =utf8_decode($rows['Id']);
                    $nombre =utf8_decode($rows['Nombre']);
                           echo"<option value='$clave'>$clave $nombre</option>";
                 } ?>
                  </select></td></tr>
                  <?php
         echo'<tr><td colspan="3" align="center"><input type="submit" class="btn btn-xs btn-primary" name="submit" value="Agregar"></td></tr>
        </table>
        </form>
        </div>';
     }
}
?>
