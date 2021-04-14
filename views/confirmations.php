<?php 

    function confirm_rm_post($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ rmPost('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }

    function confirm_hide_post($id){
        echo "<script>alertify.confirm('Ocultar entrada', '¿En realidad quieres ocultar esta entrada?', function(){ hidePost('",$id,"'); }, function(){ alertify.error('Se cancela privatización de la entrada')});</script>";
    }

    function confirm_unhide_post($id){
        echo "<script>alertify.confirm('Mostrar entrada', '¿En realidad quieres volver a mostrar esta entrada?', function(){ unhidePost('",$id,"'); }, function(){ alertify.error('Se cancela visibilidad de la entrada')});</script>";
    }


?>