<?php 
    //Print entries
    function PrintProfile_Empty(){
        ProfileViewer::profileInformationText(0);
    }

    //User haven't post any entry
    function PrintProfilePublic_Empty(){
        ProfileViewer::profileInformationText(1);
    }

    //Profile doesn't have liked post
    function PrintEmptyLikedPost(){
        ProfileViewer::profileInformationText(2);
    }

    //Profile doesn't exists or incorrect profile parameter
    function PrintProfileNonexistence(){
        ProfileViewer::profileInformationText(3);
    }

    //Show profile resume grid
    function ProfileResume($type,$data,$visitor){
        
        function profileFollowLegend($fbstat){
            //Normal procedure
            if($fbstat){
                //User follows
                return "<span id='followStatus' class='followStatus'>&nbsp;&nbsp;".ProfileViewer::followLegend(0)."&nbsp;&nbsp;</span>";
            }else{
                //User doesnt follow
                return "<span id='followStatus' class='followStatusNull'>&nbsp;&nbsp;".ProfileViewer::followLegend(1)."&nbsp;&nbsp;</span>";
            }
        }

        function profileFollowButtonSelector($fstat,$object){
            if($fstat){
                //User follows
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>".Follow::unfollowButton()."</button>";
            }else{
                //User doesnt follow
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-success' onclick=SetUpFollow(this)>".Follow::followButton()."</button>";
            }            
        }

        function ProfileResumeHeader($type,$data,$visitor){
            if($type=="private"){
                //true = Can show all data, i.e. is viewing from a logged profile
                //BUT only show name and user if the visited profile is the same as the logged user
                if($visitor==$data['usuario']){
                    //Logged user wants to see its own profile
                    return "<tr>
                    <th colspan='2'>".$data['nombreCompleto']."</th>
                    <th colspan='2'>@".$data['usuario']."</th>
                    </tr>";
                }else{
                    //Logged user wants to see other profile that isn't its own
                    return "<th id='profileResume_name'>".$data['nombreCompleto']."</th>
                    <th id='profileResume_user'>@".$data['usuario']."</th>
                    <th id='profileResume_fbs'>".profileFollowLegend($data['followBack'])."</th>
                    <th id='profileResume_btn'>".profileFollowButtonSelector($data['followStatus'],$data['usuario'])."</th>";
                }
            }else{
                //Anyone form public wants to see a profile
                return "<tr>
                <th colspan='2'>".$data['nombreCompleto']."</th>
                <th colspan='2'>@".$data['usuario']."</th>
                </tr>";
            }
        }

        function followDataFrameButtons($type,$button){
            if($type=="private"){
                //Can show all data but according the button
                switch($button){
                    case 1:
                        return "<button class='btn btn-info' id='btn_showpeople' onclick='showFollowed()' >".ProfileViewer::followListsPeople(0)."</button>";
                    break;

                    case 2:
                        return "<button class='btn btn-info' id='btn_showpeople' onclick='showFollowers()' >".ProfileViewer::followListsPeople(1)."</button>";
                    break;
                }
            }else{
                switch($button){
                    case 1:
                        return ProfileViewer::followListsPeople(0);
                    break;

                    case 2:
                        return ProfileViewer::followListsPeople(1);
                    break;
                }
            }
        }

        function NeutralNumbers($x){
            if($x<0){return "0";}else{return $x;}
        }

        echo "<div id='profileResumeTable'><table class='profileResumeTable'>
        <thead>
        ".ProfileResumeHeader($type,$data,$visitor)."
        </thead>
        <tbody>
        <tr>
        <td colspan='2'>".ProfileViewer::PeopleListText(0).":</td>
        <td colspan='2'>".$data['fechaRegistro']."</td>
        </tr>
        <tr>
        <td colspan='2'>".ProfileViewer::PeopleListText(1).":</td>
        <td colspan='2'>".$data['cantidadPublicaciones']."</td>
        </tr>
        <tr>
        <td colspan='2'>".followDataFrameButtons($type,1)."</td>
        <td colspan='2'>".NeutralNumbers($data['cantidadSeguidos'])."</td>
        </tr>
        <tr>
        <td colspan='2'>".followDataFrameButtons($type,2)."</td>
        <td colspan='2'>".NeutralNumbers($data['cantidadSeguidores'])."</td>
        </tr>
        </tbody>
        </table>
        </div>";
        
    }

    function ShowFollowData($mode,$data,$aux,$whoIsOnline){

        //Dialog title
        if($mode==true){
            //1N means 1 to much, i.e. list all people followed by the user
            $modeName = ProfileViewer::PeopleListFollowText(0).$aux."";
            $followBackField = true;
        }else{
            $modeName = ProfileViewer::PeopleListFollowText(1).$aux."";
            $followBackField = false;
        }

        function buttonSelector($mode,$object,$status){
            if($mode==true){
                //Always show this button because we are showing the users followed by the logged user, isn't logic if we show a 'Follow' button related to a user that the logged user follows already
                return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>".Follow::unfollowButton()."</button>";
            }else{
                //System will show the people who is following the logged user, may someone of these isn't followed by the logged user, then use a selector
                if($status==true){
                    //Some follower is followed by the logged user
                    return "<button id='btn-".$object."' role='".$object."' class='btn btn-danger' onclick=UnsetFollow(this)>".Follow::unfollowButton()."</button>";
                }else{
                    //Some follower isn't followed by the logged user
                    return "<button id='btn-".$object."' role='".$object."' class='btn btn-success' onclick=SetUpFollow(this)>".Follow::followButton()."</button>";
                }
            }
        }

        function followBackLegend($x){

            switch($x){
                case true:
                    return "<span id='followStatus' class='followStatus'>&nbsp;&nbsp;".ProfileViewer::followLegend(0)."&nbsp;&nbsp;</span>";
                break;

                case false:
                    return "<span id='followStatus' class='followStatusNull'>&nbsp;&nbsp;".ProfileViewer::followLegend(1)."&nbsp;&nbsp;</span>";
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
                    <td id='username'><span id='followStatus' class='followStatus'>&nbsp;&nbsp;".ProfileViewer::PeopleListSameUser(0)."&nbsp;&nbsp;</span></td>
                    <td id='action'><button class='btn btn-info'>".ProfileViewer::PeopleListSameUser(1)."</button></td></tr>";
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