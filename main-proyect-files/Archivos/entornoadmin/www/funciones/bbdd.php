<?php
  //Función para conectar a la base de datos
   function conecta(){
       //Variables para conectar con la base de datos
         $host="localhost";
	 $user="root";
	 $pass="satan777";
         $basedatos="entornoadmin";
       //Conexión con la base de datos.
         $conexion=mysql_connect($host,$user,$pass);
         mysql_select_db("$basedatos",$conexion);
         //retorno la variable que voy a usar en la desconexión.
         return $conexion;
   }
   //función para desconectar de la base de datos
   function desconecta(){
        //Variable para desconectar de la base de datos
        $desconecta=conecta();
        //Desconexión de la base de datos
         mysql_close($desconecta);
   }
?>
