<?php 

    //Set on DB that a user starts follow to other
    function Follow($followed_uuid,$followed_username,$follower_uuid,$follower_username){
        //Get date and time of the follow action
        date_default_timezone_set('America/Bogota');
        $followdate =  date("Y-m-d H:i:s");
        $SQL_QUERY = "INSERT INTO 
            following (uuid_user, username, uuid_followed, username_followed, follow_date)
            VALUES
            ('$follower_uuid','$follower_username','$followed_uuid','$followed_username','$followdate')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }

?>