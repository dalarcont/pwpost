<?php 
    session_start();
    //Require DB connection
        require '../procedures/sys_db_con.php';
    //Require procedures
        require '../procedures/loadPost.php';
        require '../controllers/hiddenManagement.php';
    //Require views
        include '../views/entrie.php';
        if(!empty($_SESSION['UsrPkg'])){
            //Get data from DB
                $result = loadPost($_SESSION['UsrPkg']['username']);
            //Count entries
                $size = count($result);
            //print entries, connect to views
            for($i=0; $i<=($size-1); $i++){
                printEntrie($result[$i]);
            }
        }else{
            $result = null;
            printEntrie($result);
        }

?>