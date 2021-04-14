<?php 


    //Views
    require '../views/mkIdentity.php';
    require '../views/signupMail.php';

    //Procedures
    require '../procedures/mkIdentity.php';
    require '../procedures/sendEmail.php';
    require '../procedures/sys_db_con.php';
    require '../procedures/mkFirstFollow.php';


    if($_POST['callingFrom']=='doIdentity'){
        //User wants to execut the create profile procedure
        //doIdentity();
        $pkg = [];
        $pkg = $_POST['data'];
        $pkg['validationCode'] = mkUUID(7);
        $EmailContent = signup_mailtemplate($pkg['email'],$pkg['validationCode']);
        
        $Procedure_MkIdentity = doIdentity($pkg);
        if($Procedure_MkIdentity){
            //The signup on DB was success
            //Send email with validation code for user's first access
            sendEmail("registro@pwpost.com",$pkg['email'],"Código de confirmación de registro",$EmailContent);
            echo "<script>alertify.alert('Registro de usuario', 'Apreciado(a) ",$pkg['fullname'],"<br />Tu registro ha sido exitoso. Falta un paso más!<br />En tu correo electrónico encontrarás un código que te será solicitado cuando inicies sesión por primera vez.', function(){ location.reload(); });</script>";
        }else{
            echo "<script>alertify.alert('Registro de usuario','Ha ocurrido un error en nuestro servidor al momento de registrarte. Intenta nuevamente más tarde, si el problema persiste comunícate con soporte.');</script>";
        }
    }else{
        //User wants to create profile
        mkIdentity_showForm();
    }

?>