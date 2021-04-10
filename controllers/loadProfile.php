<?php 
    session_start();
    $username = $_SESSION['username'];

    //Require DB connection
        require '../procedures/sys_db_con.php';
    //Require procedures
        require '../procedures/loadPost.php';
        require '../procedures/loadProfile.php';
        require '../controllers/hiddenManagement.php';
    //Require views
        include '../views/entry.php';
        include '../views/profile.php';

    //Get user's profile data, is always loaded by default doesn't matter if the user have or have not entries of his own authority
        $result_main = loadProfileData($username);
    //Show profile data
        printProfile($result_main);

        if(!empty($_SESSION['username'])){
            //Get data from DB
                $result = loadPost_loggedUser($username);
            //Count entries
                $size = count($result);
            //print entries, connect to views
            for($i=0; $i<=($size-1); $i++){
                printEntrie($result[$i]);
            }
        }else{
            //Have not user some entries ? Ok, lets invite him to make one.
            printProfile_entrieEmpty();
        }

?>