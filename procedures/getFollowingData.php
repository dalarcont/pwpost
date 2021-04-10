<?php
    //Get the users that a user follows.
    function getFollowedList($logged_user){
        //SQL Statement
        $SQL_QUERY = "
        SELECT username_followed 
            FROM following 
                WHERE username = '$logged_user'
                    AND username_followed != '$logged_user'";
        //Execution
        $do = mysqli_query(DB_CON(),$SQL_QUERY);
        if($do){
            $r = mysqli_fetch_array($do);
            return $r;
        }else{
            return false;
        }

    }

    //Validate if an user follow other
    function checkFollowing($followed,$follower){
        
        //SQL Statement
        $SQL_QUERY = "SELECT * FROM following WHERE username = '$follower' AND username_followed = '$followed'";
        $do = mysqli_query(DB_CON(),$SQL_QUERY);
        if($do){
            $r = mysqli_fetch_array($do);
            if($r['username_followed']==$followed AND $r['username']==$follower){
                return true;
            }else{
                return false;
            }
            //return true;
        }else{
            return false;
        }
           
    }
    


?>