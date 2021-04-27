<?php 
session_start();
    //Load views
    require '../views/forms_post.php';
    //Load procedure
    require '../procedures/newPost.php';
    require '../procedures/sys_db_con.php';
    require '../procedures/EntryVersionControl.php';

    /* Procedures has not been needed yet*/
    if($_POST['call']=="let"){
        form_newPost();
        echo '<script>
        var userMention = $("#isOnProfile").val();
            //Verify if this procedure was called from normal page or was called from a profile page
            //If was called from a profile page, we suppose that the user needs to do an entry with a mention about the visited user
            if(userMention.length!=0 && userMention != "null"){
                $("#newEntrie_content").val("@"+userMention+": ");
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
                $postUUID = postUUID(12);
                $r = newPost($user,$title,$content,$postUUID);
                //The next procedure will be checked in an IF sentence to validate if post was registered in general DB and its version control in the respective DB
                $vc = Post_VersionControl($user,$title,$content,0,$postUUID);
                if($r && $vc){
                    //The pub has been publishied
                    echo "<script>$('#form_newPost').dialog('close'); location.reload();</script>";
                }else{
                    //There is an error
                    echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Ha ocurrido un error en la base de datos.<br />No se pudo publicar tu entrada. Intenta más tarde.', function(){ location.reload(); });</script>";
                }
            }else{
                echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Ha ocurrido un error en el sistema.<br />La sesión está rota.', function(){ location.href='index.php'; });</script>";
            }
        }else{
            echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Procedimiento de publicación de entrada erróneo', function(){ location.reload(); });</script>";
        }
    }


?>