<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/PostLike.php';

    $Selector = $_POST['call'];
    $Object = $_POST['post'];

    //First of all, verify post existence and if its public
    $PostAvailable = validatePostPublicExists($Object);
    if($PostAvailable){
        //Post available and its public, then take the way according to the selector
        if($Selector=="like"){
            //User wants to say that it likes a post
                //Set like on DB
                $like = DB_setLikePost($Object,$_SESSION['UsrPkg']['username']);
                if($like){
                    echo "<script> 
                    $('#",$Object," #btn_like img').attr('src','components/unsetlike.png'); 
                    $('#",$Object," #btn_like').attr('onclick','unsetLikePost(this)');</script>";
                }else{
                    alertMessage("Marcar post","No puedes marcar que te gusta este post.<br />Error del sistema.",false,false);
                }
        }else if($Selector=="unlike"){
            //User wants to remove a like in a post
                //Unset like on DB
                $unlike = DB_unsetLikePost($Object,$_SESSION['UsrPkg']['username']);
                if($unlike){
                    echo "<script> 
                    $('#",$Object," #btn_like img').attr('src','components/setlike.png'); 
                    $('#",$Object," #btn_like').attr('onclick','setLikePost(this)');</script>";
                }else{
                    alertMessage("Marcar post","No puedes marcar que ya no te gusta este post.<br />Error del sistema",false,false);
                }
        }else{
            //No order was received
            alertMessage("PwPost","Ocurrió un error en la acción solicitada.<br />Intenta luego.",false,false);
        }
    }else{
        //Post isn't available or is private.
        alertMessage("Me gusta un post","El post que intentas marcar como que te gusta ha sido privatizado o ya no está disponible.",false,false);
    }

    


?>