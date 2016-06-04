<!DOCTYPE html>
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
                <div id="logo" class="ui-shadow ui-corner-all  ui-btn-inline ui-block-a" data-theme="b">
                    <img src="Imagenes/pickup-truck-34270_960_720.png" height="55" width="" data-theme="b">
                </div>
                <div class="ui-block-b">
                    <form method="post" action="errorPage.html" data-theme="b">
                        <div class="ui-field-contain" data-theme="b">
                            <label for="search" data-theme="b">Buscar:</label>
                            <input type="search" name="search" id="search" placeholder="Ingrese una Ubicacion" data-theme="b">
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
                    <label for="fechaNacimientoL" data-theme="b">Fecha Nacimiento: </label>
                    <input type="date" name="fechaNacimientoL" id="fechaNacimientoL" value="" data-clear-btn="true" class="ui-input-text ui-body-b">
                </div>
                <div data-role="collapsible">
                    <h3>Informacion de Contacto</h3>
                    <label for="emailI" data-theme="b">Correo Electronico: </label>
                    <input type="email" name="emailI" id="emailI" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
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
    </div>
</body>
</html>
