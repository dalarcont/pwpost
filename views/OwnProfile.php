<?php 
    session_start();
    /*Entrie print*/
    
    function printProfile($pkg){
        echo "<br>
        <p>Nombre completo: <b>",$pkg['user_fullname'],"</b></p>
        <p>Correo electrónico: <b>",$pkg['user_email'],"</b><br><i>Tu correo no será visible ante el público.</i></p>
        <p>Fecha de registro: <b>",$pkg['joindate'],"</b></p>
        ";
    }

    function printProfile_entrieEmpty(){
        echo "<br>No has publicado algo, por algo tu perfil está vacío.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Publicar algo...</button>";
    }
    
    
?>