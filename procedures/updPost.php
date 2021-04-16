<?php 

    function updatePost($updUser,$updPostId,$updTitle,$updContent){
        
        $SQL_QUERY = "UPDATE general_entries SET title='$updTitle', content='$updContent' WHERE uuid_post ='$updPostId' AND own_user='$updUser'";
        $DOIT = mysqli_query(DB_CON(),$SQL_QUERY);
        if($DOIT){
            return true;
        }else{
            return false;
        }

    }
?>