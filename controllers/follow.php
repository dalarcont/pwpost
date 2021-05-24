<?php 
    session_start();
    //Require DB connection

    //Call procedures
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/Follow.php';
    //View templates
    require '../views/Alerts.php';
    //This procedure doesn't need view file. This same controller can change a simply style property

    if(empty($_SESSION['UsrPkg'])){
        //User hasn't logged or its session was broken
        alertMessage("Seguir usuario","Error de sesión<br />No se puede ejecutar tu orden.<br />Intenta nuevamente.<br />Si el problema persiste, por favor cierra e inicia sesión nuevamente.","reload",false);
    }else{
        if($_POST['param']=="set"){
            //User session is working properly
            //The 'username' that is requesting to follow other 'username' is taken from session data, but the followed 'username' is taken from JS and HTML
            $followed_user = $_POST['data'];
            $r = DB_SetUpFollow($followed_user,null);
            if($r){
                //Follow procedure was great and can set changes in HTML UI depending if was called from a List or a single profile viewing
                if($_POST['extra']==true){
                    //Its coming from a list
                    echo "<script>
                    $('#btn-".$followed_user."').removeClass('btn btn-success');
                    $('#btn-".$followed_user."').addClass('btn btn-danger');
                    $('#btn-".$followed_user."').html('Dejar de seguir');
                    $('#btn-".$followed_user."').attr('onclick','UnsetFollow(this)');
                    </script>";
                }else{
                    //Coming from a single profile viewing
                    echo "<script>
                    $('#fxFollow').removeClass('btn btn-success');
                    $('#fxFollow').addClass('btn btn-danger');
                    $('#fxFollow').html('Dejar de seguir');
                    $('#fxFollow').attr('onclick','UnsetFollow(null)');
                    </script>";
                }
            }else{
                alertMessage("Seguir usuario","Ocurrió un error en el sistema.<br />Por favor intenta luego.",false,false);
            }
        }else{
            //User needs to unfollow someone
            $unfollow_object = $_POST['data'];
            $r = DB_UnsetFollow($unfollow_object,$_SESSION['UsrPkg']['username']);
            if($r){
                //Unfollow procedure was great and can set changes in HTML UI  depending if was called from a List or a single profile viewing
                if($_POST['extra']==true){
                    //Its coming from a list
                    echo "<script>
                    $('#btn-".$unfollow_object."').removeClass('btn btn-danger');
                    $('#btn-".$unfollow_object."').addClass('btn btn-success');
                    $('#btn-".$unfollow_object."').html('Seguir');
                    $('#btn-".$unfollow_object."').attr('onclick','SetUpFollow(this)');
                    </script>";
                }else{
                    //Coming from a single profile viewing
                    echo "<script>
                    $('#fxFollow').removeClass('btn btn-danger');
                    $('#fxFollow').addClass('btn btn-success');
                    $('#fxFollow').html('Seguir');
                    $('#fxFollow').attr('onclick','SetUpFollow(this)');
                    </script>";
                }
            }else{
                alertMessage("Seguir usuario","Ocurrió un error en el sistema.<br />Por favor intenta luego.",false,false);
            }
        }
        
    }