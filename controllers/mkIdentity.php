<?php 


    //Views
    require '../views/mkIdentity.php';

    //Procedures
    require '../procedures/mkIdentity.php';
    require '../views/signupMail.php';


    if($_POST['callingFrom']=='doIdentity'){
        //User wants to execut the create profile procedure
        //We need the TimeZone
        date_default_timezone_set('America/Bogota');
        //doIdentity();
        $pkg = [];
        $pkg = $_POST['data'];
        echo $pkg['fullname'];
        $email = "daniel.alarcon@utp.edu.co";
        $code = "M4LP4R1D0UR1B3";
        $content = signup_mailtemplate($email,$code);
        $emisor = "matricula@unimisera.com";
        $asunto = "Código de confirmación registro de cuenta - PostIt!";
        $cabeceras = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
        $cabeceras .= "Content-Transfer-Encoding: 8bit\r\n";
        $cabeceras .= "From:" . $emisor;
        mail($email, mb_encode_mimeheader($asunto), $content, $cabeceras);

        echo $content ;


    }else{
        //User wants to create profile
        mkIdentity_showForm();
    }






?>