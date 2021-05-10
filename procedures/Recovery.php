<?php
    //Make a temporal password
    function MakeTemporalPassword($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PI".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    //Unset actual password and set recovery password
    function DB_SetUpRecoveryPassword$email,$pswd){
        $SQL_QUERY = "UPDATE users SET recovery_key = '$pswd', user_pswd = '$pswd' WHERE user_email = '$email'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }
?>