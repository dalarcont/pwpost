<?php 
    function hiddenProperty($choose,$postid,$own_user){
        if($choose=="hide"){
            $choose = "1";
        }else{
            $choose = "0";
        }
        $SQL_QUERY = "UPDATE general_entries SET hiddenprop = '$choose' WHERE (uid_post = '$postid' AND own_user ='$own_user')";
        $r = mysqli_query(DB_CON(),$SQL_QUERY);
        return $r ;
    }
?>