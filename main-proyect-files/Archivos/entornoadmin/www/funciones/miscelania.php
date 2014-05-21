<?php
//Función para incluir los mensajes de errores y lenguaje.	
	function lenguaje(){
		include('../lang/cast.php');
}
/*Función para las rutas de los archivos. Recibe el valor de $_GET
 *como parámetro para determinar quearchivo editar.
 */
function rutas($valor){
    include('../lang/constantes.php');
    switch($valor){
        case 1:
            $ruta=DOMINIOS;
            break;
        case 2:
            $ruta=CONTENIDOS;
             break;
        case 3:
            $ruta=SQUID;
            break;
        case 4:
            $ruta=ZONES;
            break;
        case 5:
            $ruta=INTERFACES;
            break;
        case 6:
            $ruta=MASQ;
            break;
        case 7:
            $ruta=POLICY;
            break;
        case 8:
            $ruta=RULES;
            break;
        case 9:
            $ruta=BLACKLIST;
            break;
        case 10:
            $ruta=SHOREWALL;
            break;
    }
    return $ruta;
}
 /*Funcion para la edición de archivos recibe el contenido
  *  editado y la ruta del archivo como parámetros
  */
function editar($content,$archivo){
    $fp=fopen($archivo,"w") or die ("Error al abrir el archivo");
    fputs($fp,$content);
    fclose($fp) or die ("Error al cerrar el archivo");
}
//Función para restaurar archivos de squid
function restaurasquid3(){
    //Borramos el archivo de configuración y restauramos la copia
    system('sudo rm /etc/squid3/squid.conf');
    system('sudo cp /etc/squid3/copias/squid.conf /etc/squid3/squid.conf');
    //Le damos los permisos apropiados
    system('sudo chgrp www-data /etc/squid3/squid.conf');
    system('sudo chmod g+w /etc/squid3/squid.conf');
    $aviso=shell_exec('echo $?');
    return $aviso;
}
//Función para reiniciar squid
function reiniciasquid3(){
    $reinicio=shell_exec('sudo service squid3 restart');
    return $reinicio;
}

//Función para restaurar archivos de firewall.
function restaurafw(){
    //Borramos los archivos viejos
    system('sudo rm /etc/shorewall/zones /etc/shorewall/interfaces /etc/shorewall/masq '
            . '/etc/shorewall/policy /etc/shorewall/rules /etc/shorewall/blacklist /etc/shorewall/shorewall.conf');
    //Realizamos una copia de los archivos originales
    system('sudo cp /etc/shorewall/copias/* /etc/shorewall/');
    //Les damos los permisos adecuados
    system('sudo chgrp www-data /etc/shorewall/zones /etc/shorewall/interfaces /etc/shorewall/masq'
            . ' /etc/shorewall/policy /etc/shorewall/rules /etc/shorewall/blacklist /etc/shorewall/shorewall.conf');
    system('sudo chmod g+w /etc/shorewall/zones /etc/shorewall/interfaces /etc/shorewall/masq '
            . '/etc/shorewall/policy /etc/shorewall/rules /etc/shorewall/blacklist /etc/shorewall/shorewall.conf');
    $aviso=shell_exec('echo $?');
    return $aviso;
}
//Función para reiniciar el firewall
function reiniciafw(){
    $reinicio=shell_exec('sudo service shorewall restart');
    return $reinicio;
}
//funcion para hacer una copia del archivo dominios-restringidos o contenido-restringido
function copia1(){
 //Realizamos la copia del archivo
    system('sudo cp /etc/squid3/dominios-restringidos /etc/squid3/copias/');
    $aviso=shell_exec('echo $?');
    return $aviso;
}
//Función para copiar el archivo de contenidos  
function copia2(){
 //Realizamos la copia del archivo
    system('sudo cp /etc/squid3/contenido-restringido /etc/squid3/copias/');
    $aviso=shell_exec('echo $?');
    return $aviso;
}
//Función para restaurar archivos de contenidos y dominios restringidos
function restauradrcr(){
    $cmd=shell_exec('sudo ls -l /etc/squid3/copias/dominios-restringidos');
    $cmd2=shell_exec('sudo ls -l /etc/squid3/copias/contenido-restringido');
    //Comprobamos si hay alguna copia de los archivos
    if((!$cmd=="")&&(!$cmd2=="")){
       //Borramos los antiguos y restauramos las copias
       system('sudo rm /etc/squid3/dominios-restringidos /etc/squid3/contenido-restringido');
       system('sudo cp /etc/squid3/copias/dominios-restringidos /etc/squid3/');
       system('sudo cp /etc/squid3/copias/contenido-restringido /etc/squid3/');
       //Les damos los permisos adecuados
       system('sudo chgrp www-data /etc/squid3/dominios-restringidos /etc/squid3/contenido-restringido');
       system('sudo chmod g+w /etc/squid3/dominios-restringidos /etc/squid3/contenido-restringido');
       $aviso=shell_exec('echo $?');
       if($aviso==0){
           $aviso="Archivos de dominios y contenidos restringidos restaurados";
       }else{
           $aviso="Algo ha fallado en la restauración de los archivos";
       }
     //Si alguno de los archivos no existe
    }else{
        $aviso="No hay copia de alguno de los archivos para poder restaurarlos";
    }
    return $aviso;
}
  
 
    ?>
