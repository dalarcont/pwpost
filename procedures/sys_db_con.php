<?php 

	function DB_CON(){
		#Conexión a Base de datos

		#Host
		$linkdir="localhost"; 
		#Usuario
			$linkusr="root"; 
		#Contraseña
			$linkpss="D4larcont"; 
		#Base de datos
			$linktbl="pwpostdb"; 
		#Ejecutor de conexión
			$link=mysqli_connect($linkdir,$linkusr,$linkpss,$linktbl);
		return $link ;
	}

	function DB_CON_CLOSE($query,$dbcon){
		mysqli_free_result($query);
		mysqli_close($dbcon);
	}

?>