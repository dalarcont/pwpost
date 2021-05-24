<?php 

function DB_CON(){
	#Conexión a Base de datos

	#Host
	$linkdir="localhost"; 
	#Usuario
		$linkusr="root"; 
	#Contraseña
		$linkpss="unmico57"; 
	#Base de datos
		$linktbl="pwpostdb"; 
	#Ejecutor de conexión
		$link=mysqli_connect($linkdir,$linkusr,$linkpss,$linktbl);
	return $link ;
}

?>