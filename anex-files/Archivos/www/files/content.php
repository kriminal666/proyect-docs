<br/>
<h2>Acciones</h2>
<?php
//Obtenemos la dirección Ip del usuario
$ip=$_SERVER['REMOTE_ADDR'];
//Obtenemos el estado del firewall
$status=estado();
//Profe aula 20.2
if($ip=="192.168.50.12"){
    //Según el estado del firewall
    if($status=="1" ||$status=="4" || $status=="5" || $status=="7"){
        echo "<div id=\"msg\"><b>Aula 20.2 bloqueada</b></div><br/>";
        echo "<form action=\"intranet.php\" method=\"post\">
          <input type=\"submit\" value=\"Desbloquear aula 20.2\" name=\"ublock\">
          </form>";
    }else{
        echo "<form action=\"intranet.php\" method=\"post\">
              <input type=\"submit\" value=\"Bloquear aula 20.2\" name=\"block\">
              </form>";
        echo "<div id=\"msg\"><b>Aula 20.2 desbloqueada</b>"
        . "</div>";
    }
    //Profe aula 20.3
}elseif($ip=="192.168.50.13"){
    if($status=="2" ||$status=="4" || $status=="6" || $status=="7"){
        echo "<div id=\"msg\"><b>Aula 20.3 bloqueada</b></div><br/>";
        echo "<form action=\"intranet.php\" method=\"post\">
          <input type=\"submit\" value=\"Desbloquear aula 20.3\" name=\"ublock\">
          </form>";
    }else{
        echo "<form action=\"intranet.php\" method=\"post\">
              <input type=\"submit\" value=\"Bloquear aula 20.3\" name=\"block\">
              </form>";
        echo "<div id=\"msg\"><b>Aula 20.3 desbloqueada</b>"
        . "</div>";
    }
    //Profe aula 20.4 
}elseif($ip=="192.168.50.14"){
 if($status=="3" ||$status=="5" || $status=="6" || $status=="7"){
        echo "<div id=\"msg\"><b>Aula 20.4 bloqueada</b></div><br/>";
        echo "<form action=\"intranet.php\" method=\"post\">
          <input type=\"submit\" value=\"Desbloquear aula 20.4\" name=\"ublock\">
          </form>";
    }else{
        echo "<form action=\"intranet.php\" method=\"post\">
              <input type=\"submit\" value=\"Bloquear aula 20.4\" name=\"block\">
              </form>";
        echo "<div id=\"msg\"><b>Aula 20.4 desbloqueada</b>"
        . "</div>";
    }
    //localhost
}elseif($ip=="127.0.0.1"){
      echo "<form action=\"intranet.php\" method=\"post\">
          <input type=\"submit\" value=\"Bloquear aula 20.2\" name=\"block\">
          <input type=\"submit\" value=\"Bloquear aula 20.3\" name=\"block\">
          <input type=\"submit\" value=\"Bloquear aula 20.4\" name=\"block\">
          </form>";
      echo "<form action=\"intranet.php\" method=\"post\">
          <input type=\"submit\" value=\"Desbloquear aula 20.2\" name=\"ublock\">
          <input type=\"submit\" value=\"Desbloquear aula 20.3\" name=\"ublock\">
          <input type=\"submit\" value=\"Desbloquear aula 20.4\" name=\"ublock\">
          </form>";
      }
      ?>
<h2>Ejecutar comandos de terminal del RB</h2>
<form method="get" action="intranet.php?cmd">
   <input type="text" name="cmd" value="" size="40" maxlength="100" placeholder="Introduce un comando de terminal"/><br/>
   <input type='submit' value="Ejecutar" name="envia"/> 
               </form> 
<?php
   if(isset($_GET['cmd'])){
          echo "<div id=\"muestra\">
                <table border=\"2px\" align=\"center\">
                        <tr><td><pre>";
       if(($_GET['cmd']=="system reset-configuration")||($_GET['cmd']=="system shutdown")){
           echo "NO PERMITIDO";
       }else{
       $cmd=comandos($_GET['cmd']);
       echo $cmd;
  }
  echo "</pre></td></tr></table></div>";
   }
?>

        