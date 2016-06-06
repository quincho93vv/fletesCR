<?php
	$error = htmlspecialchars($_GET["error"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Lo sentimos, ha ocurrido un error</title>
    </head>
    <body>
        <h1>ERROR</h1>
        <p><?php echo $error ?></p>
    </body>
</html>
