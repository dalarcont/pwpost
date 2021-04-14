<?php 

    $post_id = $_GET['post'];

    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/sys_db_con.php';
        require 'procedures/loadPost.php';
        require 'controllers/HidenShowEntryMgmt.php';
    //Require views, in the same directory because was called from a file on first directory paths
        include 'views/entry.php';
    //Request post data by its uuid
        $result = loadPost_direct($post_id);
        //Get title of post
            $r_title = $result['title'];
        

            

?>