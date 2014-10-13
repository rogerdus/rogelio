<div class="navbar-header">
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"  href="#">Practica Control Escolar</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="TestUsuario.php">Catalogo de Usuarios</a></li>
                <li><a href="TestMateria.php">Asignar Materias a Maestro</a></li>
                <li><a href="TestGrupo.php">Asignar Alumnos a Grupos</a></li>
                <li><a href="#contact"></a></li>
                <li class="active"><a href="logout.php" >Cerrar Sesion</a></li>
                <li ><a href="#" ><?php
                        if(!isset($_COOKIE['user'])){
                            echo"Bienvenido";
                        }
                        else{
                            echo $_COOKIE['user'];
                        }
                        ?></a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
