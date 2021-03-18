<?php

    function checkCode($code){
        $SQL_QUERY = "SELECT first_access, uuid_user FROM pi_users WHERE first_access = '$code'";
        $SQL_DO = mysqli_query(DB_CON(), $SQL_QUERY);
        if($SQL_DO){
            //The code was found, remove it to let know system that the user can access normally in the next time
            $user = mysqli_fetch_array($SQL_DO)['uuid_user'];
            $SQL_QUERY2 = "UPDATE pi_users SET first_access = '' WHERE uuid_user = '$user'";
            if(mysqli_query(DB_CON(),$SQL_QUERY2)){
                //The user can access normally in the next time!
                $r = true ;
            }else{
                //DB can't remove first access lock
                $r = false ;
            }
        }else{
            //There is no coincidence for the code in the DB
            $r = false;
        }

        return $r ;

    }

    

?>