<?php
session_start();
    if(empty($_GET['p'])){
        $profile_username = $_SESSION['UsrPkg']['username'];
    }else{
        $profile_username = $_GET['p'];
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
<?php 
echo "<script>
$.post('controllers/ProfileManager.php', {path:'PV',p:'".$_GET['p']."'},function(sucess){
    $('#FrontEnd').html(sucess);
});
</script>";
?>
<body>

<?php echo '<input type="hidden" id="isOnProfile" value="',$profile_username,'"></input>'; ?>
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
                    echo "<div id='actionsMenu'><br>
                    <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Nueva entrada</button>
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
           <?php 
           /*
                We need to know if the logged user follows this user
                Also we need to know if this profile follows the logged user
            
                
                if(!empty($_SESSION['UsrPkg'])){

                    echo "<br><button class='btn btn-info' onclick='showFollowed()'>Seguidos</button>&nbsp;&nbsp;&nbsp;<button id='PeopleList' class='btn btn-info' onclick='showFollowers()'>Seguidores</button><br>";

                    if($profile_username!=$_SESSION['UsrPkg']['username']){
                        //Chek if this profile follows logged user
                        if(DB_VerifyFollow($_SESSION['UsrPkg']['username'],$profile_username)){
                            //Print 'Unfollow' FxButton
                            echo "<span id='followStatus' class='followStatus'>&nbsp;&nbsp;ESTE PERFIL TE SIGUE&nbsp;&nbsp;</span>";
                        }

                        //Check if the logged user follows this profile
                        if(DB_VerifyFollow($profile_username,$_SESSION['UsrPkg']['username'])){
                            //Print 'Unfollow' FxButton
                            echo "<br><button id='fxFollow' class='btn btn-danger' onclick='UnsetFollow(null)'>Dejar de seguir</button><br>";
                        }else{
                            echo "<br><button id='fxFollow' class='btn btn-success' onclick='SetUpFollow(null)'>Seguir</button><br>";
                        }

                        
                    }
                }*/
           ?>
           </div>
           <div id="main">
           <!-- Keep this DIV empty for this page because it will be used for new post dialog with user mention-->
           </div>
           <div id='profileResume'></div>
           <div id="FrontEnd">
           </div>
           </center>
       </article>
    </section>
</body>
</html>