<?php
    //Get the users that a user follows.
    function getFollowedList($user){
        //SQL Statement
        $SQL_QUERY = "SELECT fw.username_followed AS identificador , usr.user_fullname AS nombre
        FROM following  AS fw
        JOIN users AS usr ON(fw.username_followed = usr.username)
            WHERE fw.username = '$user'
                AND fw.username_followed != '$user'";
        //Execution
        $do = mysqli_query(DB_CON(),$SQL_QUERY);

        while($SQL_PKG = mysqli_fetch_array($do)){
            $Package[]=$SQL_PKG;
        }
        if(!empty($Package)){
            return $Package;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    function getFollowersList($user){
        //SQL Statement
        $SQL_QUERY = "SELECT fw.username AS identificador, usr.user_fullname AS nombre
        FROM following AS fw
        JOIN users AS usr ON(fw.username = usr.username)
            WHERE fw.username_followed = '$user'
                AND fw.username != '$user'";
        //Execution
        $do = mysqli_query(DB_CON(),$SQL_QUERY);
        while($SQL_PKG = mysqli_fetch_array($do)){
            $Package[]=$SQL_PKG;
        }
        if(!empty($Package)){
            return $Package;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    //Validate if an user follow other
    function DB_VerifyFollow($followed,$follower){
        
        //SQL Statement
        $SQL_QUERY = "SELECT * FROM following WHERE username = '$follower' AND username_followed = '$followed'";
        $do = mysqli_query(DB_CON(),$SQL_QUERY);
        if($do){
            $r = mysqli_fetch_array($do);
            if($r['username_followed']==$followed AND $r['username']==$follower){
                //Yeah, that follow exists
                return true;
            }else{
                //Oh! That follow doesn't exits
                return false;
            }
        }else{
            //Oh! That follow wasn't verifyed.
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
           
    }
    


?>