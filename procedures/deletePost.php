<?php 

    function DB_RemovePost($uid,$own_user){
        $SQL_QUERY = "DELETE FROM general_entries WHERE uid_post = '$uid' AND own_user = '$own_user'";
        $DOIT = mysqli_query(DB_CON(),$SQL_QUERY);
        if($DOIT){
            return true;
        }else{
            return false;
        }

        DB_CON_CLOSE($SQL_QUERY,DB_CON());

    }
?>