<?php 
    //IMPORTANT!
    //Function reserved only for EditPost procedures
    //Require DB connection, in the same directory because was called from a file on first directory path
        include '../procedures/sys_db_con.php';
        include '../procedures/loadPost.php';
        include '../controllers/HidenShowEntryMgmt.php';
    //Require views, in the same directory as 'editPost' file, because system thinks we are on the same file
        include '../views/entry.php';
    //Request post data by its uid
        $result = loadPost_direct($_POST['post']);

        if(empty($result)){
            //Entry is empty
            echo "<b>Ha ocurrido un error leyendo los datos de la entrada que acabas de editar.<br>Por favor recarga la página y visita tu perfil para verificar que la entrada aun exista en su estado previo a la edición que acabas de hacer.</b><br>";
        }else{
            //Entry is ok
            printEntry($result);
        }
        

            

?>