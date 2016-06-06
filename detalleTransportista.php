<?php
    include('conexion.php');
    //$variable = mysql_query("SELECT * FROM  Usuarios") or die("Error en: SELECT * FROM  USUARIOS: " . mysql_error());
    //"SELECT * FROM table WHERE id=:id AND name=:name"
    //$query = "SELECT nombre FROM Usuarios Where codUsuario=:codUsuario";
    $query = "SELECT DISTINCT a.nombre as nombre, a.apellidoUno as apellidoUno, a.apellidoDos as apellidoDos, j.telefono as telefono, j.celular as celular, j.codDatoPersonal as correo,
g.codAutoTransportista as placa, g.marca as marca, g.modelo as modelo, g.dimensionVehiculoLargo as dvla, g.dimensionVehiculoAlto as dval, g.dimensionVehiculoAncho as dvan, g.dimensionCargaLargo as dcla, g.dimensionCargaAlto as dcal, g.dimensionCargaAncho as dcan  
FROM Usuarios a, UsuariosTransportistas b, FotosVehiculos c, Provincias d, Localidades e, LocalizacionesTransportistas f,AutosTransportistas g, FotosLicencias h, LicenciasConducir i, DatosPersonales j, Imagenes z 
WHERE a.codUsuario = :codUsuario AND b.codAutoTransportista = :codVehic AND a.codUsuario = b.codUsuario AND b.disponible = 1 AND a.codDatoPersonal = j.codDatoPersonal AND b.codAutoTransportista = g.codAutoTransportista;";
    $queryV = "SELECT codImagen AS codIMG FROM FotosVehiculos WHERE codAutoTransportista = :codVehic;";
    $idTransp = htmlspecialchars($_GET["idTransp"]);
    $idVehic = htmlspecialchars($_GET["idVehic"]);
    $row;
    $rowV;
        try{
            $dbh = new PDO($cadena,$user,$pass);
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':codUsuario' => $idTransp, ':codVehic' => $idVehic));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmtV = $dbh->prepare($queryV);
            $stmtV->execute(array(':codVehic' => $idVehic));
            $rowV = $stmtV->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e){
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }
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

            <div role="main" class="ui-content" data-theme="b">
                <?php
                    foreach ($row as $value) {
                ?>
                <div id="datosPersonales">
                    <ul data-role="listview" data-inset="true">
                        <li data-role="list-divider">
                            <h2>Informacion Personal</h2>
                        </li>
                        <li>
                            <h3>Nombre Completo:</h3>
                            <p>
                                <?php echo $value['nombre']." ".$value['apellidoUno']." ".$value['apellidoDos']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Telefono:</h3>
                            <p>
                                <?php echo $value['telefono']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Celular:</h3>
                            <p>
                                <?php echo $value['celular']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Correo Electronico:</h3>
                            <p>
                                <?php echo $value['correo']; ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <div id="datosVehiculo">
                    <ul data-role="listview" data-inset="true">
                        <li data-role="list-divider">
                            <h2>Informacion Vehiculo</h2>
                        </li>
                        <li>
                            <h3>Placa:</h3>
                            <p>
                                <?php echo $value['placa']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Marca:</h3>
                            <p>
                                <?php echo $value['marca']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Modelo:</h3>
                            <p>
                                <?php echo $value['modelo']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Fotos del Vehiculo:</h3>
                            <?php

                                foreach ($rowV as $value) {
                                    $queryImg = "SELECT nombre AS niv, direccion AS divv FROM Imagenes WHERE codImagen = ".$value['codIMG'];
                                    try{
                                        $dbh = new PDO($cadena,$user,$pass);
                                        foreach ($dbh->query($queryImg) as $row){
                                            echo "<img src='http://localhost/".$row['divv']."/".$row['niv']."' style=\"height:50%;width:50%\" /> <br>";
                                        }
                                        }catch (PDOException $e){
                                            print "Error: " . $e->getMessage() . "<br/>";
                                            die();
                                    }
                                }
                                
                            ?>
                        </li>

                    </div>

                    <?php
                    }
                    ?>
            </div>
            <div data-role="footer" data-theme="b" data-position="fixed">
                <p>Fletes Costa Rica - Derechos Reservados</p>
            </div>
        </div>
    </div>
    </body>
</html>
