<?php
    session_start();
    require 'views/Language.php';
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
        loginMessages::WrongIdentified();
    }else{
            $UserData = $_SESSION['UsrPkg'];
                echo "
            <!DOCTYPE html>
            <html lang='".globalFrame::langSelector_r()."'>
            <head>
            <title>PWPost - Twitter</title>
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
            <link rel='stylesheet' href='css/twitterTable.css' />
            <script src='components/SystemScripts.js'></script>
            <link rel='shortcut icon' href='components/favicon.ico' type='image/x-icon'>
            </head>

            <body>
                <header>
                <br>
                    <img src='components/favicon.ico' style='width:32px;height:32px;'></img>  <h2>PWPost!</h2>";
                    DesktopPage::NavBar_Tw();
                echo "<br>
                <a href='#' onclick='setLang(0)' style='font-size:10px;'><img src='components/englishus.png' style='width:32px;height:32px;'></img></a>&nbsp;<a href='#' onclick='setLang(1)' style='font-size:10px;'><img src='components/spanish.png' style='width:30px;height:23px;'></img></a>
                </header><br><br>";
                
                    //In this page we don't need actions menu
            
            echo "<section>
            <article>
            <center>
            <div id='main'>
            <br>
            </div>            
            <!-- -->
            <div class='mb-3'>
            <label for='username' class='form-label'>".Twitter::Form_RunTL_user()."</label>
            <input type='text' class='form-control' id='tw_username' style='width:225px;' placeholder='@'>
            </div>
            <div class='mb-3'>
            <label for='cantity' class='form-label'>".Twitter::Form_RunTL_cant()."</label>
            <input type='number' class='form-control' id='tw_cantityload' style='width:185px;' min='1' max='25' placeholder='Min:1, Max:25.'>
            </div>
            <button class='btn btn-info' onclick=startTwPost(1)>".Twitter::Form_RunTL_button()."</button>
            <!-- -->
            <br>
            <div id='FrontEnd' style='overflow:scroll'>

            
            </div>
            <br>
            ";
            DesktopPage::insideSlogan();
            echo "</center>
            </article>
            
            </section>
            
            <p><br></p>
            
            </body>
            </html>
            ";
        }
