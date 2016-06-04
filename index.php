<?php
include('conexion.php');
    //$variable = mysql_query("SELECT * FROM  Usuarios") or die("Error en: SELECT * FROM  USUARIOS: " . mysql_error());

$query = "SELECT * FROM Usuarios";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/FletesCR.min.css" />
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <script src="jquery-1.12.4.js"></script>
    <script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>   
    <title>Fletes Costa Rica</title>
</head>
<body>
    <div data-role="page" id="paginaPrincipal" data-theme="b">
        <div data-role="header" data-theme="b">
            <div id="menuUno" data-role="navbar" class="ui-grid-a">
                <div id="logo" class="ui-shadow ui-corner-all  ui-btn-inline ui-block-a" data-theme="b">
                    <img src="Imagenes/pickup-truck-34270_960_720.png" style="height:100px;width:80%" data-theme="b">
                </div>
                <div class="ui-block-b">

                    <form method="post" action="errorPage.html">
                        <div class="ui-field-contain" data-theme="b">
                            <label for="search" data-theme="b">Buscar:</label>
                            <input type="search" name="search" id="search" placeholder="Ubicacion" data-theme="b">
                        </div> 
                    </form> 
                </div>
                <div data-role="navbar">
                    <ul>
                        <li>
                            <a href="index.php" id="registrar" class="ui-btn ui-shadow ui-corner-all ui-icon-home ui-btn-icon-top" data-theme="b">Inicio</a>
                        </li>
                        <li>
                            <a href="registroUsuario.php" id="registrar" class="ui-btn ui-shadow ui-corner-all ui-icon-plus ui-btn-icon-top" data-theme="b">Registrar</a>
                        </li>
                        <li>
                            <a href="#loginRegistro" id="ingresar" class="ui-btn ui-shadow ui-corner-all ui-icon-user ui-btn-icon-top" data-transition="pop" data-theme="b">Ingresar</a>
                        </li>
                        <li>
                            <a href="#loginRegistro" id="ofrecerFlete" class="ui-btn ui-shadow ui-corner-all ui-icon-carat-r ui-btn-icon-top" data-transition="pop" data-theme="b">Ofrecer Fletes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div role="main" class="ui-content" data-theme="b">
            <ul data-role="listview" data-inset="true" data-divider-theme="b" data-filter-placeholder="Buscar">
                <li data-role="list-divider">Fletes Disponibles Actualmente</li>
                <?php
                try{
                    $dbh = new PDO($cadena,$user,$pass);
                    foreach ($dbh->query($query) as $row) {
                        ?>
                        <li>
                            <?php echo $row['nombre'];?>
                        </li>
                        <?php
                    }
                } catch (PDOException $e){
                    print "Error: " . $e->getMessage() . "<br/>";
                    die();
                }
                ?>
            </ul>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <p>Fletes Costa Rica - Derechos Reservados</p>
        </div>
    </div>

    <!-- Pagina de Login o Registro si aun no esta logueado-->
    <div data-role="dialog" id="loginRegistro" data-url="popup" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Ingresa</h1>
        </div>
        <div role="main" class="ui-content" data-theme="b">
            <form method="post" action="#" data-theme="b">
                <label for="usuarioL" data-theme="b">Usuario: </label>
                <input data-role="text" name="usuarioI" id="usuarioI" placeholder="Ingrese su usuario" value="" data-mini="true" data-theme="b">
                <label for="contrasenaL" data-theme="b">Contrasena: </label>
                <input data-role="password" name="contrasenaI" id="contrasenaI" value="" autocomplete="off" data-mini="true" data-theme="b">
                <button data-role="submit" data-theme="b">Ingresar</button>
            </form>
        </div>
    </div>
    <!--Si esta logeado entonces guiarlo a la pagina de -->


</body>
</html>
