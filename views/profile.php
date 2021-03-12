<?php 
    session_start();

    function print_profile($pkg){
        if(count($pkg)==0){
            echo "<br><fieldset><h2>No existe ese perfil</h2><br><p>Puede que el perfil haya sido eliminado o suspendido por infringir normas comunitarias.</p></fieldset>";
        }else{
            $text_to_print =  "<br><fieldset><h2>".$pkg['username']."</h2><p>Nombre de usuario: <b>".$pkg['username']."</b></p><p>Nombre completo: <b>".$pkg['user_fullname']."</b></p><p>Es miembro desde: <b>".$pkg['joindate']."</b></p></fieldset>";
            echo $text_to_print ;
        }
        
    }

    function printProfile_entrieEmpty(){
        echo "<br>Este usuario no ha publicado nada. Dale un tiempo prudente y vuelve a visitarlo!";
    }


?>