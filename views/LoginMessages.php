<?php 

    function LoginMessage_UserNonexistence($usr){
        echo "<br><br>El usuario ",$usr," no existe.<br>Por favor verifica bien los datos.";
    }

    function LoginMessage_UserExistence(){
        echo "<br><br>Por favor espere...";
   }

   function LoginMessage_TroubleData(){
       echo "<br><br><b>Verifica si tu contraseña está bien escrita...</b>";
   }
?>