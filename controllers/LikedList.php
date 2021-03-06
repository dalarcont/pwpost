<?php 
    session_start();

    //Get the list of post that a user likes

    //Require DB connection
    require '../procedures/SYS_DB_CON.php';
    //Require procedures
        require '../procedures/PostLoad.php';
        require '../procedures/PostLike.php';
        require '../controllers/PrivacyManager.php';
        require '../controllers/LikeManagement.php';
        require '../controllers/AttachedManagement.php';
    //Require views
        require '../views/Entry.php';
        require '../views/Alerts.php';
        require '../views/UserProfile.php';
        require '../views/Language.php';

    if(!empty($_SESSION['UsrPkg'])){
        //Get data from DB
            $result = DB_getLikedPosts($_SESSION['UsrPkg']['username']);
        //Count entries
            $size = count($result);
        //print entries, connect to views
        if($size==0){
            //There isn't entries, that means the user doesn't publish any entry yet and doesn't follow someone
            PrintEmptyLikedPost();
        }else{                
            Like::LikeTitleHead();
            for($i=0; $i<=($size-1); $i++){
                //Entry privacy selector, IF ENTRY = PRIVATE but LOGGED USER IS THE OWNER, SHOW IT
                if($result[$i]['hiddenprop']!=0 && ($result[$i]['own_user']==$_SESSION['UsrPkg']['username'])){
                    //The entry have privacy but if the own user is the same logged user, system will show
                    //Add user, title, content of attached entry
                    $result[$i] = AttachedEntryManagement($result[$i]);
                    //Print
                    PrintEntry($result[$i]);
                }elseif($result[$i]['hiddenprop']==0){
                    //Its public
                    //Load attached entry
                    $result[$i] = AttachedEntryManagement($result[$i]);
                    //Print
                    PrintEntry($result[$i]);
                }else{
                    //Its private and the logged user isn't the owner of the entry
                    PrintEntry(null);
                }
            }
        }
       
    }else{
        //Session is empty
        alertMessage("PWPost!",Alerts::sessionBroke_message(),"transport","index.php");
    }
    



?>