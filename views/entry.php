<?php 
session_start();

    /*Entry print*/

    //This provides to the viewers if an entry was edited and how many times was affected.
    function editLogger($count,$lastdate){
        //If there is a 1 single or more edits attached to an entry, let print it's respective data
        if($count!=0){
            //There is affections attached to the entry across the time
            $r = "Ediciones: ".$count." - Ùltima edición: ".$lastdate."";
        }

        return $r;
    }

    //If an entry is property of the same logged user in system, it will show actions buttons
    function entryActions_selector($pkg){

        if($pkg['own_user']!=$_SESSION['UsrPkg']['username']){
            //Isn't the same user
            //Then disable Edit(), Delete(), Hide()/Unhide() edit, delete and hide functions
            echo "<tr>
                <th id='entryTitle' colspan='5'>",$pkg['title'],"</th>
                <th style='width:45px'><button class='btn btn-light' id='btn_repost' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:28px;height:28px;'></img></button></th>
            </tr>";
        }else{
            //Entry owner is the same as logged user
            echo "<tr>
            <th id='entryTitle' colspan='2'>",$pkg['title'],"</th>
            <th style='width:45px'><button class='btn btn-info' id='btn_edit' onclick='letUpd(this)' value='",$pkg['uuid_post'],"'><img src='components/edit.png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-danger' id='btn_del' onclick='letRem(this)' value='",$pkg['uuid_post'],"'><img src='components/delete.png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-warning' id='btn_hide' onclick='",hidden_FxSelector($pkg['hiddenprop']),"(this)' value='",$pkg['uuid_post'],"' ><img src='components/",hidden_imgSelector($pkg['hiddenprop']),".png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-light' id='btn_repost' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:25px;height:25px;'></img></button></th>
            </tr>";
        }
        
    }

    //If an entry is a repost of another one, let print another row to show it
    function entryAttached($pkg){
        if($pkg['attached_prop']!=0){
            //There is an attached entry, post its content while the attached post exists
            if(!$pkg['attached_content']){
                //The attached entry is private or was deleted.
                echo "<tr><td colspan='6' style='height:85px;'><b><i>Esta entrada es un repost de otra que está privada o fue eliminada.</i></b></td></tr>";
            }else{
                //The attached entry is available
                echo "<tr><td colspan='6' style='height:45px;'>Repost a entrada de: <a href='profile.php?p=",$pkg['attached_user'],"' target='_blank'><b>@",$pkg['attached_user'],"</b></a> : '",$pkg['attached_title'],"'</td></tr>";
                echo "<tr><td colspan='6' style='height:85px;'><i>",$pkg['attached_content'],"</i></td></tr>";
                echo "<tr><td colspan='6'><a href='viewPost.php?post=",$pkg['attached_uuid_post'],"' target='_blank'>Ver original del post adjunto</a></td></tr>";
            }
            
        }
        
    }

    //Show the entry
    function printEntry($pkg){
        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        
        if($pkg!=null){
            
            //In this statement, means that the system will show at least 1 entry
            echo "<div id='",$pkg['uuid_post'],"'>
                <span id='entryEdits' class='rightUp_entryLegend'>
                    ",editLogger($pkg['edit_counter'],$pkg['edit_lastdate']),"
                </span>
                    
                <table class='blueTable' style='height: 85px;'>
                <thead>
                    ",entryActions_selector($pkg),"
                </thead>
                <tbody>
                <tr>
                    <td  id='entryContent' colspan='6' style='height:85px'>",$pkg['content'],"</td>
                </tr>
                    ",entryAttached($pkg),"
                <tr>
                <td colspan='6'>
                    <span id='publishData'>Publicado por: <b>
                        <a href='profile.php?p=",$pkg['own_user'],"' target='_blank'>",$pkg['own_user'],"</a></b> - 
                        Fecha de publicación: <a href='viewPost.php?post=",$pkg['uuid_post'],"' target='_blank'>",$pkg['pubdate'],"</a>
                    </span><br>
                </td>
                </tbody>
                </table>
            </div><br>";
        }else{
            //System doesn't have any entry to show, that means the user haven't published an entry or follow nobody.
            echo "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img></button>";
        }
    }

    function printEntry_forHTML($pkg){
        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        
        if($pkg!=null){
            
            //In this statement, means that the system will show at least 1 entry
            $data = "<div id='".$pkg['uuid_post']."'>
                <span id='entryEdits' class='rightUp_entryLegend'>
                    ".editLogger($pkg['edit_counter'],$pkg['edit_lastdate'])."
                </span>
                    
                <table class='blueTable' style='height: 85px;'>
                <thead>
                    ".entryActions_selector($pkg)."
                </thead>
                <tbody>
                <tr>
                    <td  id='entryContent' colspan='6' style='height:85px'>".$pkg['content']."</td>
                </tr>
                    ".entryAttached($pkg)."
                <tr>
                <td colspan='6'>
                    <span id='publishData'>Publicado por: <b>
                        <a href='profile.php?p=".$pkg['own_user']."' target='_blank'>".$pkg['own_user']."</a></b> - 
                        Fecha de publicación: <a href='viewPost.php?post=".$pkg['uuid_post']."' target='_blank'>".$pkg['pubdate']."</a>
                    </span><br>
                </td>
                </tbody>
                </table>
            </div><br>";
        }else{
            //System doesn't have any entry to show, that means the user haven't published an entry or follow nobody.
            $data = "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img></button>";
        }

        return $data;
    }
    
    
?>