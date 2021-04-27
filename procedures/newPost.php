<?php 
    
    function postuid($cantChars) {
        $r = "";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = "PWP".substr(str_shuffle($permitted_chars), 0, $cantChars);
        return $r;
    }

    function newPost($user,$title,$content,$postuid,$attachedsource){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        //If there isn't attached post (for a repost), just let empty attached and '0' to property
        if($attachedsource==NULL){$attached_prop=0;$attachedsource="";}else{$attached_prop=1;}
        //Transform HTML text to save in DB
        $content = nl2br($content,true);
        //mySQL Statement
        $SQL_QUERY = "INSERT INTO general_entries (uid_post, own_user, pubdate_original, pubdate, title, content, edit_counter, attached_prop, attached_uid_post)
        VALUES ('$postuid','$user','$pubdate','$pubdate','$title','$content',0,'$attached_prop','$attachedsource')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }

    function rePost($user,$title,$content,$postuid,$attachedsource){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        //
        $content = nl2br($content,true);
        $SQL_QUERY = "INSERT INTO general_entries (uid_post, own_user, pubdate_original, pubdate, title, content, edit_counter, attached_prop, attached_uid_post)
        VALUES ('$postuid','$user','$pubdate','$pubdate','$title','$content',0,1,'$attachedsource')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }

    }
?>