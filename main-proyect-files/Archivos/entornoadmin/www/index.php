<!DOCTYPE html>
<?php
/*Si se ha pulsado el botón de salir, destruimos la cookie de la sesión
 *  que se crea automática y la sesión.
 */
    if($_GET["sesion"]=="logout"){
        setcookie("PHPSESSID","",time()-3000,"/");
        session_destroy();
    }

?>


<html>
	<head>
		<meta charset="UTF-8"/>
		<title>LOGIN</title>
		<link rel="stylesheet" type="text/css" href="css/estilo-login.css"/>
	</head>
	<body>
	<div id="content">
		<h1>Entorno Admin</h1>
		<form method="post" action="funciones/logincheck.php">
      		  <input type="text" name="user" value="" size="15" maxlength="20" placeholder="Nombre"/>
      		  <input type="password" name="passwd" value="" size="15" maxlength="10" placeholder="Password"/>
                  <br/>
                  <input type="submit" value="login" name="logon"/>
                  
               </form>
                
                
	   <div id="footer">
		<span id="autor"><a href="www.iesebre.com" title="iesebre.com">www.iesebre.com</a></span>
	   </div>
	
	</div>

	</body>
	
</html>
