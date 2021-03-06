<?php
session_start();
//Load views
require '../views/PostForms.php';
require '../views/Entry.php';
require '../views/Alerts.php';
require '../views/Language.php';
//Load procedure
require '../procedures/SYS_DB_CON.php';
require '../procedures/PostLoad.php';
require '../procedures/EntryVersionControl.php';
require '../procedures/NewPost.php'; //<-- There is the method we need to publish an entry with attached post

//Load Id
$RepostSourceId = $_POST['post'];

//Keep the process going on
/* Procedures has not been needed yet*/
if ($_POST['call'] == "let") {
    //Repost procedure was called
    //Load data of the entry that the user wants to repost
    $RepostSource = DB_Post_DirectLoad($RepostSourceId);
    if(!empty($RepostSource)){
        //Post source is available
        Form_RePost($RepostSourceId,$RepostSource['title'],$RepostSource['content']);
    }else{
        //Post source is unavailable
        alertMessage("PwPost",Alerts::noAvailablePostRepost(),false,false);

    }
} else {
    //That means we need to publish the repost
    //But let we stay safe about it
    if ($_POST['call'] == "doIt") {
        //Yes, publish, but check if session isn't broken
        if (!empty($_SESSION['UsrPkg'])) {
            //Session isn't broken, then get data
                $rp_title = $_POST['data']['title'];
                $rp_content = $_POST['data']['content'];
                $rp_attached = $_POST['data']['attachedid'];
                $rp_user = $_SESSION['UsrPkg']['username'];
                //Generate PostUID because we treat a repost like a new post but with the difference that the content is.. other post!
                $pid = MakePostUID(12);
                $rp = DB_SetNewPost($rp_user,$rp_title,$rp_content,$pid,$rp_attached);
                $vc = DB_AddPost_VersionControl($rp_user,$rp_title,$rp_content,0,$pid,$rp_attached) ;
                
                if ($rp && $vc) {
                    //The pub has been published
                    //Close dialog
                    echo "<script>$('#form_rePost').dialog('close'); $('#FrontEnd').prepend('<div id=auxEdited_post></div>');</script>";
                    //Print the entry
                    echo "<script>PostPrinter('",$pid,"')</script>";
                    //Clean the div that helps to system do operations
                    echo "<script>$('#main').empty();</script>";
                    //Delete aux div
                    echo "<script>$('#auxEdited_post').remove();</script>";
                } else {
                    //There is an error
                    echo "<script>$('#form_editPost').dialog('close');</script>";
                    alertMessage("PwPost",Alerts::errorNewEntry(),"reload",false);
                }
        } else {
            //Session is broken
            echo "<script>$('#form_editPost').dialog('close');</script>";
            alertMessage("PwPost",Alerts::sessionBroke_message(),"transport","index.php");
        }
    } else {
        //Procedure parameter wasn't recognized
        echo "<script>$('#form_editPost').dialog('close');</script>";
        alertMessage("PwPost",Alerts::parameterError(),"reload",false);
    }
}
