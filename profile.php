<?php
session_start();
    $profile_username = $_GET['p'];
    //Call control file
        require 'views/PageTemplate.php';
        require 'controllers/profile.php';


    // IMPORTANT 
    // Set type page, title page complement, description
    html_print_firstBlock("profile",$profile_username,"Perfil del usuario");

    // IMPORTANT 
    // The next function will print a navigation menu if there is a logged user, if not, just nothing to do.
    html_print_HeaderNav_selector($_SESSION['UsrPkg']);

    // IMPORTANT
    // After the next function you need to include or call your needed functions in the <main> frame of the HTML
    html_print_main_frame();
        //Include, Require, Call your needed functions/procedures below
            //Hidden value to set if the new post action will start with a comment or empty
            echo '<input type="hidden" id="isOnProfile" value="',$profile_username,'"></input>';
            //Print data profile
            printProfile_data($profile_username); 
            //Call procedure to check a follow
            require 'procedures/getFollowingData.php';
            //Let us know what's the logged user
            $loggedUser = $_SESSION['UsrPkg']['username'];
            //Get list of followed users


            //Is the profile in view the same as logged user??
            if($profile_username==$loggedUser){
                //It's the same
                echo "---";
            }else{
                //Isn't the same
                if(checkFollowing($profile_username,$loggedUser)){
                    //Print 'Unfollow' FxButton
                    echo "<button id='fxFollow' class='btn btn-danger' onclick='letUnfollow()'>Dejar de seguir</button><br><br>";
                }else{
                    echo "<button id='fxFollow' class='btn btn-success' onclick='letFollow()'>Seguir</button><br><br>";
                }
            }
        //End

    // IMPORTANT
    // After the next function you need to include or call your needed functions in the <FrontEnd> frame of the HTML
    html_print_FrontEnd_frame();
        //Include, Require, Call your needed functions/procedures below
            printProfile_entries($profile_username);
        //End


    //Closing HTML view
    html_print_CompletePage(false);
                
?>