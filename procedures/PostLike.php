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
       // DB_CON_CLOSE($SQL_PKG,DB_CON());
    }

?>