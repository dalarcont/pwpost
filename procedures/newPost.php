<?php 
    
    function postUUID($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PWP".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    function newPost($user,$title,$content,$postUUID){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        //
        $content = nl2br($content,true);
        $SQL_QUERY = "INSERT INTO general_entries (uuid_post, own_user, pubdate_original, pubdate, title, content, edit_counter)
        VALUES ('$postUUID','$user','$pubdate','$pubdate','$title','$content',0)";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }
?>