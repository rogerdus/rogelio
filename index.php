<?php
require_once('header.php');
require_once('footer.php');
if(isset($_GET['msg'])){
   echo"<div class='alert alert-info'>".$_GET['msg']."</div>";
}
?>
   <table class='table table-striped'>
       <fieldset>
        <form action="validacion.php"  id="form-control" METHOD="POST">
         <tr> <td>Usuario</td><td><input type="text" name="user"></td></tr>
         <tr><td>Contraseña</td></td><td><input type="PASSWORD" name="psw"></td></tr>
         <tr><td colspan="2" align="center"><input type="submit"  class="btn btn-xs btn-primary" value="Entrar"></td></tr>
        </form>
        </fieldset>
       </table>