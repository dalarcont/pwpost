<?php
    //Get the post ID
    $post_id = $_GET['post'];

    //Call control file
    require 'controllers/PostView.php';
    require 'views/Language.php';

?><!DOCTYPE html>
<html lang="es">
<head>
<title>PWPost - <?php PostPage::title(); echo " "; echo $r_title; ?></title>
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
<header>
<br>
        <img src='components/favicon.ico' style='width:32px;height:32px;'></img>  <h2>PWPost!</h2>
    <?php 
        //Show navigation bar if is a logged user
        if(!empty($_SESSION['UsrPkg'])){
            //Session is set, that mean that an user is logged on
            PostPage::NavBar();
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
                    PostPage::EntryPrivateAlertText();
                }else{
                    //The entry isn't private OR the entry is private but the logged user is the owner of that entry
                    PrintEntry($result); 
                    //Print version controlling of the entry
                    VersionControlStatement($result['edit_counter'],$post_id);
                }
                ?>
           </div>
           </center>
       </article>
    </section>
    <footer>
        <div>
            <?php indexPage::footer(); ?>
            2021-1<br>
            Daniel Alarcón</span>
        </div>
        
    </footer>
</body>
</html>