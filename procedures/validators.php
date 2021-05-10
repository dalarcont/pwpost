<?php 
    function ValidateAuthorityPost($idp,$owner){
        $SQL_QUERY = "SELECT IF(own_user='$owner','true','false') FROM general_entries WHERE uid_post='$idp'";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($r);
        return $r[0];
    }
?>