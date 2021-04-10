<?php 
    //Set follow procedure for User to User
    //THIS PROCEDURE OR QUERY STATEMENT IT'S DIFFERENT FROM mkFirstFollow
    //Follower and followed 'username' & 'uuid' are required.
    session_start();


    function doFollow($followed){
        //Get date and time of the follow action
        date_default_timezone_set('America/Bogota');
        $followdate =  date("Y-m-d H:i:s");
        //Needed data
        $follower_un = $_SESSION['UsrPkg']['username'];
        $follower_uid = $_SESSION['UsrPkg']['uuid_user'];
        //Query statement
        $SQL_QUERY = "INSERT INTO following (uuid_followed, username_followed, uuid_user, username, follow_date)
        SELECT uuid_user, username, '$follower_uid', '$follower_un', '$followdate'
            FROM users 
                WHERE username = '$followed'";
                //Let's do the query and check if it was sucess
                if(mysqli_query(DB_CON(),$SQL_QUERY)){
                    return true;
                }else{
                    return false;
                }
    }
    



?>