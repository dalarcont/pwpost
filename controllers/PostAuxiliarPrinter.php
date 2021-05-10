<?php 
    //IMPORTANT!
    //Require DB connection, in the same directory because was called from a file on first directory path
        include '../procedures/SYS_DB_CON.php';
        include '../procedures/PostLoad.php';
        include '../controllers/PrivacyManager.php';
        include '../views/Entry.php';
    //Request post data by its uid
        $result = DB_Post_DirectLoad($_POST['post']);

        if(empty($result)){
            //Entry is empty
            echo "<b>Ha ocurrido un error leyendo los datos de la entrada que acabas de editar.<br>Por favor recarga la página y visita tu perfil para verificar que la entrada aun exista en su estado previo a la edición que acabas de hacer.</b><br>";
        }else{
            //Entry is ok

            //Load attached post if exists
            if($result['attached_prop']!=0){
                //There is an attached entry
                $attachedPackage = DB_Post_DirectLoad($result['attached_uid_post']);
                //If the attached entry is private, return false
                if($attachedPackage['hiddenprop']==1){
                    $result[$i]["attached_content"]=false;
                }else{
                    //Push above elements on the array
                    $result["attached_user"] = $attachedPackage['own_user'];
                    $result["attached_title"] = $attachedPackage['title'];
                    $result["attached_content"] = $attachedPackage['content'];
                }
                
            }
            PrintEntry($result);
        }
        

            

?>