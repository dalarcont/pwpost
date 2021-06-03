<?php 
session_start();
    $post_id = $_GET['post'];

    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/SYS_DB_CON.php';
        require 'procedures/PostLoad.php';
        require 'procedures/EntryVersionControl.php';
        require 'controllers/PrivacyManager.php';
        require 'controllers/LikeManagement.php';
        require 'controllers/AttachedManagement.php';
    //Require views, in the same directory because was called from a file on first directory paths
        require 'views/Entry.php';
        require 'views/Language.php';

    //Functions
    function VersionControlStatement($counter,$postid){
        //Entry have more than 1 edition, show the previous versions
        if($counter){
            $Entries = array();
            $Entries = getEntryVersions($postid,$counter);
        }else{
            $Entries = NULL ;
        }

        //If entry have many edits, system will show all of his previous versions
        if($Entries!=NULL){
            //Entry have at least 1 edition
            //$Entries comes from the controller JUST ONLY if post have >=1 editions
            $size = count($Entries);
            //print entries, connect to views
            for($i=0; $i<=($size-1); $i++){
                //Load attached post if exists
                $Entries[$i] = AttachedEntryManagement($Entries[$i]);
                //Print
                PrintEntryVersionControl($Entries[$i]);
            }
        }
    }
    //Request post data by its uid
        $result = DB_Post_DirectLoad($post_id);

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
                $r_title = PostPage::titlePostAux();
                $result = "PRIVATE";
            }
        }else{
            //Entry is public
            $r_title = $result['title'];
            //Load attached post if exists
            $result = AttachedEntryManagement($result);
            //Let the values for the printer contained on the public webpage viewing side
        }
        

            

?>