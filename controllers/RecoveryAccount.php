<?php 

    session_start();
    //Call views
    require '../views/RecoveryMail.php';
    require '../views/Alerts.php';
    require '../views/Language.php';
    //Call procedures
    require '../procedures/Recovery.php';
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Email.php';
    require '../procedures/UpdatePassword.php';

    if(empty($_POST['call'])){
        //email
        $email = $_POST['data'];
        $pswd = MakeTemporalPassword(10);

        $r = DB_SetUpRecoveryPassword($email,$pswd);
        $content = EmailTemplate_Recovery($email, $pswd);

        if($r){
            //Recovery account procedure on DB was correct.
            echo "<script>$('#main').hide();</script>";
            alertMessage(Alerts::recoveryTitle(),recoveryPage::tempKey(),"transport","index.php");
            sendEmail("soporte@pwpost.com",$email,recoveryPage::recoverSubject(),$content);
        }else{
            alertMessage(Alerts::recoveryTitle(),Alerts::failMailCheckOnRecovery(),"transport","index.php");
        }
    }else{
        if($_POST['call']=="setRecovery"){
            //User calls for get back its access after use a temporal password
            $pswd_new = $_POST['data'];
            $r2 = DB_SetUpNewPassword($pswd_new,$_SESSION['UsrPkg']['uid_user']);
            if($r2){
                echo "<script>$('#main').hide();</script>";
                alertMessage(Alerts::recoveryTitle(),Alerts::successRecovery(),"transport","index.php");
            }else{
                alertMessage(Alerts::recoveryTitle(),Alerts::systemError(),"transport","index.php");
            }
        }else{
            alertMessage(Alerts::recoveryTitle(),Alerts::parameterError(),"transport","index.php");
        }
    }
        



?>