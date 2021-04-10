<?php 

    $username = $_GET['p'];
    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/sys_db_con.php';
    //Require procedures, in the same directory because was called from a file on first directory path
        require 'procedures/loadDataProfile.php';
        require 'controllers/hiddenManagement.php';
    //Require views, in the same directory because was called from a file on first directory paths
        include 'views/profile.php';
        require 'views/entry.php';
    //Get user's profile data, in this case we need its username, full name and join date only.
        function printProfile_data($username){
            $result_main = loadProfileData($username);
            //Show profile data
            print_Profile($result_main);
        }

        function printProfile_entries($username){
            if(!empty($username)){
                //Get data from DB
                    $result = getProfile_entries($username);
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
        }
        

            

?>