<?php
/**
 * Created by PhpStorm.
 * User: Rogelio
 * Date: 9/10/14
 * Time: 09:58 AM
 */

   if(isset($_POST['user']) AND isset($_POST['psw'])){
       $user = $_POST['user'];
       $psw = $_POST['psw'];
        require_once('db.php');
	$sqlx ="SELECT id,nombre,Nivel,Usuario,Contrasena,Estatus FROM usuario WHERE usuario='".mysql_real_escape_string($user)."'AND contrasena='".mysql_real_escape_string($psw)."'";
        $consulta=mysql_query($sqlx) OR  DIE ("Error de consulta".mysql_error());
   }
if ($user=='' or $psw==''){
    $msg='los campos deben ir llenos';
    print"<meta http-equiv='refresh' content='0;
	url=index.php?msg=$msg'>";
    exit;
}

$cuantos=mysql_num_rows($consulta);
if ($cuantos==NULL)
{
    $msg='el usuario o password no son correctos';
    print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
    exit;
}
else
{
    $idusuario=mysql_result($consulta,0,'id');
    $activo=mysql_result($consulta,0,'Estatus');
    $tipo=mysql_result($consulta,0,'Nivel');
    ///encriptacion del id usuario y tipo
    $idd=("idusuario=$idusuario&usuario=$user&tipo=$tipo");
    if($activo=='no')
    {
        $msg='el usuario no esta activo, consulte a su administrador';
        print"<meta http-equiv='refresh' content='0;
		url=index.php?msg=$msg'>";
        exit;
    }
    else
    {
        print"<meta http-equiv='refresh' content='0;
				url=accesos.php?$idd'>";
        exit;

    }
}
?>
