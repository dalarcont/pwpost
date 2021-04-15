<?php 
session_start();
    $post_id = $_GET['post'];

    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/sys_db_con.php';
        require 'procedures/loadPost.php';
        require 'controllers/HidenShowEntryMgmt.php';
    //Require views, in the same directory because was called from a file on first directory paths
        include 'views/entry.php';
    //Request post data by its uuid
        $result = loadPost_direct($post_id);

        //Entry is private?
        //Its private? Ok let check if is visited by public/other users or the owner
        if($result['hiddenprop']==1){
            //Entry is private   
            if((!empty($_SESSION['UsrPkg']) && $result['own_user']==$_SESSION['UsrPkg']['username'])){
                //The entry is private but the visitor is its owner
                //Send title of the page
                $r_title = $result['title'];
            }else{
                //Entry is private, don't show to other users and the public
                $r_title = "no disponible";
                $result = "PRIVATE";
            }
        }else{
            //Entry is public
            $r_title = $result['title'];
        }
        

            

?>