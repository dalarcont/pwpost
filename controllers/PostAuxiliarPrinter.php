<?php 
    //IMPORTANT!
    //Require DB connection, in the same directory because was called from a file on first directory path
        require '../procedures/SYS_DB_CON.php';
        require '../procedures/PostLoad.php';
        require '../controllers/PrivacyManager.php';
        require '../controllers/LikeManagement.php';
        require '../controllers/AttachedManagement.php';
        require '../views/Entry.php';
        require '../views/Alerts.php';
    //Request post data by its uid
        $result = DB_Post_DirectLoad($_POST['post']);

        if(empty($result)){
            //Entry is empty
            alertMessage("Error del sistema","<b>Ha ocurrido un error leyendo los datos de la entrada que acabas de editar.<br>Por favor recarga la página y visita tu perfil para verificar que la entrada aun exista en su estado previo a la edición que acabas de hacer.</b>",false,false);
        }else{
            //Entry is ok
            //Load attached post if exists
            $result = AttachedEntryManagement($result);
            //Print entry
            PrintEntry($result);
        }
        

            

?>