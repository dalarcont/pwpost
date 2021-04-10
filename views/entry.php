<?php 
session_start();
    /*Entry print*/

    //This provides to the viewers if an entry was edited and how many times was affected.
    function editLogger($count,$lastdate){
        //If there is a 1 single or more edits attached to an entry, let print it's respective data
        if($count!=0){
            //There is affections attached to the entry across the time
            $r = "<span class='rightUp_entryLegend'>Ediciones: ".$count." - Ùltima edición: ".$lastdate."</span>";
        }

        return $r;
    }

    //If an entry is property of the same logged user in system, it will show actions buttons
    function entryActions_selector($pkg){

        if($pkg['own_user']!=$_SESSION['UsrPkg']['username']){
            //Isn't the same user
            //Then disable Edit(), Delete(), Hide()/Unhide() edit, delete and hide functions
            echo "<tr>
                <th colspan='5'>",$pkg['title'],"</th>
                <th style='width:45px'><button class='btn btn-light' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:28px;height:28px;'></img></button></th>
            </tr>";
        }else{
            //Entry owner is the same as logged user
            echo "<tr>
            <th colspan='2'>",$pkg['title'],"</th>
            <th style='width:45px'><button class='btn btn-light' onclick='letUpd(this)' value='",$pkg['uuid_post'],"'><img src='components/edit.png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-light' onclick='letRem(this)' value='",$pkg['uuid_post'],"'><img src='components/delete.png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-light' onclick='",hidden_FxSelector($pkg['hiddenprop']),"(this)' value='",$pkg['uuid_post'],"' ><img src='components/",hidden_imgSelector($pkg['hiddenprop']),".png' style='width:25px;height:25px;'></img></button></th>
            <th style='width:45px'><button class='btn btn-light' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:25px;height:25px;'></img></button></th>
            </tr>";
        }
        
    }

    //Show the entry
    function printEntrie($pkg){
        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        if($pkg!=null){
            //In this statement, means that the system will show at least 1 entry
            echo "<div>
                ",editLogger($pkg['edit_counter'],$pkg['edit_lastdate']),"
                <table class='blueTable' style='height: 85px;'>
                <thead>
                    ",entryActions_selector($pkg),"
                </thead>
                <tbody>
                <tr>
                <td colspan='6' style='height:85px'>",$pkg['content'],"</td>
                </tr>
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
    
    
?>