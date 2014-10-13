<?php
/**
 * Created by PhpStorm.
 * User: Rogelio
 * Date: 9/10/14
 * Time: 04:21 PM
 */
class Seguridad{
    private  $nivel;
public function seguridadAdmon($nivel){
    if(!isset($_COOKIE['idu'])  OR !isset($_COOKIE['nivel']) OR !isset($_COOKIE['acceso'])){
        $msg ="Llenar los campos para poder iniciar Sesion 1";
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
    $idu = $_COOKIE['idu'];
    $acceso = $_COOKIE['acceso'];
    if($nivel!=1){
        $msg = "Verificar con su administrador el tipo de cuenta que debe usar";
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
    session_start();
    $idu2 = $_SESSION['iduser'];
    $acceso2 = $_SESSION['acceso'];
    $nivel2 = $_SESSION['nivel'];
    if($idu2 ==NULL OR  $acceso2 ==NULL OR $nivel2==NULL){
        $msg = "Los campos deben de ir llenos";
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
}
    public  function  seguridadMaestro($nivel){
        if(!isset($_COOKIE['idu'])  OR !isset($_COOKIE['nivel']) OR !isset($_COOKIE['maestro'])){
            $msg ="Llenar los campos para poder iniciar Sesion 1";
            print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
            exit;
        }
        $idu = $_COOKIE['idu'];
        $acceso = $_COOKIE['maestro'];
        session_start();
        $idu2 = $_SESSION['iduser'];
        $acceso2 = $_SESSION['maestro'];
        $niveladmin = $_SESSION['nivel'];
        if($idu2 ==NULL OR  $acceso2 ==NULL OR $niveladmin==NULL){
            $msg = "Los campos deben de ir llenos";
            print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
            exit;
        }
    }

}


?>