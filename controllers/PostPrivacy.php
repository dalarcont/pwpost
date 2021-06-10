<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    require '../views/Language.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/PrivacyOperator.php';

    /* Procedures has not been needed yet*/


    switch($_POST['call']){
        case "letH":
            //User wants to hide an entry
                //Get UID of post that the user wants to hide
                $uid_post = $_POST['post'];
                //Ask for confirmation
                HideConfirmationMessage($uid_post);
        break;

        case "doItH":
            //User confirms to hide an entry
            //Yes, hide it, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //To hide we need to verify the authority between the entry and it's true owner
                $auth = ValidateAuthorityPost($_POST['post'],$_SESSION['UsrPkg']['username']);
                //By the auth value, take the properly way
                if($auth=="true"){
                    //The entry is property of the same logged user, that means the owner user is who wants to hide it
                    //Ok, hide now
                    $r = hiddenProperty("hide",$_POST['post'],$_SESSION['UsrPkg']['username']);
                    if($r){
                        //The pub has been hiden
                        echo "<script> 
                        $('#",$_POST['post']," #btn_hide img').attr('src','components/unhide.png'); 
                        $('#",$_POST['post']," #btn_hide').attr('onclick','startUnhidePost(this)');</script>";
                        alertMessage(Alerts::privacyTitle(),Alerts::successPrivacySet(),"truenotification",Alerts::privacyNotificationSet());
                    }else{
                        //There is an error
                        alertMessage(Alerts::privacyTitle(),Alerts::errorPrivacy(),"reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage(Alerts::privacyTitle(),Alerts::errorPrivacyAuthority(),false,false);
                }
                    
                
            }else{
                //Session is broken
                alertMessage(Alerts::privacyTitle(),Alerts::sessionBroke_message(),"transport","index.php");
            }
        break;

        case "letU":
            //User wants to unhide an entry
                //Get UID of post that the user wants to unhide
                $uid_post = $_POST['post'];
                //Ask for confirmation
                UnhideConfirmationMessage($uid_post);
        break;

        case "doItU":
            //User confirms to unhide an entry
            //Yes, unhide it, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //To unhide we need to verify the authority between the entry and it's true owner
                $auth = ValidateAuthorityPost($_POST['post'],$_SESSION['UsrPkg']['username']);
                //By the auth value, take the properly way
                if($auth=="true"){
                    //The entry is property of the same logged user, that means the owner user is who wants to unhide it
                    //Ok, unhide now
                    $r = hiddenProperty("unhide",$_POST['post'],$_SESSION['UsrPkg']['username']);
                    if($r){
                        //The pub has been unhide, let change button and event
                        echo "<script>
                        $('#",$_POST['post']," #btn_hide img').attr('src','components/hide.png'); 
                        $('#",$_POST['post']," #btn_hide').attr('onclick','startHidePost(this)');</script>";
                        alertMessage(Alerts::privacyTitle(),Alerts::successPrivacyUnset(),"truenotification",Alerts::privacyNotificationUnset());
                    }else{
                        //There is an error
                        alertMessage(Alerts::privacyTitle(),Alerts::errorPrivacy(),"reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage(Alerts::privacyTitle(),Alerts::errorPrivacyAuthority(),false,false);
                }
                    
                
            }else{
                //Session is broken
                alertMessage(Alerts::privacyTitle(),Alerts::sessionBroke_message(),"transport","index.php");
            }
        break;

        default:
            //Parameter was not recognized
            alertMessage(Alerts::privacyTitle(),Alerts::parameterError(),"reload",false);
        break;
    }


?>