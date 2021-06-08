<?php 

    function DB_VerifyUserExistence($username){
        $SQL_QUERY = "SELECT username FROM users piu WHERE piu.username='$username'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($SQL_CON)['username'];
        if(empty($r)){
            //User doesn't exists
            return false;
        }else{
            //User exits
            return true;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    function DB_getUsername($email){
        $SQL_QUERY = "SELECT username FROM users WHERE users.user_email = '$email'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($SQL_CON)[0];
        if(empty($r)){
            //User doesn't exists
            return false;
        }else{
            //User exits
            return $r;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }


?>