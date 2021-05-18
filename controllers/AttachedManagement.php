<?php 
    //IMPORTANT: This file can only used by post processors with DB_CON and PostLoad procedures... 

    //Attached entry manager
    function AttachedEntryManagement($package){
        //$package_size = count($package);
        if($package['attached_prop']!=0){
            //There is an attached entry
            $attachedPackage = DB_Post_DirectLoad($package['attached_uid_post']);
            if($attachedPackage['hiddenprop']==1){
                //Attached entry is private, don't show
                $package['attached_content']=false;
            }else{
                //Attached entry is public, load and save
                $package["attached_user"] = $attachedPackage['own_user'];
                $package["attached_title"] = $attachedPackage['title'];
                $package["attached_content"] = $attachedPackage['content'];
            }
        }
        //Finished, return package with entry attached processed.
        return $package;
    }


?>