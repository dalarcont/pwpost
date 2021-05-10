<?php 

    function RemoveConfirmationMessage($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ SetUpRemove('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }

    function HideConfirmationMessage($id){
        echo "<script>alertify.confirm('Ocultar entrada', '¿En realidad quieres ocultar esta entrada?', function(){ SetUpPrivacy('",$id,"'); }, function(){ alertify.error('Se cancela privatización de la entrada')});</script>";
    }

    function UnhideConfirmationMessage($id){
        echo "<script>alertify.confirm('Mostrar entrada', '¿En realidad quieres volver a mostrar esta entrada?', function(){ UnsetPrivacy('",$id,"'); }, function(){ alertify.error('Se cancela visibilidad de la entrada')});</script>";
    }


?>