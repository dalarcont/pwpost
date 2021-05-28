<?php

    function DB_LoadProfile_Data($user,$whoIsOnline){
        
        $result = array();
        if($whoIsOnline!=false){
            //This procedure was called from a profile viewing with logged user
            $SQL_Query = "SELECT 
            usr.user_fullname as nombreCompleto,
            usr.username as usuario,
            usr.joindate as fechaRegistro,
            (SELECT COUNT(username_followed)-1 FROM following WHERE username = '$user') as cantidadSeguidos,
            (SELECT COUNT(username)-1 FROM following WHERE username_followed = '$user') as cantidadSeguidores,
            (SELECT COUNT(uid_post) FROM general_entries WHERE own_user = '$user') as cantidadPublicaciones,
            (SELECT EXISTS(SELECT * FROM following WHERE username = '$whoIsOnline' AND username_followed = '$user')) as followStatus,
            (SELECT EXISTS(SELECT * FROM following WHERE username = '$user' AND username_followed = '$whoIsOnline')) as followBack
            FROM
                users as usr
            WHERE
                usr.username = '$user'";
        }else{
            //This procedure was called from a public viewing
            $SQL_Query = "SELECT 
            usr.user_fullname as nombreCompleto,
            usr.username as usuario,
            usr.joindate as fechaRegistro,
            (SELECT COUNT(username_followed)-1 FROM following WHERE username = '$user') as cantidadSeguidos,
            (SELECT COUNT(username)-1 FROM following WHERE username_followed = '$user') as cantidadSeguidores,
            (SELECT COUNT(*) FROM general_entries WHERE own_user = '$user') as cantidadPublicaciones
            FROM
                users as usr
            WHERE
                usr.username = '$user'";
        }
        
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        $SQL_PKG = mysqli_fetch_array($SQL_CON);
        $result = $SQL_PKG;
        return $result;
    }

    function DB_LoadProfile_Entries($user){
        $result = array();
        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user IN('$user') ORDER BY ge.pubdate DESC";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result ;
    }


    function DB_DeleteProfile($user,$key){
        $SQL_Query = "DELETE usr, ge, evc, fllw, lp 
        FROM users AS usr
        JOIN general_entries AS ge ON ge.own_user = usr.username
        JOIN entry_versioncontrol AS evc ON evc.own_user = usr.username
        JOIN following AS fllw ON fllw.username = usr.username
        JOIN following AS fllw2 ON fllw2.username = usr.username
        JOIN likedpost AS lp ON lp.username = usr.username
        WHERE usr.username = '$user' AND usr.user_pswd = '$key'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        if($SQL_CON){return true;}else{return false;}
    }


?>