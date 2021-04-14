<?php 
    function validateAuthority_post($idp,$owner){
        $SQL_QUERY = "SELECT IF(own_user='$owner','true','false') FROM general_entries WHERE uuid_post='$idp'";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($r);
        return $r ;
    }


    function remPost($uuid,$own_user){
        $SQL_QUERY = "DELETE FROM general_entries WHERE uuid_post = '$uuid' AND own_user = '$own_user'";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }
?>