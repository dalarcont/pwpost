<?php 
    session_start();

    //Verify session data is set
    if(!empty($_SESSION['UsrPkg'])){
        $UserData = $_SESSION['UsrPkg'];
    }else{
        $UserData = false;
    }

    //Path selected
    if($_POST['path']=="PV"){
        $Path = "private";
    }else{
        if($_POST['path']=="LUOWN"){
            //Logged user wants it self
            $Path = "LUOWN";
        }else{
            $Path = false;
        }
        
    }
    //Profile selected
    $ProfileSelected = $_POST['p'];

    //Require DB connection
        require '../procedures/SYS_DB_CON.php';
    //Require procedures and processors
        require '../procedures/PostLoad.php'; //Post loader
        require '../procedures/ProfileData.php'; //Data profile loader
        require '../controllers/PrivacyManager.php'; //Privacy manager at printing post
        require '../procedures/UserExists.php'; //Verify user existence
        require '../controllers/AttachedManagement.php'; //Attached entry management
    //Require views
        require '../views/Entry.php'; //Entry templates
        require '../views/UserProfile.php'; //User's profile template

    //Entry printer in loop
    function EntryPrinter($PKG){
        $size = count($PKG);
        //print entries, connect to views, but first take support from attached entry management if there are.
        for($i=0; $i<=($size-1); $i++){
            //Process package
            $PKG[$i] = AttachedEntryManagement($PKG[$i]);
            PrintEntry($PKG[$i]);
        }
    }

    //Selector functions
    function SameUser($a){
        //Print description
        echo "<script>$('#profileResume').append('".Print_ProfileResume($a)."');</script>";
        //Print entries included the hidden because user wants to see its own profile
        $EntryPkg = DB_Post_Profile($a['username'],false);
        if(empty($EntryPkg)){
            //There isn't entries
            PrintProfile_Empty();
        }else{
            EntryPrinter($EntryPkg);
        }
    }

    function PublicUser($selector,$object,$viewingUser){
        //Procedure was called from public, i.e. not logged user
        if(DB_VerifyUserExistence($object)){
            //User exists
            //Get data but indicate if a logged user is viewing the profile
            if($selector=="private"){
                //Someone logged is viewing this profile
                $PV_Pkg = DB_LoadProfile_Data($object,$viewingUser);
            }else{
                //Public is viewing
                $PV_Pkg = DB_LoadProfile_Data($object,false);
            }

            //Print profile resume
            ProfileResume("private",$PV_Pkg);
            /*
            //Print entries (Public entries)
            $PV_Entry = DB_Post_Profile($object,true);
            //Selector of post's cantity
            if(empty($PV_Entry)){
                //User exists but doesn't have entries
                PrintProfilePublic_Empty();
            }else{
                //User have at least 1 entry
                EntryPrinter($PV_Entry);
            }*/
        }else{
            PrintProfileNonexistence();
        }
    }

    if($ProfileSelected!=null){
        //Profile selected isn't empty, will charge a profile
        //Main selector
        //Detect if logged user tries to see its own profile or another
        if($ProfileSelected==$UserData['username']){
            //Logged user wants to see its own profile
            //PublicUser($Path,$ProfileSelected,$ProfileSelected);
            echo "<i>Estimado(a) usuario(a): ".$ProfileSelected.", esta es la vista de tu perfil ante el público.</i>";
        }else{
            //See other user profile
            PublicUser($Path,$ProfileSelected,$UserData['username']);
        }
    }else{
        if($Path=="LUOWN"){
            //Logged User Own
            //Wants to see its own profile from Desktop page
            echo "<i>Estimado(a) usuario(a): ".$UserData['username'].", esta es la vista de tu perfil ante el público.</i>";
        }else{
            echo "<big>No se ha definido el perfil a mostrar. Verifica la URL</big>";
        }
    }

    
    

?>