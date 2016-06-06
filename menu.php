<?php
include('conexion.php');

$usuario = htmlspecialchars($_POST['usuarioI']);
$contrasena = htmlspecialchars($_POST['contrasenaI']);

$query = "SELECT codRolUsuario as rol FROM Accesos WHERE alias = :alias AND contrasena = :contrasena;";
$row;  

        try{
            $dbh = new PDO($cadena,$user,$pass);
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':alias' => $usuario, ':contrasena' => $contrasena));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <div role="main" class="ui-content" data-theme="b" jqm-content>
                <?php
                $role=0;
                    foreach ($row as $value) {
                        if($row != null){
                            $role = $value['rol'];    
                        }
                    }

                ?>
                <!--MENU USUARIO NORMAL-->
                <?php
                    if($role == 1){
                        echo "USUARIO NORMAL";
                    }
                    
                ?>

                <!--MENU USUARIO TRANSPORTISTA-->
                <?php
                    if($role == 2){
                        echo "USUARIO TRANSPORTISTA";
                    }
                
                ?>
                <!--LOGUEO INVALIDO-->
                <?php
                    if($role == 0){
                        echo "USUARIO NO VALIDO";
                    }
                ?>
                
            </div>
            <div data-role="footer" data-theme="b" data-position="fixed">
                <p>Fletes Costa Rica - Derechos Reservados</p>
            </div>
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
                <input data-role="password" name="contrasenaI" id="contrasenaI" value="" autocomplete="off" data-mini="true" data-theme="b">
                <button data-role="submit" data-theme="b">Ingresar</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>