<?php 
    session_start();
    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures
        require '../procedures/PostLoad.php';
        require '../controllers/PrivacyManager.php';
    //Require views
        include '../views/Entry.php';
        if(!empty($_SESSION['UsrPkg'])){
            //Get data from DB
                $result = DB_Post_GeneralLoad($_SESSION['UsrPkg']['username']);
            //Count entries
                $size = count($result);
            //print entries, connect to views
            for($i=0; $i<=($size-1); $i++){
                //Entry privacy selector, IF ENTRY = PRIVATE but LOGGED USER IS THE OWNER, SHOW IT
                if($result[$i]['hiddenprop']!=0 && ($result[$i]['own_user']==$_SESSION['UsrPkg']['username'])){
                    //The entry have privacy but if the own user is the same logged user, system will show
                    //Add user, title, content of attached entry
                    if($result[$i]['attached_prop']!=0){
                        //There is an attached entry
                        $attachedPackage = DB_Post_DirectLoad($result[$i]['attached_uid_post']);
                        //If the attached entry is private, return false
                        if($attachedPackage['hiddenprop']==1){
                            $result[$i]["attached_content"]=false;
                        }else{
                            //Push above elements on the array
                            $result[$i]["attached_user"] = $attachedPackage['own_user'];
                            $result[$i]["attached_title"] = $attachedPackage['title'];
                            $result[$i]["attached_content"] = $attachedPackage['content'];
                        }
                        
                    }
                    PrintEntry($result[$i]);
                }elseif($result[$i]['hiddenprop']==0){
                    //Its public
                    if($result[$i]['attached_prop']!=0){
                        //There is an attached entry
                        $attachedPackage = DB_Post_DirectLoad($result[$i]['attached_uid_post']);
                        //If the attached entry is private, return false
                        if($attachedPackage['hiddenprop']==1){
                            $result[$i]["attached_content"]=false;
                        }else{
                            //Push above elements on the array
                            $result[$i]["attached_user"] = $attachedPackage['own_user'];
                            $result[$i]["attached_title"] = $attachedPackage['title'];
                            $result[$i]["attached_content"] = $attachedPackage['content'];
                        }
                        
                    }
                    PrintEntry($result[$i]);
                }else{
                    //Its private and the logged user isn't the owner of the entry
                    $result = null;
                    PrintEntry($result);
                }
                
            }
        }else{
            $result = null;
            PrintEntry($result);
        }

?>