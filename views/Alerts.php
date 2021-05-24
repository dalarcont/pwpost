<?php

    //AleritfyJS Alert messages with or without notifications or added behaviors

    function alertMessage($title,$content,$extra,$extra2){

        function addOnSelector($extra,$extra2){
            switch($extra){
                case "transport":
                    //System will be go to other page
                    return ", function(){ window.location = '".$extra2."'; })";
                break;

                case "reload":
                    //System will reload the page
                    return ", function(){ location.reload(); })";
                break;

                case "truenotification":
                    //Show a notification that say it was good
                    return ", function(){ alertify.success('".$extra2."'); })";
                break;

                case "falsenotification":
                    //Show a notification that say something was wrong
                    return ", function(){ alertify.error('".$extra2."'); })";
                break;

                default:
                    //There isn't an extra added
                    return ")";
                break;
            }
        }
        
        //Print message
        echo "<script>alertify.alert('".$title."','".$content."'".addOnSelector($extra,$extra2).";</script>";
    }


?>