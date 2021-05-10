<?php
    session_start();

    $inactiveTime = 15;
    if (isset($_SESSION['timeout'])) {
        $sesionTimeToUnset = time() - $_SESSION['timeout'];
        if ($sesionTimeToUnset > $inactiveTime) {
            session_destroy();
            echo "<script>location.href='index.php';</script>";
        }
    }
    $_SESSION['timeout'];


    if (empty($_SESSION['UsrPkg'])) {
        //There is no user logged in
        echo "<script>alert('No estás identificado correctamente...'); location.href='index.php';</script>";
    }else{
            $UserData = $_SESSION['UsrPkg'];
                echo "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
            <title>PWPost</title>
            <meta charset='utf-8' />
            <meta name='description' content='Página para publicar cosas tipo post o twitter'>
            <link rel='stylesheet' href='css/final.css'>
            <link rel='stylesheet' href='css/entryStyle.css'>
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
            <h1 class='headline'><img src='components/favicon.ico' style='width:32px;height:32px;'></img>  PWPost!</h1>
            <p><span class='slogan'><i>Publica lo que quieras, igual nadie lo va a leer ni le dará importancia!</i></span></p>
            </header>
            <section>
            <article>
            <center>
            <div id='main'>
            <p>Dado que es tu primer acceso necesitamos confirmar que la dirección de correo electrónico que suministraste al momento del registro es de fácil acceso para ti.</p>
            <p>A continuación ingresa el código de confirmación que te enviamos:<br><i>Debes digitarlo manualmente, no lo copies y pegues directamente del correo que te enviamos.</i></p>
            <div class='mb-3'>
                <input type='text' class='form-control' style='width:150px;' id='firstCode' aria-describedby='firstCode' onkeyup='FirstCodeValidation'><br><br>
                <button id='validateFirstButton' class='btn btn-primary' onclick='FirstCodeConfirmation()' style='display:none;'>Confirmar</button><br><br>
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
