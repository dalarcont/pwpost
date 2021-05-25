<?php 
    session_start();
    //Controller to delete a profile


    //Call views
    require '../views/Alerts.php';
    require '../views/confirmations.php';

    //Call procedure
    require '../procedures/sys_db_con.php';
    require '../procedures/validators.php' ;

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
            alertMessage("Eliminar perfil","Ocurrió un error en los datos de sesión.<br />No podemos procesar tu petición ahora",false,false);
        }
    }else{
        if($selector=="doIt"){
            //Delete profile
            //Validate authority
            $authDelete = ValidateAuthorityProfile($object,$key);
            if($authDelete){
                //Authority is OK
                notification(true,"PERFIL ELIMINADO");
            }else{
                //Authority fails
                alertMessage("Eliminar perfil","Los datos para verificación de autoridad sobre el perfil no son correctos.<br />Se puede tratar de una suplantación de identidad en este preciso momento.","transport","index.php");
            }
        }else{
            //Option selector wasn't recognized
            alertMessage("Eliminar perfil","Ocurrió un error inesperado.<br />No podemos procesar tu petición ahora.","reload",false);
        }
    }


?>