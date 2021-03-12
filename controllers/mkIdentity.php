<?php 


    //Views
    require '../views/mkIdentity.php';

    //Procedures
    //require '../procedures/mkIdentity.php';


    if($_POST['callingFrom']=='doIdentity'){
        //User wants to execut the create profile procedure
        doIdentity();
    }else{
        //User wants to create profile
        mkIdentity_showForm();
    }






?>