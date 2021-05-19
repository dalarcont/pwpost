<?php 
    session_start();

    //Verify session data is set
    if(!empty($_SESSION['UsrPkg'])){
        $UserData = $_SESSION['UsrPkg'];
    }

    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures and processors
        require '../procedures/PostLoad.php'; //Post loader
        require '../procedures/ProfileData.php'; //Data profile loader
        require '../controllers/PrivacyManager.php'; //Privacy manager at printing post
        require '../procedures/UserExists.php'; //Verify user existence
        require '../controllers/AttachedManagement.php'; //Attached entry management
    //Require views
        require '../views/Entry.php';
        require '../views/UserProfile.php';

    //Entry printer in loop
    function EntryPrinter($PKG){
        $size = count($PKG);
        //print entries, connect to views, but first take support from attached entry management if there are.
        for($i=0; $i<=($size-1); $i++){
            //Process package
            $PKG[$i] = AttachedEntryManagement($PKG[$i]);
            PrintEntry($PKG[$i]);
        }
    }

    //Selector functions
    function SameUser($a){
        //Print description
        echo "<script>$('#profileResume').append('".Print_ProfileResume($a)."');</script>";
        //Print entries included the hidden because user wants to see its own profile
        $EntryPkg = DB_Post_Profile($a['username'],false);
        if(empty($EntryPkg)){
            //There isn't entries
            PrintProfile_Empty();
        }else{
            EntryPrinter($EntryPkg);
        }
    }

    function PublicUser($selector){
        //Procedure was called from public, i.e. not logged user
        if(DB_VerifyUserExistence($_POST['p'])){
            //User exists
            //Get data but indicate if a logged user is viewing the profile
            if($selector=="private"){
                //Someone logged is viewing this profile
                //$PV_Pkg = DB_LoadProfile_Data($_POST['p'],$_SESSION['UserPkg']['username']);
                $PV_Pkg = DB_LoadProfile_Data($_POST['p'],$_SESSION['UserPkg']['username']);
            }else{
                //Public is viewing
                $PV_Pkg = DB_LoadProfile_Data($_POST['p'],false);
            }

            //Print profile resume
            //Print_ProfileResumePublic($PV_Pkg);
            ProfileResume("private",$PV_Pkg);
/*
            //Print entries (Public entries)
            $PV_Entry = DB_Post_Profile($_POST['p'],true);
            //Selector of post's cantity
            if(empty($PV_Entry)){
                //User exists but doesn't have entries
                PrintProfilePublic_Empty();
            }else{
                //User have at least 1 entry
                EntryPrinter($PV_Entry);
            }*/
        }else{
            PrintProfileNonexistence();
        }
    }


    switch($_POST['path']){
        case "LUOWN":
            //Logged user
            //Procedure was called from logged user, that means the user wants to see its own profile
            SameUser($UserData);
        break;

        case "PV":
            //Public view
            if($_POST['p']==$UserData['username']){
                //The logged user wants to see its profile from the separate page for profile public viewing.
                echo "<i>Estimado(a) usuario(a): ".$UserData['username'].", esta es la vista de tu perfil ante el público.</i>";
                PublicUser("private");
            }else{
                PublicUser(false);
            }
        break;

        default:
            //There isn't defined action to proceed
        break;

    }
    

?>