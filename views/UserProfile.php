<?php 
    
    //Resume of profile
    function Print_ProfileResume($pkg){
        echo  "<div id='contentProfileDescription'>
        <br><p>Nombre completo: <b>".$pkg['user_fullname']."</b>-Correo electrónico: <b>".$pkg['user_email']."</b><br>
        <i>Tu correo no será visible ante el público.</i> -Fecha de registro: <b>".$pkg['joindate']."</b></p>
        <button class='btn btn-info' id='btn_showpeople' onclick='showFollowed()' >Seguidos</button><span style='padding-left:55px;'></span><button class='btn btn-info' id='btn_showpeople' onclick='showFollowers()' >Seguidores</button><br>
        <button class='btn btn-danger' style='margin-top:15px;' id='btn_hide' onclick='startRemovePostoveProfile(".$_SESSION['UsrPkg']['username'].")'>Eliminar mi perfil</button><p><br \></p></div>"; 
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

    //Show profile resume grid
    function ProfileResume($type,$data){
        
        function profileFollowLegend($fbstat){
                //decide what legend show if the profile follows the logged user
                if($fbstat){
                    //User follows
                    return "<span id='followStatus' class='followStatus'>&nbsp;&nbsp;TE SIGUE&nbsp;&nbsp;</span>";
                }else{
                    //User doesnt follow
                    return "<span id='followStatus' class='followStatusNull'>&nbsp;&nbsp;NO TE SIGUE&nbsp;&nbsp;</span>";
                }
        }

        function profileFollowButtonSelector($fstat,$object){
            //decide what button show if logged user follows or not the user profile
            if($fstat){
                //User follows
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>Dejar de seguir</button>";
            }else{
                //User doesnt follow
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-success' onclick=SetUpFollow(this)>Seguir</button>";
            }
        }

        function ProfileResumeHeader($type,$data){
            if($type=="private"){
                //true = Can show all data, i.e. is viewing from a logged profile
                echo "<th>".$data['nombreCompleto']."</th>
                <th>".$data['usuario']."</th>
                <th>".profileFollowLegend($data['followBack'])."</th>
                <th>".profileFollowButtonSelector($data['followStatus'],$data['usuario'])."</th>";
            }else{echo "<tr>
                <th colspan='2'>".$data['nombreCompleto']."</th>
                <th colspan='2'>".$data['usuario']."</th>
                </tr>";
            }
        }

        function followDataFrameButtons($type,$button){
            if($type=="private"){
                //Can show all data but according the button
                switch($button){
                    case 1:
                        echo "<button class='btn btn-info' id='btn_showpeople' onclick='showFollowed()' >Seguidos</button>";
                    break;

                    case 2:
                        echo "<button class='btn btn-info' id='btn_showpeople' onclick='showFollowers()' >Seguidores</button>";
                    break;
                }
            }else{
                switch($button){
                    case 1:
                        echo "Seguidos";
                    break;

                    case 2:
                        echo "Seguidores";
                    break;
                }
            }
        }

        echo "<table class='blueTable'>
        <thead>
        ".ProfileResumeHeader($type,$data)."
        </thead>
        <tbody>
        <tr>
        <td colspan='2'>Fecha de registro</td>
        <td colspan='2'>".$data['fechaRegistro']."</td>
        </tr>
        <tr>
        <td colspan='2'>Cantidad de publicaciones:</td>
        <td colspan='2'>".$data['cantidadPublicaciones']."</td>
        </tr>
        <tr>
        <td colspan='2'>".followDataFrameButtons($type,1)."</td>
        <td colspan='2'>".$data['cantidadSeguidos']."</td>
        </tr>
        <tr>
        <td colspan='2'>".followDataFrameButtons($type,2)."</td>
        <td colspan='2'>".$data['cantidadSeguidores']."</td>
        </tr>
        </tbody>
        </table>";
        
    }

    function ShowFollowData($mode,$data,$aux,$whoIsOnline){

        //Dialog title
        if($mode==true){
            //1N means 1 to much, i.e. list all people followed by the user
            $modeName = "Seguidos por ".$aux."";
            $followBackField = true;
        }else{
            $modeName = "Seguidores de ".$aux."";
            $followBackField = false;
        }

        function buttonSelector($mode,$object,$status){
            if($mode==true){
                //Always show this button because we are showing the users followed by the logged user, isn't logic if we show a 'Follow' button related to a user that the logged user follows already
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>Dejar de seguir</button>";
            }else{
                //System will show the people who is following the logged user, may someone of these isn't followed by the logged user, then use a selector
                if($status==true){
                    //Some follower is followed by the logged user
                    return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>Dejar de seguir</button>";
                }else{
                    //Some follower isn't followed by the logged user
                    return "<button id='btn-".$object."' role='".$object."' class='btn btn-success' onclick=SetUpFollow(this)>Seguir</button>";
                }
            }
        }

        function followBackLegend($x){

            switch($x){
                case true:
                    return "<span id='followStatus' class='followStatus'>&nbsp;&nbsp;TE SIGUE&nbsp;&nbsp;</span>";
                break;

                case false:
                    return "<span id='followStatus' class='followStatusNull'>&nbsp;&nbsp;NO TE SIGUE&nbsp;&nbsp;</span>";
                break;

                default:
                    return "ERROR";
                break;
            }
        }


        //Show the followers or the people followed of an user
        echo  "<div id='PeopleListDialog' title='".$modeName."' style='display:none;'>
        <link rel='stylesheet' href='css/followTable.css' />
        <center>
            <table class='followTable'>
            <tbody>";
            $size  = count($data);
            for($i=0; $i<=($size-1); $i++){
                if($data[$i]['identificador']!=$whoIsOnline){
                    echo"
                    <tr id='".$data[$i]['identificador']."'>
                    <td id='usrpic'><img src='components/avatarNull.png' style='width:25px;height:25px;'></img></td>
                    <td id='username'><a style='color:black' href='Profile.php?p=".$data[$i]['identificador']."'>".$data[$i]['identificador']."</a></td>
                    <td id='name'>".$data[$i]['nombre']."</td>";
                    //Follow back field
                    if($followBackField){echo "<td id='username'>".followBackLegend($data[$i]['followBack'])."</td>";}
                    //Action selector
                    echo "<td id='action'>".buttonSelector($mode,$data[$i]['identificador'],$data[$i]['followBack'])."</td></tr>";
                }else{
                    echo"
                    <tr id='".$data[$i]['identificador']."'>
                    <td id='usrpic'><img src='components/avatarNull.png' style='width:25px;height:25px;'></img></td>
                    <td id='username'>".$data[$i]['identificador']."</td>
                    <td id='name'>".$data[$i]['nombre']."</td>
                    <td id='username'><span id='followStatus' class='followStatus'>&nbsp;&nbsp;ERES TÚ&nbsp;&nbsp;</span></td>
                    <td id='action'><button class='btn btn-info'>Eres tú.</button></td></tr>";
                }

            }
            echo "
            </tbody>
            </table>    
        </center>
        </div>
        <script>$('#PeopleListDialog').dialog({height:450,width:600});</script>
        ";
    }
    
    
?>