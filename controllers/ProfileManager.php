<?php 
    session_start();

    //Verify session data is set
    if(!empty($_SESSION['UsrPkg'])){
        $UserData = $_SESSION['UsrPkg'];
    }

    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures
        require '../procedures/PostLoad.php'; //Post loader
        require '../procedures/ProfileData.php'; //Data profile loader
        require '../controllers/PrivacyManager.php'; //Privacy manager at printing post
        include '../procedures/UserExists.php'; //Verify user existence
    //Require views
        include '../views/Entry.php';
        include '../views/UserProfile.php';
        include '../procedures/EntryPrinter.php';

    //Selector functions
    function SameUser($a){
        //Print description
        Print_ProfileResume($a);
        //Print entries included the hidden because user wants to see its own profile
        $EntryPkg = DB_Post_Profile($a['username'],false);
        if(empty($EntryPkg)){
            //There isn't entries
            PrintProfile_Empty();
        }else{
            EntryPrinter($EntryPkg);
        }
    }

    function PublicUser(){
        //Procedure was called from public, i.e. not logged user
        if(DB_VerifyUserExistence($_POST['p'])){
            //User exists
            $PV_Pkg = DB_LoadProfile_Data($_POST['p']);
            //Check if 
            Print_ProfileResumePublic($PV_Pkg);
            //Print entries (Public entries)
            $PV_Entry = DB_Post_Profile($_POST['p'],true);
            if(empty($PV_Entry)){
                //User exists but doesn't have entries
                PrintProfilePublic_Empty();
            }else{
                //User have at least 1 entry
                EntryPrinter($PV_Entry);
            }
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
            }
            PublicUser();
        break;

        default:
            //There isn't defined action to proceed
        break;

    }
    

?>