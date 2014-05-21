


   

  <p><?php echo SALUDO ?></p>
<b>[<?php echo $_SESSION['user'] ?>]</b>&nbsp;<a href="../index.php?sesion=logout" title="Salir">Salir</a><br/><br/>
<ul><li>
        <a href="intranet.php" title="volver atrás">Volver a intranet</a></li>

    <li><a href="creausuari.php" title="registro">Registrar usuario</a></li></ul>
<br/>
<p><b>OPCIONES</b></p>
<table>
    <tr><td><form action="intranet.php" method="post">
          <input type="submit" value="Estado de squid" name="status">
          <input type="submit" value="Estado del firewall" name="status">
          <input type="submit" value="Chequeo del firewall" name="status">
          </form>
        </td></tr>
    
          
</table>
<?php
if(isset($msg)){
    echo "<br/><textarea rows=\"4\" cols=\"25\">$msg</textarea>";
}
?>



