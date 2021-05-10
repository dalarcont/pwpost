<?php 

    $username = $_GET['p'];
    //Require DB connection, in the same directory because was called from a file on first directory path
        require 'procedures/SYS_DB_CON.php';
    //Require procedures, in the same directory because was called from a file on first directory path
        require 'procedures/ProfileData.php';
        require 'controllers/PrivacyManager.php';
    //Require views, in the same directory because was called from a file on first directory paths
        include 'views/Public_ViewProfile.php';
        require 'views/Entry.php';
    //Get user's profile data, in this case we need its username, full name and join date only.
        function printProfile_data($username){
            $result_main = DB_LoadProfile_Data($username);
            //Show profile data
            print_Profile($result_main);
        }

        function printProfile_entries($username){
            if(!empty($username)){
                //Get data from DB
                    $result = DB_LoadProfile_Entries($username);
                //Count entries
                    $size = count($result);
                //print entries, connect to views
                for($i=0; $i<=($size-1); $i++){
                    PrintEntry($result[$i]);
                }
            }else{
                //Have not user some entries ? Ok, lets invite him to make one.
                Print_PublicProfileEmpty();
            }
        }
        

            

?>