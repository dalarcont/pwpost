<?php 
    //Make an unique user identification code
    function mkuid($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PWP".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    
    //Execute the insertion data on DB
    function doIdentity($pkg){
        $uid = mkuid(12);
        date_default_timezone_set('America/Bogota');
        $username = $pkg ['username'];
        $fullname = $pkg['fullname'];
        $email = $pkg['email'];
        $password = $pkg['pswd'];
        $joindate =  date("Y-m-d");
        $first_access = $pkg['validationCode'];
        $r = null ;
        $SQL_QUERY = "INSERT INTO 
                        users (uid_user, username, user_fullname, user_email, user_pswd, joindate, first_access) 
                        VALUES ('$uid', '$username', '$fullname', '$email', '$password', '$joindate', '$first_access')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            $r = true;
            //The system must create a 'Follow' procedure, that makes the sign up user will be able to see it's own posts because the same user is the first own follower.  
            //But the system won't let see that the same user is the 1st follower, that will be result ilogical for the user.
            Follow($uid,$username,$uid,$username);
        }else{
            $r = false;
        }
        return $r ;
    }

    


?>