<?php 

    function remPost($uuid,$own_user){
        $SQL_QUERY = "DELETE FROM general_entries WHERE uuid_post = '$uuid' AND own_user = '$own_user'";
        $DOIT = mysqli_query(DB_CON(),$SQL_QUERY);
        if($DOIT){
            return true;
        }else{
            return false;
        }

    }
?>