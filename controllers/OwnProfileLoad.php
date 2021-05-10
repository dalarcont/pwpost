<?php 
    session_start();
    $UserData = $_SESSION['UsrPkg'];

    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures
        require '../procedures/PostLoad.php';
        require '../procedures/loadUserProfile.php';
        require '../controllers/PrivacyManager.php';
    //Require views
        include '../views/Entry.php';
        include '../views/OwnPublic_ViewProfile.php';

    //Selector
    if($_POST['path']=="PE"){//PE = Print Entry

            if(!empty($UserData['username'])){
                //Get data from DB
                    $result = DB_Post_GeneralLoad_loggedUser($UserData['username']);
                //Count entries
                    $size = count($result);
                //print entries, connect to views
                for($i=0; $i<=($size-1); $i++){
                    PrintEntry($result[$i]);
                }
            }else{
                //Have not user some entries ? Ok, lets invite him to make one.
                printProfile_entrieEmpty();
            }
    }else{
        //Print profile data
        //Get user's profile data, is always loaded by default doesn't matter if the user have or have not entries of his own authority
        $result_main = DB_LoadProfile_Data($UserData['username']);
        //Show profile data
        Print_PrivateProfileResume($result_main);
    }
    

?>