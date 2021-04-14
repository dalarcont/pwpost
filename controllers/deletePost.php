<?php 
session_start();
    //Load views
    require '../views/confirmations.php';
    //Load procedure
    require '../procedures/sys_db_con.php';
    require '../procedures/validators.php';
    require '../procedures/deletePost.php';

    /* Procedures has not been needed yet*/
    if($_POST['call']=="let"){
        //Get UID of post that the user wants to delete
        $uuid_post = $_POST['post'];
        //Ask for confirmation
        confirm_rm_post($uuid_post);
    }else{
        //That means we need to publish (set) the new content
        //But let we stay safe about it
        if($_POST['call']=="doIt"){
            //Yes, delete it, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //echo $_SESSION['UsrPkg']['username'];
                //To delete we need to verify the authority between the entry and it's true owner
                $auth = validateAuthority_post($_POST['post'],$_SESSION['UsrPkg']['username']);
                //By the auth value, take the properly way
                if($auth=="true"){
                    //The entry is property of the same logged user, that means the owner user is who wants to delete it
                    //Ok, delete now
                    $r = remPost($_POST['post'],$_SESSION['UsrPkg']['username']);
                    if($r){
                        //The pub has been updated
                        echo "<script>$('#",$_POST['post'],"').remove(); alertify.success('Entrada eliminada'); alertify.alert('Eliminación de entrada','Entrada eliminada<br />Aquellos usuarios que hayan realizado repost de esta entrada les saldrá un aviso de que la misma ya no está disponible.');</script>";
                    }else{
                        //There is an error
                        echo "<script>alertify.alert('Eliminación de entrada', 'Ha ocurrido un error en la base de datos.<br />No se pudo eliminar tu entrada. Intenta más tarde.', function(){ location.reload(); });</script>";
                    }

                }else{
                    //The logged user isn't the owner of the entry
                    echo "<script>alertify.alert('Eliminación de entrada', 'No se puede eliminar la entrada<br />Tú no eres el propietario de la entrada.');</script>";
                }
                    
                
            }else{
                //Session is broken
                echo "<script>alertify.alert('Eliminación de entrada', 'Ha ocurrido un error en el sistema.<br />La sesión está rota.', function(){ location.href='index.php'; });</script>";
            }
        }else{
            //Parameter isn't recognized
            echo "<script>alertify.alert('Eliminación de entrada', 'Procedimiento de eliminación de entrada erróneo', function(){ location.reload(); });</script>";
        }
    }


?>