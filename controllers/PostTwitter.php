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

//Keep the process going on
/* Procedures has not been needed yet*/
if ($_POST['call'] == "let") {
    //Twitter reposting TwEntry
    Form_TwNew($_POST['post'],$_POST['twobj']);
} else {
    //That means we need to publish the repost
    //But let we stay safe about it
    if ($_POST['call'] == "doIt") {
        //Yes, publish, but check if session isn't broken
        if (!empty($_SESSION['UsrPkg'])) {
            //Session isn't broken, then get data
                $tw_post_title = $_POST['data']['title'];
                $tw_post_content = $_POST['data']['content'];
                $tw_post_attached = $_POST['data']['attachedid'];
                $tw_post_user = $_SESSION['UsrPkg']['username'];
                $tw_post_original_username = $_POST['data']['usernametw'];
                //Generate PostUID because we treat a repost like a new post but with the difference that the content is.. other post!
                $pid = MakePostUID(12);
                $TwPost = DB_setTwitterPost($tw_post_user,$tw_post_title,$tw_post_content,$pid,$tw_post_attached,$tw_post_original_username);
                $vc = DB_TwPost_VersionControl($tw_post_user,$tw_post_title,$tw_post_content,0,$pid,$tw_post_attached);
                
                if ($TwPost && $vc) {
                    //The pub has been published
                    //Because this file was called from a Twitter page 
                    alertMessage("Twitter",Twitter::successPost(),false,false);
                    echo "<script>$('#form_TwNewPost').dialog('close');</script>";
                    //Close dialog
                } else {
                    //There is an error
                    echo "<script>$('#form_TwNewPost').dialog('close');</script>";
                    alertMessage("PwPost",Alerts::errorNewEntry(),"reload",false);
                }
        } else {
            //Session is broken
            echo "<script>$('#form_TwNewPost').dialog('close');</script>";
            alertMessage("PwPost",Alerts::sessionBroke_message(),"transport","index.php");
        }
    } else {
        //Procedure parameter wasn't recognized
        echo "<script>$('#form_TwNewPost').dialog('close');</script>";
        alertMessage("PwPost",Alerts::parameterError(),"reload",false);
    }
}
