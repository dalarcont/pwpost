<?php 
    //Set follow procedure for User to User
    //THIS PROCEDURE OR QUERY STATEMENT IT'S DIFFERENT FROM mkFirstFollow
    //Follower and followed 'username' & 'uid' are required.
    session_start();


    function DB_SetUpFollow($followed,$source){

        //Get date and time
        date_default_timezone_set('America/Bogota');
        $followdate =  date("Y-m-d H:i:s");

        if($source=="FIRST"){
            //Needed data to set up the first following
            //Just signup user follows it self
            $SQL_QUERY = "INSERT INTO 
            following (uid_user,username,uid_followed,username_followed,follow_date)
            SELECT uid_user, '$followed', uid_user, '$followed','$followdate'
            FROM users
            WHERE username = '$followed'";
        }else{
            //Needed data
            $follower_un = $_SESSION['UsrPkg']['username'];
            $follower_uid = $_SESSION['UsrPkg']['uid_user'];
            //Query statement
            $SQL_QUERY = "INSERT INTO following (uid_followed, username_followed, uid_user, username, follow_date)
            SELECT uid_user, username, '$follower_uid', '$follower_un', '$followdate'
                FROM users 
                    WHERE username = '$followed'";
        }
        
        
        //Let's do the query and check if it was sucess
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }

    function DB_UnsetFollow($unfollowed,$user){
        $SQL_QUERY = "DELETE FROM following WHERE username_followed = '$unfollowed' AND username = '$user'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }

    



?>