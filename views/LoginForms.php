<?php 


    function Form_Login(){
        echo '<fieldset style="width:150px;">
        <br>
            <div class="mb-3">
                <label for="username" class="form-label">'.indexPage::login_username().'</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">'.indexPage::login_password().'</label>
                <input type="password" class="form-control" id="password">
            </div>
            <br>
            <button class="btn btn-primary" onclick="'.indexPage::loginExecutor().'">'.indexPage::login_button().'</button><br><br>
            <a href="#" onclick="startMakeIdentity()">'.indexPage::makeProfile().'</a><br>
            <a href="#" onclick="RecoveryAccount()">'.indexPage::recoveryProfile().'</a><br>
            <a href="#" onclick="setLang(0)" style="font-size:10px;">English version</a><br><a href="#" onclick="setLang(1)" style="font-size:10px;">Versión español</a>
        <br><br>
        </fieldset>';
    }


?>