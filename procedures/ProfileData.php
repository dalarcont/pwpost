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
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }

    function DB_LoadProfile_Entries($user){
        $result = array();
        $SQL_Query = "SELECT * FROM general_entries ge WHERE ge.own_user IN('$user') ORDER BY ge.pubdate DESC";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result ;
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }


    function DB_DeleteProfile($user,$key){
        //This statement will execute one delete operation but DB have a configuration to delete any data related to user when a user delete is executed.
        $SQL_Query = "DELETE FROM users WHERE users.user_email = '$user' AND users.user_pswd = '$key'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        if($SQL_CON){return true;}else{return false;}
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }


?>