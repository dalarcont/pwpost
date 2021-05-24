<?php
session_start();
    if(empty($_GET['p'])){
        //URL hasn't indicate a profile username
        $profile_username = null ;
    }else{
        //There is a profile indicated on URL
        $profile_username = $_GET['p'];
        if(empty($_SESSION['UsrPkg'])){
            //There is no one logged, all data will be display as public viewing
            $mode = null;
        }else{
            //Someone is logged, let show extra data
            $mode = "PV";
        }
    }
    
    //Call procedure files
        require 'procedures/SYS_DB_CON.php';
        require 'procedures/FollowingData.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>PWPost - Perfil de <?php echo $_GET['p']; ?></title>
<meta charset="utf-8" />
<meta name="description" content="Página para publicar cosas tipo post o twitter">
<link rel="stylesheet" href="css/final.css">
<link rel="stylesheet" href="css/entryStyle.css">
<link rel='stylesheet' href='css/profileTable.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="plugins/jqueryui/jquery-ui.js"></script>
<link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css">
<script src="plugins/alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="plugins/alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="plugins/alertifyjs/css/themes/default.min.css" />
<script src="components/SystemScripts.js"></script>
<link rel="shortcut icon" href="components/favicon.ico" type="image/x-icon">

</head>
<body>
<?php echo '<input type="hidden" id="isOnProfile" value="',$profile_username,'"></input>'; ?>
<?php echo "<script>ProfileView('".$mode."','".$profile_username."');</script>"; ?>
    <header>
    <br>
        <img src='components/favicon.ico' style='width:32px;height:32px;'></img>  <h2>PWPost!</h2>
        <?php 
                if(!empty($_SESSION['UsrPkg'])){
                    //Session is set, that mean that an user is logged on
                    echo "<nav>
                    <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
                    <a href='#' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
                    <a href='#' id='logOff'>Salir</a>
                    </nav>
                </header>";} 
            ?><br>
    <section>
    <?php 
                if(!empty($_SESSION['UsrPkg'])){
                //Session is set, that mean that an user is logged on
                    echo "
                    <div id='actionsMenu'>
                        <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Nueva entrada</button><br><br>
                    </div>
                    <div id='MoreEntry'>
                        <button class='btn btn-info' onclick='BottomPage()'><img src='components/down.png' style='width:25px;height:25px;'></img> Ir abajo</button>
                    </div>
                    <div id='minusEntry'>
                        <button class='btn btn-info' onclick='TopPage()'><img src='components/up.png' style='width:25px;height:25px;'></img> Ir arriba</button>
                    </div>
                    ";

                }
            ?>
       <article>
           <center>
           <div id="aux">
           </div>
           <div id="main">
           <!-- Keep this DIV empty for this page because it will be used for new post dialog with user mention-->
           </div>
           <div id="FrontEnd">
           </div>
           </center>
       </article>
    </section>
</body>
</html>