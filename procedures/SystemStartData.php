<?php 

    function DB_SystemStart($username,$password){
        $SQL_QUERY = "SELECT * FROM users piu WHERE piu.username='$username' AND piu.user_pswd = '$password'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_QUERY);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG;
        return $result ;
    }


?>