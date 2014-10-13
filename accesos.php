<?php
/**
 * Created by PhpStorm.
 * User: Rogelio
 * Date: 9/10/14
 * Time: 03:57 PM
 */
    if (isset($_GET['idusuario']) AND isset($_GET['usuario']) AND isset($_GET['tipo'])){
        $iduser = $_GET['idusuario'];
        $user = $_GET['usuario'];
        $tipo = $_GET['tipo'];

        if($tipo==1){
            setCookie('idu',$iduser,time()+7200,'/');
            setCookie('nivel',$tipo,time()+7200,'/');////tiempo de cookie
            setCookie('acceso',1,time()+7200,'/');////tiempo de cookie
            setCookie('user',$user,time()+7200,'/');////tiempo de cookie
            session_start();
            $_SESSION['iduser']=$iduser;
            $_SESSION['acceso']=1;
            $_SESSION['nivel']=$tipo;
            $_SESSION['user']=$user;
            print"<meta http-equiv='refresh' content='0;
		    url=menusistema.php'>";
            exit;
        }
        else{
            if($tipo==2){
                ///idusuario=5&usuario=joel&tipo=2
                setCookie('idu',$iduser,time()+7200,'/');
                setCookie('nivel',$tipo,time()+7200,'/');////tiempo de cookie
                setCookie('maestro',2,time()+7200,'/');////tiempo de cookie
                setCookie('user',$user,time()+7200,'/');////tiempo de cookie
                session_start();
                $_SESSION['iduser']=$iduser;
                $_SESSION['maestro']=2;
                $_SESSION['nivel']=$tipo;
                $_SESSION['user']=$user;
                print"<meta http-equiv='refresh' content='0;
		        url=menusistema.php'>";
                exit;
            }
            else{
                if($tipo!=1 OR $tipo!=2){
                    $msg='El usuario no tiene privilegios verificar consu administrado que el lo que puede hacer';
                    print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
                    exit;
                }
            }
        }
    }
    else{
        $msg='el usuario o password no son correctos';
        print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
        exit;
    }
