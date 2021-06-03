<?php 
session_start();
    //Load views
    require '../views/Confirmations.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Validators.php';
    require '../procedures/PostLike.php';
    require '../views/Language.php';

    $Selector = $_POST['call'];
    $Object = $_POST['post'];


    function aux_ExecuteLike($Object,$whoLikes){
        $like = DB_setLikePost($Object,$whoLikes);
        if($like){
            echo "<script> 
            $('#",$Object," #btn_like img').attr('src','components/unsetlike.png'); 
            $('#",$Object," #btn_like').attr('onclick','unsetLikePost(this)');</script>";
        }else{
            alertMessage("Marcar post","No puedes marcar que te gusta este post.<br />Error del sistema.",false,false);
        }
    }

    function aux_ExecuteDislike($Object,$whoLikes){
        $unlike = DB_unsetLikePost($Object,$whoLikes);
        if($unlike){
            echo "<script> 
            $('#",$Object," #btn_like img').attr('src','components/setlike.png'); 
            $('#",$Object," #btn_like').attr('onclick','setLikePost(this)');</script>";
        }else{
            alertMessage("PwPost",Alerts::errorUnsetLike(),false,false);
        }
    }

    //First of all, verify post existence and if its public
    $PostAvailable = validatePostExists($Object);
    if(!empty($PostAvailable)){
        //Post available and its public, then take the way according to the selector
        if($Selector=="like"){
            //User wants to say that it likes a post
                //Check hidden property first
                if($PostAvailable['hiddenprop'!=0]){
                    //Its private, let mark as liked post ONLY if the logged user its the same owner of the object post
                    if($PostAvailable['own_user']==$_SESSION['UsrPkg']['username']){
                        //Who wants to mark as like post its the same user as the owner of the post
                        aux_ExecuteLike($Object,$_SESSION['UsrPkg']['username']);
                    }else{
                        //Its private and isn't liked by the own user
                        alertMessage("PwPost",Alerts::noAvailablePostLike(),false,false);
                    }
                }else{
                    //Isn't private, then can be liked by any user
                    aux_ExecuteLike($Object,$_SESSION['UsrPkg']['username']);
                }
                //Set like on DB
                
        }else if($Selector=="unlike"){
            //User wants to remove a like in a post
                //Here we don't need to check if the post its private or not, because if the user can CLICKS 'Unlike' its because the post hasn't privacy enable
                //Unset like
                aux_ExecuteDislike($Object,$_SESSION['UsrPkg']['username']);
        }else{
            //No order was received
            alertMessage("PwPost",Alerts::parameterError(),false,false);
        }
    }else{
        //Post isn't available
        alertMessage("PwPost",Alerts::noAvailablePostLike(),false,false);
    }

    


?>