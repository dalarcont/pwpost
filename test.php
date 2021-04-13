<?php 
session_start();
    //Load views
    
    require 'views/forms_post.php';
    //Load procedure
    require 'procedures/sys_db_con.php';
    require 'procedures/loadPost.php';

    /* Procedures has not been needed yet*/
    if($_POST['call']=="let"){
        //Get content of the post that the user wants to edit
        $uuid_post = $_POST['post'];
        $sourceEntry = loadPost_direct($uuid_post);
        //Decode the <br /> to show correctly on HTML TextArea
        $decodedContent = str_replace("<br />","&#13;",$sourceEntry['content']);
        //Show the dialog form to edit post with title and content from the original entry
        form_editPost($sourceEntry['title'],$decodedContent,$uuid_post);
    }else{
        //That means we need to publish (set) the new content
        //But let we stay safe about it
        if($_POST['call']=="doIt"){
            //Yes, publish, but check if session isn't broken
            if(!empty($_SESSION['UsrPkg'])){

                //Verify if the title and content wasn't altered. 
                //If wasn't altered, just close the dialog
                $edit_t = $_POST['post']['edit_t']; //New title
                $edit_c = $_POST['post']['edit_c']; //New content
                $originalId = $_POST['post']['id']; //Original post ID 
                //Gathering original data
                    $sourceEntry = loadPost_direct($originalId);
                //Transform from dialog the '&#13' to '<br />' because in dialog factory we convert '<br />' to '&#13', and it is required to check if there is a change
                    //$edit_c = str_replace("&#13","<br />",$edit_c);
                //Make hash
                    $Entry_Original_Title_Hash = hash("md5",$sourceEntry['title']);
                    $Entry_Original_Content_Hash = hash("md5",$sourceEntry['content']);

                    $Entry_Edited_Title_Hash = hash("md5",$edit_t);
                    $Entry_Edited_Content_Hash = hash("md5",$edit_c);

                    $myfile = fopen("upok.txt","w");
                    fwrite($myfile,$Entry_Original_Title_Hash."\n");
                    fwrite($myfile,$Entry_Original_Content_Hash."\n");
                    fwrite($myfile,$Entry_Edited_Title_Hash."\n");
                    fwrite($myfile,$Entry_Edited_Content_Hash."\n");


                if(($Entry_Original_Content_Hash == $Entry_Edited_Content_Hash)){
                    //There is no data to update
                    echo "<script>alert('IGUAL');</script>";
                }else{
                    echo "<script>alert('ACTUALIZAR');</script>";
                }
                //Ok, publish now
                /*
                $pkg = $_POST['data'];
                $user = $_SESSION['UsrPkg']['username'];
                $title = $pkg['title'];
                $content = $pkg['content'];
                /*$r = newPost($user,$title,$content);
                if($r){
                    //The pub has been publishied
                    echo "<script>$('#form_newPost').dialog('close'); location.reload();</script>";
                }else{
                    //There is an error
                    echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Ha ocurrido un error en la base de datos.<br />No se pudo publicar tu entrada. Intenta más tarde.', function(){ location.reload(); });</script>";
                }*/
            }else{
                echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Ha ocurrido un error en el sistema.<br />La sesión está rota.', function(){ location.href='index.php'; });</script>";
            }
        }else{
            echo "<script>$('#form_newPost').dialog('close'); alertify.alert('Nueva entrada', 'Procedimiento de publicación de entrada erróneo', function(){ location.reload(); });</script>";
        }
    }


?>