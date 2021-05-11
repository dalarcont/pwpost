<?php 

    session_start();
    require '../procedures/Recovery.php';
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Email.php';
    require '../views/RecoveryMail.php';
    require '../procedures/UpdatePassword.php';


    if(empty($_POST['call'])){
        //email
        $email = $_POST['data'];
        $pswd = MakeTemporalPassword(10);

        $r = DB_SetUpRecoveryPassword$email,$pswd);
        $content = EmailTemplate_Recovery($email, $pswd);

        if($r){
            //Recovery account procedure on DB was correct.
            echo "<script>$('#main').hide(); alertify.alert('Recuperar cuenta', 'En tu correo electrónico encontrarás una contraseña temporal, úsala para iniciar sesión.<br />Una vez ingreses, el sistema te pedirá una nueva contraseña.', function(){ window.location = 'index.php'; });</script>";
            sendEmail("soporte@pwpost.com",$email,"Recuperación de acceso a cuenta",$content);
        }else{
            echo "La dirección de correo electrónico proporcionada NO existe en nuestra base de datos.";
        }
    }else{
        if($_POST['call']=="setRecovery"){
            //User calls for get back its access after use a temporal password
            $pswd_new = $_POST['data'];
            $r2 = DB_SetUpNewPassword$pswd_new,$_SESSION['UsrPkg']['uid_user']);
            if($r2){
                echo "<script>$('#main').hide(); alertify.alert('Recuperar cuenta', 'Cuenta y contraseña de acceso recuperadas.', function(){ window.location = 'index.php'; });</script>";
            }else{
                echo "Error: La base de datos informa que NO se pudo hacer la actualización de datos para recuperar acceso.<br>Intente nuevamente más tarde.";
            }
        }else{
            echo "Error: Procedure to follow isn't selected. Options to take: 0";
        }
    }
        



?>