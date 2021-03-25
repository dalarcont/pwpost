<?php

    function loadProfileData($user){
        
        $result = array();
        $SQL_Query = "SELECT piu.user_fullname, piu.joindate, piu.username FROM users piu WHERE piu.username = '$user'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG;
        return $result;
    }

    function getProfile_entries($user){
        $result = array();
        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user IN('$user') ORDER BY ge.pubdate DESC";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result ;
    }


?>