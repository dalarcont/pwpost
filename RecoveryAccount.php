<?php 
session_start();
require 'views/Language.php';
require 'views/Alerts.php';
$lang = $_SESSION['lang'];
if($lang=="EN"){
    $l = 1;
}else{
    $l = 0;
}


echo '<!DOCTYPE html>
<html lang="'.globalFrame::langSelector_r().'">';
?>
<head>
<title>PWPost - <?php require 'views/Language.php'; recoveryPage::title(); ?></title>
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
<script src='components/scrollScripts.js'></script>
<link rel='shortcut icon' href='components/favicon.ico' type='image/x-icon'>
</head>

<body>

<header>
<br>
<h1 class='headline'><img src='components/favicon.ico' style='width:32px;height:32px;'></img>  PWPost!</h1>
<p><span class='slogan'><i><?php indexPage::Slogan(); ?></i></span></p>
</header>
<br><h1><?php recoveryPage::titleInside(); ?></h1><br>
<section>
<article>
<center>
<div id='main'>
<?php recoveryPage::resume(); ?>
<div class='mb-3'>
    <input type='text' class='form-control' style='width:450px;' id='emailRecovery' aria-describedby='emailRecovery' onkeydown='chkRcvEmail()'><br><br>
    <span id='msgSpan' style='color:red;'></span>
    <button id='rcvButton' class='btn btn-primary' onclick='confirmRecovery()' style='display:none;'><?php recoveryPage::button(); ?></button><br><br>
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
        <?php indexPage::footer();?>
        2021-1<br>
        Daniel Alarcón</span>
    </div>
    
</footer>
</body>
</html>
