<?php
session_start();
//Load views
require '../views/PostForms.php';
require '../views/Entry.php';
require '../views/Alerts.php';
//Load procedure
require '../procedures/SYS_DB_CON.php';
require '../procedures/PostLoad.php';
require '../procedures/UpdatePost.php';
require '../procedures/EntryVersionControl.php';


//Keep the process going on
/* Procedures has not been needed yet*/
if ($_POST['call'] == "let") {
    //Every entry haves a limitation:
    //  Users can edit a post 5 times only
    //  After 5 times, system will not let them edit a post
    $edition_limit = DB_ReadEditionCounter($_POST['post'])[0];
    if ($edition_limit >= 5) {
        //Entry has been updated 5 times and can't acept a new edition
        //echo "<script>alertify.alert('Actualización de entrada','Ya utilizaste las 5 veces que se permite que una entrada sea editada.<br />No se permite editar la entrada.<br />Crea una nueva o hazle repost a esta.');</script>";
        alertMessage("Actualización de entrada","Ya utilizaste las 5 veces que se permite que una entrada sea editada.<br />No se permite editar la entrada.<br />Crea una nueva o hazle repost a esta.",false,false);
    } else {
        //Get content of the post that the user wants to edit
        $uid_post = $_POST['post'];
        $sourceEntry = DB_Post_DirectLoad($uid_post);
        //Decode the <br /> to show correctly on HTML TextArea
        $decodedContent = str_replace("<br />", "&#13;", $sourceEntry['content']);
        //Show the dialog form to edit post with title and content from the original entry
        Form_Edit($sourceEntry['title'], $decodedContent, $uid_post);
    }
    
} else {
    //That means we need to publish (set) the new content
    //But let we stay safe about it
    if ($_POST['call'] == "doIt") {
        //Yes, publish, but check if session isn't broken
        if (!empty($_SESSION['UsrPkg'])) {
            //Verify if the title and content wasn't altered. 
            //If wasn't altered, just close the dialog
            $edit_t = $_POST['post']['edit_t']; //New title
            $edit_c = $_POST['post']['edit_c']; //New content
            $originalId = $_POST['post']['id']; //Original post ID 
            //Gathering original data
            $sourceEntry = DB_Post_DirectLoad($originalId);
            //We need to convert new line HTML structure to properly data settings to save on DB and to compare if the user did an edit.
            $edit_c = nl2br($edit_c, true);
            //Make hash to compare
            /*
            IMPORTANT!
            With a just whitespace or newline added in new content in EditDialog it will be taken as an edited entry...
            */
            $Entry_Original_Title_Hash = hash("md5", $sourceEntry['title']); //Original
            $Entry_Original_Content_Hash = hash("md5", $sourceEntry['content']); //Original
            $Entry_Edited_Title_Hash = hash("md5", $edit_t); //New
            $Entry_Edited_Content_Hash = hash("md5", $edit_c);   //New


            if (($Entry_Original_Title_Hash == $Entry_Edited_Title_Hash) && ($Entry_Original_Content_Hash == $Entry_Edited_Content_Hash)) {
                //There is no data to update
                echo "<script> $('#form_editPost').dialog('close');</script>";
                notification(true,"No se realizaron modificaciones.");
            } else {
                //Before the edit post procedure, set actual counter of editions
                $edition_limit_2 = DB_ReadEditionCounter($originalId)[0] + 1;
                //Ok, update now. Plase indicate the original id to the following function
                $r = DB_SetUpdatePost($_SESSION['UsrPkg']['username'], $originalId, $edit_t, $edit_c, $sourceEntry['pubdate']);
                //Add version control record
                $vc = DB_AddPost_VersionControl($_SESSION['UsrPkg']['username'],$edit_t, $edit_c,$edition_limit_2, $originalId,NULL);
                if ($r && $vc) {
                    //The pub has been updated
                    //Close dialog
                    //Make an auxiliar 'div' at the top of TimeLine (#FrontEnd div) where inside of it, call JS_FX to print an entry (the entry will be the edited entry with the new content);
                    //Delete the edited entry. Why? Because the entry has new date of update/creation and its taken as new/recent and will be showed on the top of TimeLine
                    echo "<script>$('#form_editPost').dialog('close'); $('#FrontEnd').prepend('<div id=auxEdited_post></div>'); $('#", $originalId, "').remove();</script>";
                    //Apply changes on the entry without reload, thats simple we need to show new title and new content
                    // IMPORTANT: The data will be taken from DB not from the dialog
                    //Print the entry
                    echo "<script>PostPrinter('", $originalId, "')</script>";
                    //Notification
                    notification(true,"Entrada actualizada. La encuentras al principio.");
                    //Clean the div that helps to system do operations
                    echo "<script>$('#main').empty();</script>";
                    //Delete aux div
                    echo "<script>$('#auxEdited_post').remove();</script>";
                } else {
                    //There is an error
                    echo "<script>$('#form_editPost').dialog('close');</script>";
                    alertMessage("Actualización de entrada","Ha ocurrido un error en la base de datos.<br />No se pudo actualizar tu entrada. Intenta más tarde.","reload",false);
                }
            }
        } else {
            //Session is broken
            echo "<script>$('#form_editPost').dialog('close');</script>";
            alertMessage("Actualización de entrada","Ha ocurrido un error en el sistema.<br />La sesión está rota.","transport","index.php");
        }
    } else {
        //Procedure parameter wasn't recognized
        echo "<script>$('#form_editPost').dialog('close');</script>";
        alertMessage("Actualización de entrada","Procedimiento de actualización de entrada erróneo.","reload",false);
    }
}
