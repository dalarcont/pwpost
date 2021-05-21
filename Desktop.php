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
            <title>PWPost - Portal de usuario ",$UserData['username'],"</title>
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
                    <img src='components/favicon.ico' style='width:32px;height:32px;'></img>  <h2>PWPost!</h2>
                    <nav>
                        <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
                        <a href='#' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
                        <a href='#' id='logOff'>Salir</a>
                         <br><span style='color:black;'> Usuario: ",$UserData['username'],"</span>
                    </nav>
                </header>
                
            <div id='MoreEntry'>
                <button class='btn btn-info' onclick='BottomPage()'><img src='components/down.png' style='width:25px;height:25px;'></img> Ir abajo</button>
            </div>
            <div id='actionsMenu'><br>
                <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Nueva entrada</button><br><br>
            </div>
            <div id='minusEntry'>
                <button class='btn btn-info' onclick='TopPage()'><img src='components/up.png' style='width:25px;height:25px;'></img> Ir arriba</button>
            </div>
            
            <section>
            <article>
            <center>
            <div id='main'>
            <script>DesktopLoad();</script>
            </div>
            <input type='hidden' id='isOnProfile' value='null'></input>
            <input type='hidden' id='whoIsOnline' value='",$UserData['username'],"'></input>
            <div id='FrontEnd'>

            
            </div>
            <div><br>
            <p>PwPost - TS5C4 Programación Web - Semestre 1 2021 - Daniel Alarcón - Universidad Tecnológica de Pereira - 2021</p></div>
            
            </center>
            </article>
            
            </section>
            
            <p><br></p>
            
            </body>
            </html>
            ";
        }
