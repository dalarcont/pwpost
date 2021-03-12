<?php
    session_start();

    function loadProfileData($user){
        
        $result = array();
        $SQL_Query = "SELECT * FROM pi_users piu WHERE piu.username = '$user'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG ;


        return $result;
    }
    

?>