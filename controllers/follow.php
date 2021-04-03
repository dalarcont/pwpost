<?php 
    session_start();
    //Require DB connection

    //Call procedures
    require '../procedures/sys_db_con.php';
    require '../procedures/follow.php';
    //This procedure doesn't need view file. This same controller can change a simply style property

    if(empty($_SESSION['UsrPkg'])){
        //User hasn't logged or its session was broken
        echo "<script>alertify.alert('Seguir usuario', 'Error de sesión<br />No se puede ejecutar tu orden.<br />Intenta nuevamente.<br />Si el problema persiste, por favor cierra e inicia sesión nuevamente.', function(){ location.reload(); });</script>";
    }else{
        //User session is working properly
        //The 'username' that is requesting to follow other 'username' is taken from session data, but the followed 'username' is taken from JS and HTML
        $followed_user = $_POST['data'];
        $r = doFollow($followed_user);
        if($r){
            //Follow procedure was great and can set changes in HTML UI
            echo "<script>
                $('#fxFollow').removeClass('btn btn-success');
                $('#fxFollow').addClass('btn btn-danger');
                $('#fxFollow').html('Dejar de seguir');
                $('#fxFollow').attr('onclick','letUnfollow()');
            </script>";
        }
    }