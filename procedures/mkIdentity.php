<?php 
    function mkUUID($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PI".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    function doIdentity($pkg){
        $uuid = mkUUID(15);
        date_default_timezone_set('America/Bogota');
        $username = $pkg ['username'];
        $fullname = $pkg['fullname'];
        $email = $pkg['email'];
        $password = $pkg['pswd'];
        $joindate =  date("Y-m-d");
        $first_access = $pkg['validationCode'];
        $r = null ;
        $SQL_QUERY = "INSERT INTO 
                        pi_users (uuid_user, username, user_fullname, user_email, user_pswd, joindate, first_access) 
                        VALUES ('$uuid', '$username', '$fullname', '$email', '$password', '$joindate', '$first_access')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            $r = true;
        }else{
            $r = false;
        }
        return $r ;
    }

    


?>