<!DOCTYPE html>
<?php
//si intentamos pasar por aquí a través de URL sin pasar por el login 
    if(!isset($_GET["error"])){
        header('Location:error.php?error=1');
    }
?>

<html>
	<head>
		<meta charset="ISO-8859-1"/>
		<title>ERROR</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo-login.css"/>
	</head>
	<body>
	<div id="content">
		<h2><?php
      //Incluyo el archivo miscelania y llamo a la función
       include('../funciones/miscelania.php');
       lenguaje();
       switch ($_GET["error"]){
           case 1:
               echo ERROR2."<br/>";
	      //Variable que solo sirve para sacar el enlace adecuado.
	       $enlace="0";
               break;
           case 2:
               echo ERROR."<br/>";
             //Variable que solo sirve para sacar el enlace adecuado.
	       $enlace="0";
               break;
           case 3:
               echo ERROR3."<br/>";
              //Variable que solo sirve para sacar el enlace de vuelta al registro y la intranet
               $enlace="1";
               break;
           case 4:
               echo ERROR4."<br/>";
               //Variable que solo sirve para sacar el enlace de vuelta al registro y la intranet
               $enlace="1";
               break;
           //No creo que lleguemos a este caso pero lo incluyo.
           case 5:
               echo ERROR5."<br/>";
              //Variable que solo sirve para sacar el enlace de vuelta al registro y la intranet
              $enlace="1";
              break;
       }
     

?></h2>
            <?php
            //Si la variable existe mostramos el enlace
            if(isset($enlace)&&$enlace=="1"){
                echo "<a href='creausuari.php' title='Volver a registro'>
               Volver a p&aacute;gina de registro</a><br/>
	       <a href=\"intranet.php\" title=\"Volver\">Volver al entorno</a>";
            }else{
		echo "<a href=\"../index.php\" title=\"Volver\">Volver a inicio</a>";
	    }
            ?>
  
	   
	
	</div>

	</body>
	
</html>
