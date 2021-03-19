<?php
    session_start();

    function loadPost($loggeduser){
        
        $result = array();
        $SQL_Query = "
        SELECT 
            pif.username_followed, ge.*
        FROM
            pi_following AS pif
        JOIN
            general_entries AS ge ON (pif.username_followed = ge.own_user)
        WHERE
            pif.username = '$loggeduser'
        ORDER BY
            ge.pubdate DESC
        ";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result;
    }

    function loadPost_loggedUser($usrname){

        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user = '$usrname' ORDER BY ge.pubdate DESC";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result;
    }

    function loadPost_direct($post_id){
        
        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.uuid_post = '$post_id'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG ;
        return $result ;
    }
    

?>