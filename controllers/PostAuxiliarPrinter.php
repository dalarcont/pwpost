<?php 
    //IMPORTANT!
    //Require DB connection, in the same directory because was called from a file on first directory path
        require '../procedures/SYS_DB_CON.php';
        require '../procedures/PostLoad.php';
        require '../controllers/PrivacyManager.php';
        require '../controllers/LikeManagement.php';
        require '../controllers/AttachedManagement.php';
        require '../views/Entry.php';
        require '../views/Alerts.php';
        require '../views/Language.php';
    //Request post data by its uid
        $result = DB_Post_DirectLoad($_POST['post']);

        if(empty($result)){
            //Entry is empty
            alertMessage("PwPost",Alerts::systemError(),false,false);
        }else{
            //Entry is ok
            //Load attached post if exists
            $result = AttachedEntryManagement($result);
            //Print entry
            PrintEntry($result);
        }
        

            

?>