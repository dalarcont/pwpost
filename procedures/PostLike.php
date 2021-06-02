<?php 

    function DB_setLikePost($post,$user){

        date_default_timezone_set('America/Bogota');
        $date = date("Y-m-d H:i:s");
        $SQL_QUERY = "INSERT INTO likedpost (username, likedpost_id, likedate) VALUES ('$user', '$post', '$date')";
        $SQL_DO = mysqli_query(DB_CON(),$SQL_QUERY);
        if($SQL_DO){
            return true;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());

    }

    function DB_unsetLikePost($post,$user){

        $SQL_QUERY = "DELETE FROM likedpost WHERE likedpost_id = '$post' AND username ='$user'";
        $SQL_DO = mysqli_query(DB_CON(),$SQL_QUERY);
        if($SQL_DO){
            return true;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());

    }


    function DB_VerifyPostLike($post,$user){
        $SQL_QUERY = "SELECT EXISTS(SELECT * FROM likedpost WHERE likedpost_id = '$post' AND username = '$user')";
        $SQL_DO = mysqli_query(DB_CON(),$SQL_QUERY);
        $SQL_PKG = mysqli_fetch_array($SQL_DO);
        if($SQL_PKG){
            //return false;
            echo "tiene like";
        }else{
            //return true;
            echo "no tiene like";
        }
       DB_CON_CLOSE($SQL_PKG,DB_CON());
    }

    function DB_getLikedPosts($user){
        $SQL_QUERY = "SELECT DISTINCT ge.*,
        CASE
            WHEN lp.likedpost_id = ge.uid_post AND lp.username = '$user' THEN true
            ELSE false
        END AS likeproperty
        FROM general_entries AS ge JOIN likedpost AS lp WHERE ge.uid_post = lp.likedpost_id AND lp.username = '$user'";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_QUERY);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $result[]=$SQL_PKG;
        }
        return $result;

        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

?>