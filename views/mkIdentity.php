<?php 

    function mkIdentity_showForm(){

        echo "<div id='form_newUser' title='Crear perfil' style='display:none;'>
            <center>
            <fieldset>
            <br>
            <div class='mb-3'>
                <label for='fullname' class='form-label'>Nombre:</label>
                <input type='text' class='form-control' id='mk_fullname' onkeyup='validatefullname();'><br>
                <input type='hidden' id='isOk_1' value='false'>
                <div id='mkmsg1'></div>
            
                <label for='username' class='form-label'>Nombre de usuario</label>
                <input type='text' class='form-control' id='mk_username' onkeyup='validateUsername();'><br>
                <input type='hidden' id='isOk_2' value='false'>
                <div id='mkmsg2'></div>
            
                <label for='username' class='form-label'>Correo electrónico</label>
                <input type='text' class='form-control' id='mk_email' onblur='validateEmail();' ><br>
                <div id='mkmsg3'></div>
                <input type='hidden' id='isOk_3' value='false'>
            
                <label for='password' class='form-label'>Contraseña</label>
                <input type='password' class='form-control' id='mk_pswd' onblur='validatePassField();'>
                <div id='mkmsg4'></div>
                <input type='hidden' id='isOk_4' value='false'>
            </div>
                <br>
                <span id='completedData' style='color:red'></id>
                    <button class='btn btn-primary' id='doRegistry' onclick='doMkIdentity()' style='display:none'>Registrarme</button>
                <br><br>
            </fieldset>
            </center>
            </div>
            <script>$('#form_newUser').dialog({height:600,width:550});</script>
    ";
    }

?>