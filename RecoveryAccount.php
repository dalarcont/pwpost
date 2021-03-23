
<!DOCTYPE html>
<html lang='es'>
<head>
<title>PWPost</title>
<meta charset='utf-8' />
<meta name='description' content='Página para publicar cosas tipo post o twitter'>
<link rel='stylesheet' href='css/final.css'>
<link rel='stylesheet' href='css/entrieStyle.css'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='plugins/jqueryui/jquery-ui.js'></script>
<link rel='stylesheet' href='plugins/jqueryui/jquery-ui.css'>
<script src='plugins/alertifyjs/alertify.min.js'></script>
<link rel='stylesheet' href='plugins/alertifyjs/css/alertify.min.css' />
<link rel='stylesheet' href='plugins/alertifyjs/css/themes/default.min.css' />
<script src='components/ownScripts.js'></script>
<link rel='shortcut icon' href='components/favicon.ico' type='image/x-icon'>
</head>

<body>

<header>
<h1 class='headline'><img src='components/favicon.ico' style='width:32px;height:32px;'></img>  PWPost!</h1>
<p><span class='slogan'><i>Publica lo que quieras, igual nadie lo va a leer ni le dará importancia!</i></span></p>
</header>
<br><h1>Recuperar Acceso</h1><br>
<section>
<article>
<center>
<div id='main'>
<p>Si has olvidado tu nombre de usuario, puedes recuperar tu acceso.</p>
<p>A continuación ingresa la dirección de correo electrónico con la cual te registraste.<br> A esa dirección enviaremos tu nombre de usuario y una contraseña temporal que usarás para ingresar, una vez ingreses serás obligado a cambiar esa contraseña.</p>
<div class='mb-3'>
    <input type='text' class='form-control' style='width:450px;' id='emailRecovery' aria-describedby='emailRecovery' onkeydown='chkRcvEmail()'><br><br>
    <span id='msgSpan' style='color:red;'></span>
    <button id='rcvButton' class='btn btn-primary' onclick='confirmRecovery()' style='display:none;'>Continuar</button><br><br>
</div>
</div>
<div id='FrontEnd'>
</div>
</center>
</article>
</section>
<footer class='footer2'>
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
