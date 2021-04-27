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
    }

    //At new registry or editing post, let version control
    function Post_VersionControl($user,$title,$content,$version,$objetive){
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        $commit_id = $objetive.$version;
        $content = nl2br($content,true);
        $SQL_QUERY = "INSERT INTO entry_versioncontrol (commit_id, uid_post, edit_version, own_user, pubdate, title, content)
        VALUES ('$commit_id','$objetive','$version','$user','$pubdate','$title','$content')";
        if(mysqli_query(DB_CON(),$SQL_QUERY)){
            return true;
        }else{
            return false;
        }
    }

?>