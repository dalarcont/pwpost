<?php 
    session_start();
    //Controller to delete a profile


    //Call views
    require '../views/Alerts.php';
    require '../views/confirmations.php';
    require '../views/Language.php';

    //Call procedure
    require '../procedures/sys_db_con.php';
    require '../procedures/validators.php' ;
    require '../procedures/ProfileData.php';

    //Data
    $selector = $_POST['call']; //Procedure to follow
    $to = $_POST['to']; //Profile to delete
    $object = $_POST['who'];    //Email to confirm
    $key = $_POST['key'];   //Password to confirm


    //Main operator
    if($selector=="let"){
        //User wants to delete its profile
        //Verify if the session user wasn't change while this procedure was called.
        if($to == $_SESSION['UsrPkg']['username']){
            //Yes, its the same user and the session data still alive
            deleteProfileConfirmation();
        }else{
            //Session data isn't the same as the user who request for delete profile
            alertMessage(Alerts::deleteProfileTitle(),Alerts::sessionBroke_message(),false,false);
        }
    }else{
        if($selector=="doIt"){
            //Delete profile
            //Validate authority
            $authDelete = ValidateAuthorityProfile($object,$key);
            if($authDelete){
                //Authority is OK
                $delete = DB_DeleteProfile($object,$key);
                if($delete){
                    alertMessage(Alerts::deleteProfileTitle(),Alerts::successDeleteProfile(),"transport","index.php?p=rms");
                }else{
                    alertMessage(Alerts::deleteProfileTitle(),Alerts::systemError(),"transport","index.php");
                }
            }else{
                //Authority fails
                alertMessage(Alerts::deleteProfileTitle(),Alerts::deleteProfileAuthority(),"transport","index.php");
            }
        }else{
            //Option selector wasn't recognized
            alertMessage(Alerts::deleteProfileTitle(),Alerts::parameterError(),"reload",false);
        }
    }


?>