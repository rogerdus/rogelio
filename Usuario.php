<?php
/**
 * User: dhuster
 * Date: 18/09/14
 */

class Usuario {
    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;
        public function createUsuario($Nombre,$ApellidoP,$ApellidoM,$Nivel,$Estatus){
            echo"<br>CreateUsuario";
            $sql1="Insert Into usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)VALUES('$Nombre','$ApellidoP','$ApellidoM','$Nivel','$Estatus');";
            $query1=mysql_query($sql1) OR DIE ("Error en consulta".mysql_error());
        }
        public function readUsuarioG(){
            $sql01="SELECT * FROM usuario WHERE estatus = 1 ORDER BY ApellidoPaterno ASC ;";
            $result01= mysql_query($sql01) OR DIE ("Error En Consulta".mysql_error());
            echo"<div id='table-responsive'>";
               echo"<table class='table table-striped'>";
               echo"<tr> <td colspan='5' align='center'><strong>Lista de Usuarios</strong></strong></td></tr>";
               echo"<tr> <th>Id</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Status</th> </tr>";
                while($field = mysql_fetch_array($result01)){
                    $this->Id = $field['id'];
                    $this->Nombre = $field['Nombre'];
                    $this->ApellidoPaterno = $field['ApellidoPaterno'];
                    $this->ApellidoMaterno = $field['ApellidoMaterno'];
                    $this->Nivel = $field['Nivel'];
                    switch($this->Nivel){
                        case 1:
                            $type= "Administrador";
                            break;
                        case 2:
                            $type = "Maestro";
                            break;
                        case 3:
                            $type = "Alumno";
                            break;
                    }///fin switch
                    $type=1;
					echo"<br>";
                    echo"<tr><th>$this->Id</th><th>$this->Nombre</th><th>$this->ApellidoPaterno</th><th>$this->ApellidoMaterno</th><th>$type</th></tr>";
                }///fin while
            echo"</table>";
            echo"</div>";
        }

        public function readUsuarioS($id){
            $sql01="SELECT * FROM usuario WHERE id='$id' ORDER BY ApellidoPaterno ASC ;";
            $result01= mysql_query($sql01) OR DIE ("Error En Consulta".mysql_error());
            echo"<div id='table-responsive'>";
            echo"<table class='table table-striped'>";
            echo"<tr> <td colspan='5' align='center'><strong>Lista de Usuarios</strong></strong></td></tr>";
            echo"<tr> <th>Id</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Status</th> </tr>";
            while($field = mysql_fetch_array($result01)){
                $this->Id = $field['id'];
                $this->Nombre = $field['Nombre'];
                $this->ApellidoPaterno = $field['ApellidoPaterno'];
                $this->ApellidoMaterno = $field['ApellidoMaterno'];
                $this->Nivel = $field['Nivel'];
                switch($this->Nivel){
                    case 1:
                        $type= "Administrador";
                        break;
                    case 2:
                        $type = "Maestro";
                        break;
                    case 3:
                        $type = "Alumno";
                        break;
                }///fin switch
                $type=1;
                echo"<br>";
                echo"<tr><th>$this->Id</th><th>$this->Nombre</th><th>$this->ApellidoPaterno</th><th>$this->ApellidoMaterno</th><th>$type</th></tr>";
            }///fin while
            echo"</table>";
            echo"</div>";
           }
        public function updateUsuario($Id,$Nombre,$ApellidoP,$ApellidoM,$Nivel){
            $sqlup="Update usuario SET Nombre='$Nombre',ApellidoPaterno='$ApellidoP',ApellidoMaterno='$ApellidoM',Nivel='$Nivel'
            WHERE id=$Id;";
            $query=mysql_query($sqlup) OR DIE ("Error en consulta $sqlup".mysql_error());
            echo"<br>Actualizado correctamente";
        }
    public function deleteUsuario($Id){
        $sqldel="Delete FROM usuario WHERE id=$Id;";
        $query=mysql_query($sqldel) OR DIE ("Error en consulta".mysql_error());
        echo"<br>Borrado Correctamente";
    }
}