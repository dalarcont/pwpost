<?php
session_start();
    $profile_username = $_GET['p'];
    //Call control file
        require 'views/PageTemplate.php';
        require 'controllers/profile.php';


    // IMPORTANT 
    // Set type page, title page complement, description
    html_print_firstBlock($_,$_,$_);

    // IMPORTANT 
    // The next function will print a navigation menu if there is a logged user, if not, just nothing to do.
    html_print_HeaderNav_selector($_);

    // IMPORTANT
    // After the next function you need to include or call your needed functions in the <main> frame of the HTML
    html_print_main_frame();
        //Include, Require, Call your needed functions/procedures below
            
        //End

    // IMPORTANT
    // After the next function you need to include or call your needed functions in the <FrontEnd> frame of the HTML
    html_print_FrontEnd_frame();
        //Include, Require, Call your needed functions/procedures below

        //End


    //Closing HTML view
    html_print_CompletePage();
                
?>