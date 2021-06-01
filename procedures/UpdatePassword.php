<?php 

    function DB_SetUpNewPassword($psw,$uid){
        $SQL_QUERY = "UPDATE users SET user_pswd = '$psw', recovery_key='' WHERE uid_user = '$uid'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

?>