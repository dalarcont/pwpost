<?php 
    session_start();
    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures
        require '../procedures/PostLoad.php';
        require '../controllers/PrivacyManager.php';
        require '../controllers/AttachedManagement.php';
    //Require views
        include '../views/Entry.php';
        include '../views/Alerts.php';

        if(!empty($_SESSION['UsrPkg'])){
            //Get data from DB
                $result = DB_Post_GeneralLoad($_SESSION['UsrPkg']['username']);
            //Count entries
                $size = count($result);
            //print entries, connect to views
            if($size==0){
                //There isn't entries, that means the user doesn't publish any entry yet and doesn't follow someone
                PrintProfile_Empty();
            }else{

                //print_r($result);
                
                for($i=0; $i<=($size-1); $i++){
                    //Entry privacy selector, IF ENTRY = PRIVATE but LOGGED USER IS THE OWNER, SHOW IT
                    if($result[$i]['hiddenprop']!=0 && ($result[$i]['own_user']==$_SESSION['UsrPkg']['username'])){
                        //The entry have privacy but if the own user is the same logged user, system will show
                        //Add user, title, content of attached entry
                        $result[$i] = AttachedEntryManagement($result[$i]);
                        //Print
                        PrintEntry($result[$i]);
                    }elseif($result[$i]['hiddenprop']==0){
                        //Its public
                        //Load attached entry
                        $result[$i] = AttachedEntryManagement($result[$i]);
                        //Print
                        PrintEntry($result[$i]);
                    }else{
                        //Its private and the logged user isn't the owner of the entry
                        $result = null;
                        PrintEntry($result);
                    }
                }
            }
           
        }else{
            //Session is empty
           alertMessage("PWPost!","Error del sistema S404<br/>Sesión no encontrada.","transport","index.php");
        }

?>
