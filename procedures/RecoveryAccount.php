<?php
    //Make a temporal password
    function mkTempPswd($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PI".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    //Unset actual password and set recovery password
    function set_RecoveryAccount($email,$pswd){
        $SQL_QUERY = "UPDATE pi_users SET recovery_key = '$pswd', user_pswd = '$pswd' WHERE user_email = '$email'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }
?>