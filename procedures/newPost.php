<?php 
    
    function postUUID($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PI".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    function newPost($user,$title,$content){
        $postUUID = postUUID(15);
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        $SQL_QUERY = "INSERT INTO general_entries (uuid_post, own_user, pubdate, title, content)
        VALUES ('$postUUID','$user','$pubdate','$title','$content')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }
?>