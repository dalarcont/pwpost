<?php 
    session_start();
    /*Entry print*/
    
    function printProfile($pkg){
        $data="<p>Nombre completo: <b>".$pkg['user_fullname']."</b>-Correo electrónico: <b>".$pkg['user_email']."</b><br \><i>Tu correo no será visible ante el público.</i> -Fecha de registro: <b>".$pkg['joindate']."</b></p><button class='btn btn-danger' id='btn_hide' onclick=letRemoveProfile(".$_SESSION['UsrPkg']['username'].")>Eliminar mi perfil</button><p><br \></p>";
        $data = str_replace("<br />", "&#13;", $data);
        echo "<script>$('<div id=profileDescription>",$data,"</div>').insertBefore('#FrontEnd'); </script>";
        
    }

    function printProfile_entrieEmpty(){
        echo "<br>No has publicado algo, por algo tu perfil está vacío.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Publicar algo...</button>";
    }
    
    
?>