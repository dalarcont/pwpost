<?php 
    session_start();

    //Print basic profile info
    function print_profile($pkg){
        if(count($pkg)==0){
            echo "<br><fieldset><h2>No existe ese perfil</h2><br><p>Puede que el perfil haya sido eliminado o suspendido por infringir normas comunitarias.</p></fieldset>";
        }else{
            echo "<br><h2>".$pkg['username']."</h2>
            <p>Nombre de usuario: <b>".$pkg['username']."</b> - 
            Nombre completo: <b>".$pkg['user_fullname']."</b> - 
            Es miembro desde: <b>".$pkg['joindate']."</b></p>";
        }
        
    }


    //User hasn't entries
    function printProfile_entrieEmpty(){
        echo "<br>Este usuario no ha publicado nada. Dale un tiempo prudente y vuelve a visitarlo!";
    }


?>