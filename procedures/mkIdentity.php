<?php 
    function mkUUID() {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PI".substr(str_shuffle($permitted_chars), 0, 15);
        return $r;
    }

    function doIdentity($pkg){
        $uuid = mkUUID();
        $username = $pkg ['username'];
        $fullname = $pkg['user_fullname'];
        $email = $pkg['user_email'];
        $password = $pkg['user_pswd'];
        $joindate =  date("Y-m-d");
        $r = null ;
        $SQL_QUERY = "INSERT INTO 
                        pi_users (uuid_user, username, user_fullname, user_email, user_pswd, joindate) 
                        VALUES ('$uuid', '$username', '$fullname', '$email', '$password', '$joindate')";
        if($SQL_DO = mysqli_query(DB_CON(),$SQL_QUERY)){
            $r = true;
        }else{
            $r = false;
        }
        return $r ;

    }


?>