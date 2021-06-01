<?php

session_start();

    //Verify code attached with user
    $UserFirstAccessValidation = $_SESSION['UsrPkg']['username'];

    function checkCode($code){
        $object = $GLOBALS['UserFirstAccessValidation'];
        $SQL_QUERY = "SELECT username FROM users WHERE first_access = '$code' AND username = '$object'";
        $SQL_DO = mysqli_query(DB_CON(), $SQL_QUERY);
        if(!empty($Pkg = mysqli_fetch_array($SQL_DO))){
            //The code was found, remove it to let know system that the user can access normally in the next time
            $user = $Pkg[0];
            $SQL_QUERY2 = "UPDATE users SET first_access = '' WHERE username = '$user'";
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
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    

?>