<?php
    session_start();

    function DB_LoadProfile_Data($user){
        
        $result = array();
        $SQL_Query = "SELECT * FROM users piu WHERE piu.username = '$user'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $result = $SQL_PKG = mysqli_fetch_array($SQL_CON);
        return $result;
    }
    

?>