<!DOCTYPE html>
<?php
include('conexion.php');

$queryPais = "SELECT * FROM Paises";
$queryProvincias = "SELECT * FROM Provincias WHERE codPais = 1";

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/FletesCR.min.css" />
    <link rel="stylesheet" href="jquery-mobile-theme-205845-0/themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>   
    <title>Fletes Costa Rica</title>
</head>
<body>
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
                                <a href="registroTransportistas.php" id="ofrecerFlete" class="ui-btn ui-shadow ui-corner-all ui-icon-carat-r ui-btn-icon-top" data-transition="pop" data-theme="b">Ofrecer Fletes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <div role="main" class="ui-content" data-theme="b">
            <form method="post" action="submit.php" data-theme="b">
                <div data-role="collapsible">
                    <h3>Informacion Basica</h3>
                    <label for="cedulaI" data-theme="b">No. Identificacion: </label>
                    <input data-role="text" name="cedulaI" id="cedulaI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="nombreI" data-theme="b">Nombre: </label>
                    <input data-role="text" name="nombreI" id="nombreI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="apellidoUnoI" data-theme="b">Primer Apellido: </label>
                    <input data-role="text" name="apellidoUnoI" id="apellidoUnoI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="apellidoDosI" data-theme="b">Segundo Apellido: </label>
                    <input data-role="text" name="apellidoDosI" id="apellidoDosI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="fechaNacimientoI" data-theme="b">Fecha Nacimiento: </label>
                    <input type="date" name="fechaNacimientoI" id="fechaNacimientoI" value="" data-clear-btn="true" class="ui-input-text ui-body-b">
                </div>
                <div data-role="collapsible">
                    <h3>Informacion de Contacto</h3>
                    <label for="emailI" data-theme="b">Correo Electronico: </label>
                    <input type="email" name="emailI" id="emailI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="paisI" data-theme="b">Pais: </label>
                    <select name="paisI" id="paisI">
                        <?php
                        try{
                            $dbh = new PDO($cadena,$user,$pass);
                            foreach ($dbh->query($queryPais) as $row) {
                                ?>
                                <option data-theme="b" value="<?php echo $row['codPais'];?>">
                                    <?php echo $row['nombre'];?>
                                </option>
                                <?php
                            }
                        } catch (PDOException $e){
                            print "Error: " . $e->getMessage() . "<br/>";
                            die();
                        }
                        ?>
                    </select>
                    <label for="provinciasI" data-theme="b">Estado / provincia: </label>
                    <select name="provinciasI" id="provinciasI">
                        <?php
                        try{
                            $dbh = new PDO($cadena,$user,$pass);
                            foreach ($dbh->query($queryProvincias) as $row) {
                                ?>
                                <option data-theme="b" value="<?php echo $row['codProvincia'];?>">
                                    <?php echo $row['nombre'];?>
                                </option>
                                <?php
                            }
                        } catch (PDOException $e){
                            print "Error: " . $e->getMessage() . "<br/>";
                            die();
                        }
                        ?>
                    </select>
                    <label for="direccionUnoI" data-theme="b">Direccion uno: </label>
                    <input data-role="text" name="direccionUnoI" id="direccionUnoI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="direccionDosI" data-theme="b">Direccion dos: </label>
                    <input data-role="text" name="direccionDosI" id="direccionDosI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="telefonoI" data-theme="b">Telefono: </label>
                    <input type="tel" name="telefonoI" id="telefonoI" value="" data-clear-btn="true" class="ui-input-text ui-body-b">
                    <label for="celularI" data-theme="b">Celular: </label>
                    <input type="tel" name="celularI" id="celularI" value="" data-clear-btn="true" class="ui-input-text ui-body-b">
                </div>
                <button data-role="submit" name="registrarUsuario" data-theme="b">Registrar</button>
            </form>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <p>Fletes Costa Rica - Derechos Reservados</p>
        </div>
                <div data-role="dialog" id="loginRegistro" data-url="popup" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Ingresa</h1>
        </div>
        <div role="main" class="ui-content" data-theme="b">
            <form method="post" action="menu.php" data-theme="b">
                <label for="usuarioL" data-theme="b">Usuario: </label>
                <input data-role="text" name="usuarioI" id="usuarioI" placeholder="Ingrese su usuario" value="" data-mini="true" data-theme="b">
                <label for="contrasenaL" data-theme="b">Contrasena: </label>
                <input data-role="password" type="password" name="contrasenaI" id="contrasenaI" value="" autocomplete="off" data-mini="true" data-theme="b">
                <button data-role="submit" data-theme="b">Ingresar</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
