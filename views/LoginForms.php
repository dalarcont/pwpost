<?php 


    function Form_Login(){
        echo '<div id="LgSys" style="width:15%">
            
                <label for="username" class="form-label">'.indexPage::login_username().'</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                <label for="password" class="form-label">'.indexPage::login_password().'</label>
                <input type="password" class="form-control" id="password">
                <p></p>
            <button class="btn btn-primary btn-ligth" onclick="'.indexPage::loginExecutor().'">'.indexPage::login_button().'</button><p></p>
            <a class="btn btn-outline-secondary btn-sm" href="#" onclick="startMakeIdentity()">'.indexPage::makeProfile().'</a><p></p><a class="btn btn-outline-secondary btn-sm" href="#" onclick="RecoveryAccount()">'.indexPage::recoveryProfile().'</a><p></p>
            <a class="btn btn-outline-secondary btn-sm" href="#" onclick="setLang(0)" style="font-size:10px;">English version</a> <a  class="btn btn-outline-secondary btn-sm" href="#" onclick="setLang(1)" style="font-size:10px;">Versión español</a>
        <br><br></div>';
    }


?>