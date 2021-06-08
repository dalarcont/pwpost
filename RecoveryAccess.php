<?php
session_start();
require 'views/Language.php';
if(empty($_SESSION['UsrPkg']['recovery_key'])){
    //Take back to index
    echo "<script>alert('No estás identificado correctamente...'); location.href='index.php';</script>";
}else{
    //Let show the page
    echo "
    <!DOCTYPE html>
        <html lang='es'>
        <head>
        <title>PWPost - "; recoveryPage::title(); echo "</title>
        <meta charset='utf-8' />
        <meta name='description' content='Página para publicar cosas tipo post o twitter'>
        <link rel='stylesheet' href='css/final.css'>
        <link rel='stylesheet' href='css/entryStyle.css'>
        <link rel='stylesheet' href='css/profileTable.css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='plugins/jqueryui/jquery-ui.js'></script>
        <link rel='stylesheet' href='plugins/jqueryui/jquery-ui.css'>
        <script src='plugins/alertifyjs/alertify.min.js'></script>
        <link rel='stylesheet' href='plugins/alertifyjs/css/alertify.min.css' />
        <link rel='stylesheet' href='plugins/alertifyjs/css/themes/default.min.css' />
        <script src='components/SystemScripts.js'></script>
        <link rel='shortcut icon' href='components/favicon.ico' type='image/x-icon'>
        </head>

        <body>

        <header>
        <br>
        <h1 class='headline'><img src='components/favicon.ico' style='width:32px;height:32px;'></img>  PWPost!</h1>
        <p><span class='slogan'><i>"; indexPage::Slogan(); echo "</i></span></p>
        </header>
        <br><h1>Paso Final Recuperar Acceso</h1><br>
        <section>
        <article>
        <center>
        <div id='main'>
        "; recoveryPage::instructionChangePass(); echo "
        <div class='mb-3'>
            <input type='password' class='form-control' id='newpswd' style='width:200px;' onkeyup='".recoveryPage::KeyValidation()."'><br><br>
            <span id='msgSpan' style='color:red;'></span>
            <button id='rcvButton' class='btn btn-primary' onclick='StartRecovery()' style='display:none;'>Continuar</button><br><br>
        </div>
        </div>
        <div id='FrontEnd'>
        </div>
        </center>
        </article>
        </section>
        <footer class='footer'>
            <div>
                <span class='footTxt'>PWPost!</span><br><span class='footTxtsign'>
                Sin derechos reservados, es tan solo un proyecto de asignatura<br>
                No ande de exigente<br>
                Final - TS5C4 - Programación Web<br>
                Tecnología en Desarrollo de Software<br>
                Universidad Tecnológica de Pereira<br>
                2021-1<br>
                Daniel Alarcón</span>
            </div>
            
        </footer>
        </body>
    </html>
    ";
}

?>
