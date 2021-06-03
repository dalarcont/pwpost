<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/DeletePost.php';
    require '../views/Language.php';

    /* Procedures has not been needed yet*/
    if($_POST['call']=="let"){
        //Get UID of post that the user wants to delete
        $uid_post = $_POST['post'];
        //Ask for confirmation
        RemoveConfirmationMessage($uid_post);
    }else{
        //That means we need to publish (set) the new content
        //But let we stay safe about it
        if($_POST['call']=="doIt"){
            //Yes, delete it, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //echo $_SESSION['UsrPkg']['username'];
                //To delete we need to verify the authority between the entry and it's true owner
                $auth = ValidateAuthorityPost($_POST['post'],$_SESSION['UsrPkg']['username']);
                //By the auth value, take the properly way
                if($auth=="true"){
                    //The entry is property of the same logged user, that means the owner user is who wants to delete it
                    //Ok, delete now
                    $r = DB_RemovePost($_POST['post'],$_SESSION['UsrPkg']['username']);
                    if($r){
                        //The pub has been deleted
                        echo "<script>$('#",$_POST['post'],"').remove();</script>";
                        alertMessage(Alerts::postDeleteTitle(),Alerts::successDelete(),false,false);
                    }else{
                        //There is an error
                        alertMessage(Alerts::postDeleteTitle(),Alerts::errorDelete(),"reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage(Alerts::postDeleteTitle(),Alerts::errorDeleteAuthority(),false,false);
                }
                
            }else{
                //Session is broken
                alertMessage(Alerts::postDeleteTitle(),Alerts::sessionBroke_message(),"transport","index.php");
            }
        }else{
            //Parameter isn't recognized
            alertMessage(Alerts::postDeleteTitle(),Alerts::parameterError(),"reload",false);
        }
    }


?>