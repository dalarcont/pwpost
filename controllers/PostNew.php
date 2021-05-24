<?php 
session_start();
    //Load views
    require '../views/PostForms.php';
    require '../views/Alerts.php';
    //Load procedure
    require '../procedures/NewPost.php';
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/EntryVersionControl.php';

    /* Procedures has not been needed yet*/
    if($_POST['call']=="let"){
        Form_New();
        echo '<script>
        var userMention = $("#isOnProfile").val();
            //Verify if this procedure was called from normal page or was called from a profile page
            //If was called from a profile page, we suppose that the user needs to do an entry with a mention about the visited user
            if(userMention.length!=0 && userMention != "null"){
                $("#newEntry_content").html("@"+userMention+": ");
            }</script>
        ';
    }else{
        //That means we need to publish
        //But let we stay safe about it
        if($_POST['call']=="doIt"){
            //Yes, publish, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){
                //Ok, publish now
                $pkg = $_POST['data'];
                $user = $_SESSION['UsrPkg']['username'];
                $title = $pkg['title'];
                $content = $pkg['content'];
                $postuid = MakePostUID(12);
                $r = DB_SetNewPost($user,$title,$content,$postuid,NULL);
                //The next procedure will be checked in an IF sentence to validate if post was registered in general DB and its version control in the respective DB
                $vc = DB_AddPost_VersionControl($user,$title,$content,0,$postuid,NULL);
                if($r && $vc){
                    //The pub has been publishied
                    //Close dialog
                    //Make an auxiliar 'div' at the top of TimeLine (#FrontEnd div) where inside of it, call JS_FX to print an entry
                    echo "<script>$('#form_newPost').dialog('close'); $('#FrontEnd').prepend('<div id=auxEdited_post></div>'); </script>";
                    // IMPORTANT: The data will be taken from DB not from the dialog
                    //Print the entry
                    echo "<script>PostPrinter('", $postuid, "')</script>";
                    //Clean the div that helps to system do operations
                    echo "<script>$('#main').empty();</script>";
                    //Delete aux div
                    echo "<script>$('#auxEdited_post').remove();</script>";
                }else{
                    //There is an error
                    echo "<script>$('#form_newPost').dialog('close');</script>";
                    alertMessage("Nueva entrada","Ha ocurrido un error en la base de datos.<br />No se pudo publicar tu entrada. Intenta más tarde.","reload",false);
                }
            }else{
                echo "<script>$('#form_newPost').dialog('close');</script>";
                alertMessage("Nueva entrada","Ha ocurrido un error en el sistema.<br />La sesión está rota.","transport","index.php");
            }
        }else{
            echo "<script>$('#form_newPost').dialog('close');</script>";
            alertMessage("Nueva entrada","Procedimiento de publicación de entrada erróneo.","reload",false);
        }
    }


?>