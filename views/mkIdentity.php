<?php 

    function mkIdentity_showForm(){

        echo "<div id='form_newUser' title='Crear perfil' style='display:none;'>
            <center>
            <fieldset>
            <br>
            <div class='mb-3'>
            <label for='username' class='form-label'>Nombre de usuario</label>
            <input type='text' class='form-control' id='mkidentity_username' onkeyup='validateUsername()'><br>
            <div id='resultValidationUsername'></div>
             </div>
                <div class='mb-3'>
                    <label for='username' class='form-label'>Correo electrónico</label>
                    <input type='text' class='form-control' id='mkidentity_email' onblur='validateEmail()'><br>
                    <div id='resultValidationEmail'></div>
                    <input type='hidden' id='availableControl' value='false'>
                </div>
                <div class='mb-3'>
                    <label for='password' class='form-label'>Contraseña</label>
                    <input type='password' class='form-control' id='password'>
                </div>
                <br>
                <button class='btn btn-primary' id='doRegistry' onclick='connect()' disabled>Registrarme</button>
            <br><br>
            </fieldset>
            </center>
            </div>
            <script>$('#form_newUser').dialog({height:550,width:550});</script>
    ";
    }

?>