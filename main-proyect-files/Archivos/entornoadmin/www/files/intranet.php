<?php
     //iniciamos sesión para recuperar variables si existen
   session_start();
    //si no se ha pasado por la página de login se le da el error
    if(!($_SESSION['user'])){
        header('Location:error.php');
    }
      //incluyo el fichero miscelania para controlar los mensajes y las funciones.
        include('../funciones/miscelania.php');
        lenguaje();
        /*
         * Si existen las variables para editar archivos damos valos a una variable
         * con la ruta correspondiente
         */
        if((isset($_GET["editorsquid"]))){
          $squid=$_GET["editorsquid"];
          $archivo=rutas($squid);
        }elseif(isset($_GET["editorfw"])){
          $fw=$_GET["editorfw"];
          $archivo=rutas($fw);
        }
        //Si se ha editado un archivo
   if(isset($_POST['edita'])){
        $content = stripslashes($_POST['edita']);
        $file=$_POST['file'];
        editar($content,$file);
        $msg="Cambios guardados en $file";
   }
   //Condición si se ha pedido restarurar archivos de squid
   if(isset($_POST['restaurasquid'])){
     $ejecuta=restaurasquid3();
       if($ejecuta==0){
           $msg="Archivos de squid restaurados. Debes reiniciar squid3";
       }else{
               $msg="Error al restaurar archivos de squid";
           }
       }
       //Si se ha pedido reiniciar squid
       if(isset($_POST['reiniciasquid'])){
           $msg=reiniciasquid3();
           
       }
    //Si se ha pedido restaurar los archivos del firewall   
    if(isset($_POST['restaurafw'])){
     $ejecuta=restaurafw();
       if($ejecuta==0){
           $msg="Archivos del firewall restaurados. Debes reiniciar el firewall";
       }else{
               $msg="Error al restaurar archivos del firewall";
           }
       }
       //Si se quiere reiniciar el firewall llamamos a la función correspondiente.
         if(isset($_POST['reiniciafw'])){
           $msg=reiniciafw();
           
       }
       //Si se ha pedido copiar dominios-restringidos
       if(isset($_POST['copia-dr'])){
           //Llamamos a la función
          $aviso=copia1();
          if($aviso==0){
              $msg="Archivo de dominios restringidos copiado en /etc/squid3/copias";
          }else{
              $msg="Error al copiar el archivo 'dominios-restringidos'";
          }
       }
       //Si se quiere copiar el archivo de contenidos
       if(isset($_POST['copia-cr'])){
           $aviso=copia2();
           if($aviso==0){
              $msg="Archivo de contenidos restringidos copiado en /etc/squid3/copias";
          }else{
              $msg="Error al copiar el archivo 'contenido-restringido'";
          }
       }
       //Si se quiere restaurar los archivos de dominios y contenido restringidos
       if(isset($_POST['restaura-dr-cr'])){
           $aviso=restauradrcr();
           $msg=$aviso;
       }
   
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>INTRANET</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo-intranet.css"/>
	</head>
	<body>
		<div id="toplogo">
			<?php
			     include 'top.php';
			?>
		</div>
		<div id="content">
			<div id="maincontent">
		
				 <?php
				      include 'content.php';
                                      
				?> 
			</div>
				<br/>
				<br/>
			<div id="leftcontent">
				<br/>
				<?php
				      include 'menu.php';
				?>
			</div>
                     </div>

		<div id="footer">
			<?php
			      include 'bottom.php';
			?>
		</div>
	</body>
</html>

