<?php 

    function confirm_rm_post($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ rmPost('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }

    function confirm_hide_post($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ rmPost('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }

    function confirm_unhide_post($id){
        echo "<script>alertify.confirm('Eliminar entrada', '¿En realidad quieres eliminar esta entrada?', function(){ rmPost('",$id,"'); }, function(){ alertify.error('Se cancela eliminación de la entrada')});</script>";
    }


?>