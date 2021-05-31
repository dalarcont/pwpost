<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/DeletePost.php';
    require '../procedures/PrivacyOperator.php';

    /* Procedures has not been needed yet*/


    switch($_POST['call']){

        case "like":
            //User confirms to hide an entry
            //Yes, like it, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //To like we need to verify the authority between the entry and it's true owner
                $auth = ValidateAuthorityPost($_POST['post'],$_SESSION['UsrPkg']['username']);
                //By the auth value, take the properly way
                if($auth=="true"){
                    //The entry is property of the same logged user, that means the owner user is who wants to like it
                    //Ok, like now
                    //$r = hiddenProperty("hide",$_POST['post'],$_SESSION['UsrPkg']['username']);
                    if($r){
                        //The pub has been hiden
                        echo "<script> 
                        $('#",$_POST['post']," #btn_hide img').attr('src','components/unhide.png'); 
                        $('#",$_POST['post']," #btn_hide').attr('onclick','startUnhidePost(this)');</script>";
                        alertMessage("Ocultar entrada","Entrada oculta<br />Aquellos usuarios que hayan realizado repost de esta entrada les saldrá un aviso de que la misma ya no está disponible.","truenotification","Entrada privatizada");
                    }else{
                        //There is an error
                        alertMessage("Ocultar entrada","Ha ocurrido un error en la base de datos.<br />No se pudo ocultar tu entrada. Intenta más tarde.","reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage("Ocultar entrada","No se puede ocultar la entrada<br />Tú no eres el propietario de la entrada.",false,false);
                }
                    
                
            }else{
                //Session is broken
                alertMessage("Ocultar entrada","Ha ocurrido un error en el sistema.<br />La sesión está rota.","transport","index.php");
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
                        alertMessage("Mostrar entrada","Entrada pública<br />Aquellos usuarios que hayan realizado repost de esta entrada les aparecerá el contenido.","truenotification","Entrada pública");
                    }else{
                        //There is an error
                        alertMessage("Mostrar entrada","Ha ocurrido un error en la base de datos.<br />No se pudo mostrar tu entrada. Intenta más tarde.","reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage("Mostrar entrada","No se puede mostrar la entrada<br />Tú no eres el propietario de la entrada.",false,false);
                }
                    
                
            }else{
                //Session is broken
                alertMessage("Mostrar entrada","Ha ocurrido un error en el sistema.<br />La sesión está rota.","transport","index.php");
            }
        break;

        default:
            //Parameter was not recognized
            alertMessage("Ocultar/Mostrar entrada","Procedimiento de ocultar/mostrar entrada erróneo","reload",false);
        break;
    }


?>