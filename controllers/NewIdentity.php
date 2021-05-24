<?php 


    //Views
    require '../views/MakeProfileForm.php';
    require '../views/SignUpMail.php';
    require '../views/Alerts.php';

    //Procedures
    require '../procedures/MakeIdentity.php';
    require '../procedures/Email.php';
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Follow.php';


    if($_POST['callingFrom']=='doIdentity'){
        //User wants to execut the create profile procedure
        $pkg = [];
        $pkg = $_POST['data'];
        $pkg['validationCode'] = MakeUID(7);
        $EmailContent = EmailTemplate_SignUp($pkg['email'],$pkg['validationCode']);
        
        $Procedure_MkIdentity = DB_SetUpIdentity($pkg);
        if($Procedure_MkIdentity){
            //The signup on DB was success
            //The system must create a 'Follow' procedure, that makes the sign up user will be able to see it's own posts because the same user is the first own follower.  
            //But the system won't let see that the same user is the 1st follower, that will be result ilogical for the user.
            DB_SetUpFollow($_POST['data']['username'],"FIRST");

            //Send email with validation code for user's first access
            sendEmail("registro@pwpost.com",$pkg['email'],"Código de confirmación de registro",$EmailContent);
            $content = "Apreciado(a) ".$pkg['fullname']."<br />Tu registro ha sido exitoso. Falta un paso más!<br />En tu correo electrónico encontrarás un código que te será solicitado cuando inicies sesión por primera vez.";
            alertMessage("Registro de usuario",$content,"reload",false);
        }else{
            alertMessage("Registro de usuario","Ha ocurrido un error en nuestro servidor al momento de registrarte. Intenta nuevamente más tarde, si el problema persiste comunícate con soporte.",false,false);
        }
    }else{
        //User wants to create profile
        Form_MakeIdentity();
    }

?>