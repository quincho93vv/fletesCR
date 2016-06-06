<?php
include('conexion.php');
    //$variable = mysql_query("SELECT * FROM  Usuarios") or die("Error en: SELECT * FROM  USUARIOS: " . mysql_error());

$query = "SELECT a.nombre AS nombre, z.nombre AS imagen, z.direccion AS direccion, d.nombre AS lugar, a.codUsuario AS identificacion, b.codAutoTransportista AS placa 
FROM Usuarios a, UsuariosTransportistas b, FotosVehiculos c, Provincias d, Localidades e, LocalizacionesTransportistas f, Imagenes z 
WHERE b.disponible = 1 AND a.codUsuario = b.codUsuario AND z.codImagen = c.codImagen AND c.codAutoTransportista = b.codAutoTransportista AND 
d.codProvincia = e.codProvincia AND d.codPais = e.codPais AND e.codLocalidad = f.codLocalizacionTransportista ORDER BY 1;";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/FletesCR.min.css" />
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile.structure-1.4.5.css" />
    <script src="jquery-1.12.4.js"></script>
    <script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>   
    <title>Fletes Costa Rica</title>
</head>
<body>
    <div rwd-example>
        <div data-role="page" id="paginaPrincipal" data-theme="b">
            <div data-role="header" data-theme="b">
                <div id="menuUno" data-role="navbar" class="ui-grid-a">
                    <div id="logo" class="ui-body ui-shadow ui-corner-all  ui-btn-inline ui-block-a" data-theme="b">
                        <img src="Imagenes/pickup-truck-34270_960_720.png" style="height:100%;width:100%" data-theme="b">
                    </div>
                    <div class="ui-block-b">
                        <h2>Fletes Costa Rica</h2>
                        <p>El mejor sitio para encontrar como transportar sus cosas.</p>

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
            <div role="main" class="ui-content" data-theme="b" jqm-content>

                <ul data-role="listview" data-filter="true" data-filter-placeholder="Buscar..." data-inset="true">
                    <li data-role="list-divider">Fletes Disponibles Actualmente</li>

                    <?php
                    try{
                        $tmp = "";
                        $dbh = new PDO($cadena,$user,$pass);
                        foreach ($dbh->query($query) as $row) {
                            if($tmp != $row['placa']){ 
                                ?>
                                <li>
                                    <?php 
                                    echo "<a href=\"detalleTransportista.php?idTransp=".$row['identificacion']."&idVehic=".$row['placa']."\">"."<img src='http://localhost/".$row['direccion']."/".$row['imagen']."' /> <p><b>Nombre del Transportista: </b></p><p>".$row['nombre']."</p> <p><b>Lugar donde trabaja: </b></p> <p>".$row['lugar']." </p></a>";
                                    ?>
                                </li>
                                <?php
                                $tmp = $row['placa'];
                            }
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
