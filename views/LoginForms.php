<?php 


    function Form_Login(){
        echo '<fieldset style="width:150px;">
        <br>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password">
            </div>
            <br>
            <button class="btn btn-primary" onclick="systemConnect()">Acceder</button><br><br>
            <a href="#" onclick="startMakeIdentity()">Crear perfil</a><br>
            <a href="#" onclick="RecoveryAccount()">Recuperar perfil</a><br>
        <br><br>
        </fieldset>';
    }


?>