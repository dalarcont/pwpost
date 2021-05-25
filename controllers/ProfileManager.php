<?php 
    session_start();

    //Verify session data is set
    if(!empty($_SESSION['UsrPkg'])){
        $UserData = $_SESSION['UsrPkg'];
    }else{
        $UserData = false;
    }

    //Path selected
    $Path = $_POST['path'];
    
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
    function ProfileUser($selector,$object,$viewingUser){
        //Procedure was called from public, i.e. not logged user
        if(DB_VerifyUserExistence($object)){
            //User exists
            //Get data but indicate if a logged user is viewing the profile
            if($selector=="private"){
                //Someone logged is viewing this profile
                $PV_Pkg = DB_LoadProfile_Data($object,$viewingUser);
            }else{
                //Public is viewing, will load basic data
                $PV_Pkg = DB_LoadProfile_Data($object,false);
            }

            //Print profile resume
            ProfileResume($selector,$PV_Pkg,$viewingUser);
            
            //Print entries (Public entries)
            $PV_Entry = DB_Post_Profile($object,true);
            //Selector of post's cantity
            if(empty($PV_Entry)){
                //User exists but doesn't have entries
                if($object==$viewingUser){
                    //Same profile as logged user haven't entries yet
                    PrintProfile_Empty();
                }else{
                    //Any profile doesn't have entries
                    PrintProfilePublic_Empty();
                }
            }else{
                //User have at least 1 entry
                EntryPrinter($PV_Entry);
            }
        }else{
            PrintProfileNonexistence();
        }
    }

    //Delete profile button for logged user profile
    function DeleteProfile($objective,$whoIsOnline){
        if($objective==$whoIsOnline){
            //Show the button
            echo "<p><button role='unsetprofile' class='btn btn-danger' onclick=startUnsetIdentity()>Eliminar mi perfil</button><br></p>";
        }

    }

    //Main selector
    if($Path=="PV"){
        //Private access
        //Delete profil button selector
        DeleteProfile($ProfileSelected,$UserData['username']);
        //Can show more data
        ProfileUser("private",$ProfileSelected,$UserData['username']);
    }else{
        //Only show basic data (name,username,join date, post cantity, followers cantity, followed cantity)
        ProfileUser(false,$ProfileSelected,null);
    }

?>