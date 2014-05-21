<br/>
<?php
//Si existen las variables de monitorización
if((isset($_GET["monitorsquid"]))||(isset($_GET["monitorfirewall"]))){
      echo "<div id=\"muestra\">
                <table border=\"2px\" align=\"center\">
                        <tr>
                        <td><pre>";
    //Para monitorizar squid
    switch($_GET["monitorsquid"]){
        case 1:
        include("../squid.log/index.html");
        
        break; 
        case 2:
         echo "<object data=\"http://localhost/cachemgr/cachemgr.cgi\" width=\"600\" height=\"490\">
          <embed wmode=\"transparent\" src=\"http://localhost/cachemgr/cachemgr.cgi\" width=\"600\" height=\"490\" /> Error: Embedded data could not be displayed. </object>";
            break;
        }
        //Para monitorizar el firewall
        switch($_GET["monitorfirewall"]){
            case 1:
                $cmd=`sudo cat /var/log/shorewall-init.log`;
                echo $cmd;
                break;
            case 2:
                $cmd=`sudo cat /var/log/firewall.log`;
                echo $cmd;
                break;
            case 3:
                $cmd=`sudo iptables -L`;
                echo $cmd;
                break;
        }
        echo "</pre></td></tr></table></div>";
    //Si existen la variable con la ruta de un archivo.  
    }elseif(isset($archivo)){
        echo "<div style=\"width:950px; text-align: center; margin: auto; background-color: #F0F0F0;
               border: 1px solid #B3B9D5; border-color: #B3B9D5; padding: 15px; 
               font-family: Verdana, Arial, Helvetica, sans-serif; color: #717CB0; font-size: 14px;\">
                 <strong>Editando $archivo</strong><br /><br />
                <form action=\"intranet.php\" method=\"post\">
                <textarea rows=\"25\" cols=\"110\" name=\"edita\">";
        readfile($archivo);
        echo "</textarea>
                     <br />
                     <br />
              <input type=\"hidden\" name=\"file\" value=\"$archivo\"/>    
              <input type=\"submit\" value=\"Guardar los cambios\"> 
               </form></div>";
        
    }elseif(isset($_POST['status'])){
        echo "<div id=\"muestra\">
                <table border=\"2px\" align=\"center\">
                        <tr>
                        <td><pre>";
        switch($_POST['status']){
            case "Estado de squid":
                $cmd=`sudo service squid3 status`;
                echo $cmd;
                break;
            case "Estado del firewall":
                $cmd=`sudo service shorewall status`;
                echo $cmd;
                break;
            case "Chequeo del firewall":
                $cmd=`sudo shorewall check`;
                echo $cmd;
                break;
        }
        echo "</pre></td></tr></table></div>";
    }else{
     ?>   
<table id="squid">
    <tr>
        <td><h2>Administración de Squid</h2></td>
    </tr>
    <tr>
        <td><h3>Editar archivos</h3><td></tr>
    <tr>
        <td> <ul><li>
                    <a href="intranet.php?editorsquid=1" title="Prohibir dominios">Restringir dominios</a>
                </li>
                <ul><li>
                    <form method="post" action="intranet.php">
                        <input type="submit" value="Copiar archivo" name="copia-dr"> 
                    </form>
                    </li></ul></ul><ul>
                <li>
                    <a href="intranet.php?editorsquid=2" title="Prohibir contenidos">Restringir contenidos</a>
                </li><ul><li>
                    <form method="post" action="intranet.php">
                        <input type="submit" value="Copiar archivo" name="copia-cr"> 
                    </form>
                    </li></ul></ul><ul>
                <li>
                    <a href="intranet.php?editorsquid=3" title="Archivo principal">Archivo principal <b>(squid.conf)</b></a> 
                </li>
            </ul></td>
    </tr>
    <tr>
        <td><h3>Monitorizar Squid</h3></td></tr>
    <tr><td>
    <ul><li>
                    <a href="intranet.php?monitorsquid=1" title="Logs de Squid">Monitorizar logs</a>
                </li>
                <li>
                    <a href="intranet.php?monitorsquid=2" title="Caché de Squid">Monitorizar caché</a>
                </li>
               
    </ul></td></tr>
    <tr><td><h3>Restaurar archivos<h3></tr></td>
                    <tr><td><form action="intranet.php" method="post">
                                <input type="submit" value="Restaurar archivo de config" name="restaurasquid">
                              </form></td></tr>
                            <tr><td><form action="intranet.php" method="post" >
                             <input type="submit" value="Restaurar archivos de dominios y contenidos" name="restaura-dr-cr">
                             </form></td></tr>
    <tr><td><h3>Reiniciar Squid3<h3></tr></td>
                    <tr><td><form method="post" action="intranet.php">
                                <input type="submit" value="Reiniciar Squid3" name="reiniciasquid">
                            </form></tr></td>    
</table>
<table id="firewall">
    <tr>
        <td><h2>Administración de Firewall</h2></td>
    </tr>
    <tr>
        <td><h3>Editar archivos</h3></td>
    </tr>
    <tr>
        <td><ul><li>
                    <a href="intranet.php?editorfw=4" title="zones">Archivo de zonas</a>
                </li>
                <li>
                    <a href="intranet.php?editorfw=5" title="interfaces">Archivo de interfaces</a>
                </li>
                 <li>
                    <a href="intranet.php?editorfw=6" title="masq">Archivo de enmascaramiento</a>
                </li>
                 <li>
                    <a href="intranet.php?editorfw=7" title="policy">Normas por defecto</a>
                </li>
                 <li>
                    <a href="intranet.php?editorfw=8" title="Rules">Reglas del Firewall</a>
                </li>
                 <li>
                    <a href="intranet.php?editorfw=9" title="Blacklist">Lista negra</a>
                </li>
                <li>
                    <a href="intranet.php?editorfw=10" title="Shorewall.conf">Archivo principal <b>(shorewall.conf)</b></a>  
                </li>
            </ul></td>
    </tr>
    <tr>
        <td><h3>Monitorizar Firewall</h3></td></tr>
    <tr><td><ul><li>
                    <a href="intranet.php?monitorfirewall=1" title="Arranque firewall">Monitorizar arranque</a>
                </li>
                <li>
                    <a href="intranet.php?monitorfirewall=2" title="Logs Firewall">Monitorizar logs</a>
                </li>
                <li>
                <a href="intranet.php?monitorfirewall=3" title="Normas Iptables">Ver las normas IPTABLES</a>
                </li>
            </ul>
        </td></tr>
    <tr><td><h3>Restaurar archivos<h3></tr></td>
                    <tr><td><form method="post" action="intranet.php">
                                <input type="submit" value="Restaurar archivos" name="restaurafw">
                            </form></tr></td> 
    <tr><td><h3>Reiniciar Firewall<h3></tr></td>
                    <tr><td><form method="post" action="intranet.php">
                                <input type="submit" value="Reiniciar Firewall" name="reiniciafw">
                            </form></tr></td>    
</table>


     
<?php }?>
    
    

