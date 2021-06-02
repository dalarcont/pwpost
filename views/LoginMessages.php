<?php 

    function LoginMessage_UserNonexistence($usr){
        echo loginMessages::UserNonexistence();
    }

    function LoginMessage_UserExistence(){
        echo loginMessages::UserExistence();
   }

   function LoginMessage_TroubleData(){
       echo loginMessages::TroubleData();
   }
?>