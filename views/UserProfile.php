<?php 
    
    //Resume of profile
    function Print_ProfileResume($pkg){
        echo "<div id='contentProfileDescription'>
        <br><p>Nombre completo: <b>".$pkg['user_fullname']."</b>-Correo electrónico: <b>".$pkg['user_email']."</b><br>
        <i>Tu correo no será visible ante el público.</i> -Fecha de registro: <b>".$pkg['joindate']."</b></p>
        <button class='btn btn-info' id='btn_showpeople' onclick=showFollows(1,'') >Seguidos</button><span style='padding-left:55px;'></span><button class='btn btn-info' id='btn_showpeople' onclick=showFollows(2,'') >Seguidores</button><br>
        <button class='btn btn-danger' style='margin-top:15px;' id='btn_hide' onclick=startRemovePostoveProfile(".$_SESSION['UsrPkg']['username'].")>Eliminar mi perfil</button><p><br \></p></div>"; 
    }

    function Print_ProfileResumePublic($pkg){
        echo "<div id='contentProfileDescription'><p>Nombre completo: <b>".$pkg['user_fullname']."</b><br>Fecha de registro: <b>".$pkg['joindate']."</b></p></div>";
    }

    //Print entries
    function PrintProfile_Empty(){
        echo "<br>No has publicado algo, por algo tu perfil está vacío.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Publicar algo...</button>";
    }

    //User haven't post any entry
    function PrintProfilePublic_Empty(){
        echo "<br>Este usuario no ha publicado nada.<br>Visita este perfil después.<br>";
    }

    //Profile doesn't exists or incorrect profile parameter
    function PrintProfileNonexistence(){
        echo "<big>Este usuario no existe o no está disponible temporalmente.</big>";
    }

    function ShowFollowData($mode,$data){

        if($mode=="1N"){
            //1N means 1 to much, i.e. list all people followed by the user
            $modeName = "Seguidos";
        }else{
            $modeName = "Seguidores";
        }
        //Show the followers or the people followed of an user
        echo  "<div id='form_newPost' title='".$modeName."' style='display:none;'>
        <link rel='stylesheet' href='css/followTable.css' />
        <center>
            <table class='followTable'>
            <tbody>
            <tr>
            <td id='usrpic'>USR</td>
            <td id='username'>USERNAME</td>
            <td id='name'>NOMBRE</td>
            <td id='action'>ACTION</td>
            </tr>";
            $size  = count($data);

            echo"
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>";


            echo"
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>
            <tr>
            <td>X</td>
            <td>FULANITO</td>
            <td>FULANITO DEL CARMEN CONTRERAS</td>
            <td>BUTTON</td>
            </tr>";






            echo "
            </tbody>
            </table>    
        </center>
        </div>
        <script>$('#form_newPost').dialog({height:450,width:550});</script>
        ";

    }
    
    
?>