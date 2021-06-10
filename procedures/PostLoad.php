<?php
    session_start();

    //Load a post directly only with its post ID
    function DB_Post_DirectLoad($post_id){
        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.uid_post = '$post_id'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG ;
        return $result ;
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }

    //Load post of the user and its followed accounts
    function DB_Post_GeneralLoad($loggeduser){

        $SQL_Query = "SELECT   DISTINCT
            pif.username_followed, ge.*,
            CASE
                WHEN EXISTS(SELECT * FROM likedpost lp WHERE lp.likedpost_id = ge.uid_post AND lp.username ='$loggeduser' ) THEN true
                ELSE false
            END  AS likeproperty
        FROM
            following AS pif
        JOIN
            general_entries AS ge ON (pif.username_followed = ge.own_user)
        WHERE
            pif.username = '$loggeduser'
        ORDER BY
            ge.pubdate DESC;";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result;
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }

    //Load posts of an specific user
    function DB_Post_Profile($usrname,$hideProp){

        if($hideProp==true){
            //Show only public entries
            $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user = '$usrname' AND hiddenprop = '0' ORDER BY ge.pubdate DESC";
        }else{
            $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user = '$usrname' ORDER BY ge.pubdate DESC";
        }

        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result;
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }

    
    

?>