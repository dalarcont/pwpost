<?php 

    function remPost($uuid,$own_user){
        $SQL_QUERY = "DELETE FROM general_entries WHERE uuid_post = '$uuid' AND own_user = '$own_user'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }
?>