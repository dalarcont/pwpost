<?php 

    function remPost($uid,$own_user){
        $SQL_QUERY = "DELETE FROM general_entries WHERE uid_post = '$uid' AND own_user = '$own_user'";
        $DOIT = mysqli_query(DB_CON(),$SQL_QUERY);
        if($DOIT){
            return true;
        }else{
            return false;
        }

    }
?>