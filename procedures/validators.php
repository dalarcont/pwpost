<?php 
    function ValidateAuthorityPost($idp,$owner){
        $SQL_QUERY = "SELECT IF(own_user='$owner','true','false') FROM general_entries WHERE uid_post='$idp'";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($r);
        return $r[0];
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    function ValidateAuthorityProfile($email,$key){
        $SQL_QUERY = "SELECT EXISTS(SELECT * FROM users WHERE user_email = '$email' AND user_pswd = '$key')";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($r);
        return $r[0];
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    function validatePostPublicExists($post){
        $SQL_QUERY = "SELECT * FROM general_entries WHERE uid_post = '$post'";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($r);
        if(!empty($r)){
            if($r['hiddenprop']==1){
                //Its available and public
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }
?>