<?php 

    //Read user and password
        $USR = $_POST['username'];
        $PSW = $_POST['password'];

    
    //Prepare procedures
        require '../procedures/sys_db_con.php';
        require '../procedures/logChkUser.php';
        require '../procedures/LoginSystem.php';
    //Prepare views
        require '../views/login.php';

    if(CheckUserExists($USR)){
        //User exists, load data to login
        
        $Pkg = LoginSystem($USR,$PSW);
        if(!empty($Pkg)){
            //Package isn't empty, load system
            UsrExists();
            session_start();
            
            $_SESSION['UsrPkg'] = $Pkg ;
            if(!empty($Pkg['first_access'])){
                echo "<script>function GoToCheck(){ window.location = 'FirstAccess.php'; } setTimeout('GoToCheck()', 1300); </script>";
            }else{
                //That means the user has been logged at least 1 time correctly
                echo "<script>function GoToPortal() {  window.location = 'Desktop.php'; } setTimeout('GoToPortal()', 1900); </script>";
            }
            
        }else{
            troubleAccess();
        }
    }else{
        UsrDsntExist($USR);
    }




?>