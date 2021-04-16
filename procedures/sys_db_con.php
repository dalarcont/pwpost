<?php 

function DB_CON(){
	#Conexión a Base de datos

	#Host
	$linkdir="localhost"; //"mysql.hostinger.es";
	#Usuario
		$linkusr="root"; //"u958243579_root";
	#Contraseña
		$linkpss="unmico57"; //"6nEGRz3Hen";
	#Base de datos
		$linktbl="pwpostdb"; //"u958243579_umc";
	#Ejecutor de conexión
		$link=mysqli_connect($linkdir,$linkusr,$linkpss,$linktbl);
	return $link ;
}

?>