<?php 
    //IMPORTANT!
    //Require DB connection, in the same directory because was called from a file on first directory path
        include '../procedures/SYS_DB_CON.php';
        include '../procedures/PostLoad.php';
        include '../controllers/PrivacyManager.php';
        require '../controllers/AttachedManagement.php';
        include '../views/Entry.php';
    //Request post data by its uid
        $result = DB_Post_DirectLoad($_POST['post']);

        if(empty($result)){
            //Entry is empty
            echo "<b>Ha ocurrido un error leyendo los datos de la entrada que acabas de editar.<br>Por favor recarga la página y visita tu perfil para verificar que la entrada aun exista en su estado previo a la edición que acabas de hacer.</b><br>";
        }else{
            //Entry is ok
            //Load attached post if exists
            $result = AttachedEntryManagement($result);
            //Print entry
            PrintEntry($result);
        }
        

            

?>