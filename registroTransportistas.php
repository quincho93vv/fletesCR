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
                            <a href="registroTransportistas.php" id="ofrecerFlete" class="ui-btn ui-shadow ui-corner-all ui-icon-carat-r ui-btn-icon-top" data-transition="pop" data-theme="b">Ofrecer Fletes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div role="main" class="ui-content" data-theme="b">
            <form method="post" action="submit.php" data-theme="b">
                <div data-role="collapsible">
                    <h3>Informacion del Auto</h3>
                    <label for="marca" data-theme="b">Marca: </label>
                    <input data-role="text" name="marca" id="marca" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="modelo" data-theme="b">Modelo: </label>
                    <input data-role="text" name="modelo" id="modelo" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="carga" data-theme="b">Carga Max. Kg: </label>
                    <input data-role="text" name="carga" id="carga" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="largo" data-theme="b">Largo: </label>
                    <input data-role="text" name="largo" id="largo" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="alto" data-theme="b">Alto: </label>
                    <input data-role="text" name="alto" id="alto" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="ancho" data-theme="b">Ancho: </label>
                    <input data-role="text" name="ancho" id="ancho" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="fotos" data-theme="b">Fotos del Vehiculo: </label>
                    <input type="file" id="fotos" name="fotos" multiple="" class="ui-input-text ui-body-c">
                    
                </div>
                <div data-role="collapsible">
                    <h3>Informacion del Conductor</h3>
                    <label for="tipoLicencia" data-theme="b">Tipo de Licencia: </label>
                    <input data-role="text" name="tipoLicencia" id="tipoLicencia" data-clear-btn="true" value="" class="ui-input-text ui-body-b">
                    <label for="fechExpiracion" data-theme="b">Fecha de Vencimiento: </label>
                    <input type="date" name="fechExpiracion" id="fechExpiracion" value="" data-clear-btn="true" class="ui-input-text ui-body-b">
                    <label for="fotosLicencia" data-theme="b">Fotos de la Licencia: </label>
                    <input type="file" id="fotosLicencia" name="fotosLicencia" multiple="" class="ui-input-text ui-body-c">
                </div>
                <button data-role="submit" name="registrarDatosConductor" data-theme="b">Registrar Conductor</button>
            </form>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <p>Fletes Costa Rica - Derechos Reservados</p>
        </div>
    </div>
</body>
</html>
