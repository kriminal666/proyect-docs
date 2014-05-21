<?php
//Incluimos el archivo de las funciones
include('funciones.php');
//Si existe la petición de bloqueo
if(isset($_POST['block'])){
    $valor=$_POST['block'];
    switch($valor){
        case "Bloquear aula 20.2":
            $aula="20.2";
            bloquea($aula);
            break;
        case "Bloquear aula 20.3":
            $aula="20.3";
            bloquea($aula);
            break;
        case "Bloquear aula 20.4":
            $aula="20.4";
            bloquea($aula);
            break;
    
    }
}elseif(isset($_POST['ublock'])){
    $valor=$_POST['ublock'];
    $action="ublock";
    switch($valor){
           case "Desbloquear aula 20.2":
            $aula="20.2";
            desbloquea($aula);
            break;
        case "Desbloquear aula 20.3":
            $aula="20.3";
            desbloquea($aula);
            break;
        case "Desbloquear aula 20.4":
            $aula="20.4";
            desbloquea($aula);
            break;
        
    }
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
				<br/>
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

