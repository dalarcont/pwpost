<?php
    //Get the post ID
    $post_id = $_GET['post'];

    //Call control file
    require 'controllers/viewPost.php';

?><!DOCTYPE html>
<html lang="es">
<head>
<title>PWPost - Entrada <?php echo $r_title; ?></title>
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
<script src="components/ownScripts.js"></script>
<link rel="shortcut icon" href="components/favicon.ico" type="image/x-icon">
</head>
 
<body>
<header>
        <img src='components/favicon.ico' style='width:32px;height:32px;'></img>  <h2>PWPost!</h2>
    <?php 
        //Show navigation bar if is a logged user
        if(!empty($_SESSION['UsrPkg'])){
            //Session is set, that mean that an user is logged on
            echo "<nav>
            <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
            <a href='#' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
            <a href='#' id='logOff'>Salir</a>
            </nav>
            <!-- In this page we didn't include the 'New entry' button-->";

        }
    ?>
    </header>
    
    <section>
       <article>
           <center>
           <div id="main">
           </div>
           <div id="FrontEnd">
                <br><?php 
                if($result=="PRIVATE"){
                    //The entry is private or doesn't exits
                    echo "La publicación que buscas no está disponible. Puede ser que esté privada o haya sido eliminada.";
                }else{
                    //The entry isn't private OR the entry is private but the logged user is the owner of that entry
                    printEntry($result); 
                    //Print version controlling of the entry
                    VersionControlStatement($result['edit_counter'],$post_id);
                    
                }
                
                
                
                ?>
           </div>
           </center>
       </article>
    </section>
    <!-- <footer>
        <div>
            <span class='footTxt'><br><img src='components/favicon.ico' style='width:32px;height:32px;'><br>PWPost!</span><br><span class='footTxtsign'>
            Sin derechos reservados, es tan solo un proyecto de asignatura<br>
            No ande de exigente<br>
            Final - TS5C4 - Programación Web<br>
            Tecnología en Desarrollo de Software<br>
            Universidad Tecnológica de Pereira<br>
            2021-1<br>
            Daniel Alarcón</span>
        </div>
        
    </footer>-->
</body>
</html>