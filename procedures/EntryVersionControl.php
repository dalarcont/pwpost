<?php

    //Get entries data to print for an entry that have editions
    function getEntryVersions($idp,$lastversion){
        //This sentence will get previous versions of an entry but doesn't include the actual edition
        $Package = array();
        $SQL_Query = "SELECT * FROM entry_versioncontrol WHERE uid_post = '$idp' AND edit_version NOT LIKE '$lastversion' ORDER BY pubdate DESC";
        $SQL_CON = mysqli_query(DB_CON(),$SQL_Query);
        while($SQL_PKG = mysqli_fetch_array($SQL_CON)){
            $Package[]=$SQL_PKG;
        }
        return $Package ;
        DB_CON_CLOSE($SQL_Query,DB_CON());
    }

    //At new registry or editing post, let version control
    function DB_AddPost_VersionControl($user,$title,$content,$version,$objetive,$attachedsource){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        //If there isn't attached post (for a repost), just let empty attached and '0' to property
        if($attachedsource==NULL){$attached_prop=0;$attachedsource="";}else{$attached_prop=1;}
        $commit_id = $objetive.$version;
        $content = nl2br($content,true);
        $SQL_QUERY = "INSERT INTO entry_versioncontrol (commit_id, uid_post, edit_version, own_user, pubdate, title, content, attached_prop, attached_uid_post)
        VALUES ('$commit_id','$objetive','$version','$user','$pubdate','$title','$content','$attached_prop','$attachedsource')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

    //For Tw Repost
    function DB_TwPost_VersionControl($user,$title,$content,$version,$objetive,$attachedsource){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        //If there isn't attached post (for a repost), just let empty attached and '0' to property
        if($attachedsource==NULL){$attached_prop=0;$attachedsource="";}else{$attached_prop=1;}
        $commit_id = $objetive.$version;
        $content = nl2br($content,true);
        $SQL_QUERY = "INSERT INTO entry_versioncontrol (commit_id, uid_post, edit_version, own_user, pubdate, title, content, attached_prop, attached_tw_sourcelink)
        VALUES ('$commit_id','$objetive','$version','$user','$pubdate','$title','$content','$attached_prop','$attachedsource')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
        DB_CON_CLOSE($SQL_QUERY,DB_CON());
    }

?>