
    
<?php
   //Si no existen las variables, no se ha pasado por la página de login
   if((!isset($_POST[user]))&&(!isset($_POST[passwd]))){
       header('Location:../files/error.php?error=1');
   }else{
       //Incluyo el archivo de las funciones
       include('bbdd.php');
       //Llamamos a la función para conectar con la base de datos
         conecta();
      //Consulta que extrae datos de la tabla usuaris.
         $sql="select user,passwd from usuarios where user='$_POST[user]'";
      //array que guarda los datos.       
          $row=mysql_fetch_array(mysql_query($sql));
       //Encriptamos la contraseña
          $pass=hash('sha512',$_POST[passwd]); 
       //Comprobamos usuario y password
          if(($row[user]==$_POST[user])&&($row[passwd]===$pass)){
              session_start();
          //Si coinciden guardamos id,nombre y si es admin o no en sesión
              $_SESSION['user']=$row[user];
             //Enviamos a la intranet
              header('Location:../files/intranet.php');
             //Desconectamos de la base de datos.
              desconecta();
              /*Si el usuario no existe o la contraseña
               *no es identica enviamos $_GET error2
               */        
               }else{
            
            header('Location:../files/error.php?error=2');
     }
        
     }
   
     

?>

