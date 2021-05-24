<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/DeletePost.php';

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
                        //The pub has been updated
                        echo "<script>$('#",$_POST['post'],"').remove();</script>";
                        alertMessage("Eliminación de entrada","Entrada eliminada<br />Aquellos usuarios que hayan realizado repost de esta entrada les saldrá un aviso de que la misma ya no está disponible.","truenotification","Entrada eliminada");
                    }else{
                        //There is an error
                        alertMessage("Eliminación de entrada","Ha ocurrido un error en la base de datos.<br />No se pudo eliminar tu entrada. Intenta más tarde.","reload",false);
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    alertMessage("Eliminación de entrada","No se puede eliminar la entrada<br />Tú no eres el propietario de la entrada.",false,false);
                }
                
            }else{
                //Session is broken
                alertMessage("Eliminación de entrada","","transport","index.php");
            }
        }else{
            //Parameter isn't recognized
            alertMessage("Eliminación de entrada","Procedimiento de eliminación de entrada erróneo","reload",false);
        }
    }


?>