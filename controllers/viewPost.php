<?php 
session_start();
    $post_id = $_GET['post'];

    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/sys_db_con.php';
        require 'procedures/loadPost.php';
        require 'procedures/EntryVersionControl.php';
        require 'controllers/HidenShowEntryMgmt.php';
    //Require views, in the same directory because was called from a file on first directory paths
        include 'views/entry.php';

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
                printEntry_VC($Entries[$i]);
            }
        }
    }
    //Request post data by its uid
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
            //Load attached post if exists
            if($result['attached_prop']!=0){
                //There is an attached entry
                $attachedPackage = loadPost_direct($result['attached_uid_post']);
                //If the attached entry is private, return false
                if($attachedPackage['hiddenprop']==1){
                    $result[$i]["attached_content"]=false;
                }else{
                    //Push above elements on the array
                    $result["attached_user"] = $attachedPackage['own_user'];
                    $result["attached_title"] = $attachedPackage['title'];
                    $result["attached_content"] = $attachedPackage['content'];
                }
                
            }
            
            
        }
        

            

?>