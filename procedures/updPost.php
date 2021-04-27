<?php 

    function EditLimit($updPostId){
        $SQL_QUERY = "SELECT edit_counter FROM general_entries WHERE uuid_post = '$updPostId'";
        $do = mysqli_query(DB_CON(),$SQL_QUERY);
        $r = mysqli_fetch_array($do);
        return $r;
    }

    function updatePost($updUser,$updPostId,$updTitle,$updContent,$lastUpddate){
        
        date_default_timezone_set('America/Bogota');
        $pubdate = date("Y-m-d H:i:s");
        /*
            IMPORTANT! Entries DB has three fields when a date is stored: 
            Original date of post creation. 
            Date of post last update. 
            Previous date from post's update date

            In every post update, we need to update pub_date too and edit_lastdate, like we explain following:
            pub_date = real time today date
            edit_lastdate = pub_date BEFORE this update

            The above is for explain to users what's the entry publication original date, what's the entry edition actual date and finally what's the last entry edition date before the actual
        */
        $SQL_QUERY = "UPDATE 
        general_entries 
            SET title='$updTitle', 
            content='$updContent',
            pubdate = '$pubdate', 
            edit_counter = edit_counter+1, 
            edit_lastdate = '$lastUpddate'
            WHERE uuid_post ='$updPostId' AND own_user='$updUser'";
        $DOIT = mysqli_query(DB_CON(),$SQL_QUERY);
        if($DOIT){
            return true;
        }else{
            return false;
        }

    }
?>