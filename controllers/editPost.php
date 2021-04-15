<?php 
session_start();
    //Load views
    require '../views/forms_post.php';
    require '../views/entry.php';
    //Load procedure
    require '../procedures/sys_db_con.php';
    require '../procedures/loadPost.php';
    //require '../procedures/updPost.php';

    /* real time entry editing */
    function removeOldEntry_addNewEntry($id){
        //Remove old entry and clean aux edit entry if exists to prevent problems
        echo "<script>$('#",$id,"').remove(); $('#auxEdit').empty();</script>";
        //Get data of new edited entry
        $newEntry_data = loadPost_direct($id);
        //Get the HTML data to print
        $newPost_HTML = printEntry_forHTML($newEntry_data);
        //Apply on HTML
        echo "<script>$('",$newPost_HTML,"').insertAfter('#auxEdit');
        $('#auxEdit').remove;</script>";
    }

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
                //We need to convert new line HTML structure to properly data settings to save on DB and to compare if the user did an edit.
                    $edit_c = nl2br($edit_c,true);
                //Make hash to compare
                    /*
                        IMPORTANT!
                        With a just whitespace or newline added in new content in EditDialog it will be taken as an edited entry...
                    */
                    $Entry_Original_Title_Hash = hash("md5",$sourceEntry['title']); //Original
                    $Entry_Original_Content_Hash = hash("md5",$sourceEntry['content']); //Original
                    $Entry_Edited_Title_Hash = hash("md5",$edit_t); //New
                    $Entry_Edited_Content_Hash = hash("md5",$edit_c);   //New


                if(($Entry_Original_Title_Hash == $Entry_Edited_Title_Hash) AND ($Entry_Original_Content_Hash == $Entry_Edited_Content_Hash)){
                    //There is no data to update
                    echo "<script>  $('#form_editPost').dialog('close'); alertify.success('No se realizaron modificaciones.');</script>";
                }else{
                    //Ok, update now
                    //$r = updPost($user,$postid,$title,$content);
                    $r=true;
                    if($r){
                        //The pub has been updated
                        echo "<script>$('#form_editPost').dialog('close');</script>";
                        //Create an auxiliar div to print the entry with its new data after the original entry <div>
                        //The aux was made to know the position where system will put the entry with the new data
                        echo "<script>$('<div id=auxEdit></div>').insertAfter('#",$originalId,"');</script>";
                        //Delete old entry, print new entry after the aux that we made previously, after that remove aux div.
                        removeOldEntry_addNewEntry($originalId);

                    }else{
                        //There is an error
                        echo "<script>$('#form_editPost').dialog('close'); alertify.alert('Actualización de entrada', 'Ha ocurrido un error en la base de datos.<br />No se pudo actualizar tu entrada. Intenta más tarde.', function(){ location.reload(); });</script>";
                    }
                }
                
            }else{
                echo "<script>$('#form_editPost').dialog('close'); alertify.alert('Actualización de entrada', 'Ha ocurrido un error en el sistema.<br />La sesión está rota.', function(){ location.href='index.php'; });</script>";
            }
        }else{
            echo "<script>$('#form_editPost').dialog('close'); alertify.alert('Actualización de entrada', 'Procedimiento de actualización de entrada erróneo', function(){ location.reload(); });</script>";
        }
    }


?>