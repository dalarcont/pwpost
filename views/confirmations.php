<?php 

    //AlertifyJS Confirmation dialogs

    function RemoveConfirmationMessage($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ SetUpRemove('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }

    function HideConfirmationMessage($id){
        echo "<script>alertify.confirm('Ocultar entrada', '¿En realidad quieres ocultar esta entrada?', function(){ SetUpPrivacy('",$id,"'); }, function(){ alertify.error('Se cancela privatización de la entrada')});</script>";
    }

    function UnhideConfirmationMessage($id){
        echo "<script>alertify.confirm('Mostrar entrada', '¿En realidad quieres volver a mostrar esta entrada?', function(){ UnsetPrivacy('",$id,"'); }, function(){ alertify.error('Se cancela visibilidad de la entrada')});</script>";
    }

    function deleteProfileConfirmation(){
        echo "<script>alertify.confirm('Eliminar perfil', 'Para confirmar la eliminación de tu perfil, escribe tus datos de inicio de sesión. <div class=mb-3><label for=username class=form-label>Correo electrónico</label> <input type=text class=form-control id=rmprflmail aria-describedby=emailHelp></div><div class=mb-3><label for=password class=form-label>Contraseña de inicio de sesión en PwPost!</label><input type=password class=form-control id=rmprflkey></div>', function(){ UnsetIdentity(true); }, function(){ alertify.error('Eliminación de perfil cancelada')}); $('#rmprflmail').val(''); $('#rmprflkey').val('');</script>";
    }


?>