<?php 

    function set_newPass($psw,$uuid){
        $SQL_QUERY = "UPDATE pi_users SET user_pswd = '$psw', recovery_key='' WHERE uuid_user = '$uuid'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }

?>