<?php 
session_start();
    /*Entrie print*/


    function editLogger($count,$lastdate){
        //If there is a 1 single or more edits attached to an entry, let print it's respective data
        if($count!=0){
            //There is affections attached to the entry across the time
            $r = "<span class='rightUp_entryLegend'>Ediciones: ".$count." - Ùltima edición: ".$lastdate."</span>";
        }

        return $r;
    }

    function printEntrie($pkg){

            /*echo "<div class='grid-conainer'>
            <div class='entry_title'>_TITLE_DATA_</div>
            <div class='entry_edit'>EDIT_BTN</div>
            <div class='entry_repost'>RPT_BTN</div>
            <div class='entry_hide'>HD_BTN</div>
            <div class='entry_delete'>RM_BTN</div>
            <div class='entry_content'>_CONTENT_DATA_</div>     
            <div class='entry_pubdate'>_PUBDATE_</div>
            <div class='entry_editlog'>_COUNTERDATA</div>
          </div>";*/

        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        if($pkg!=null){
            if($pkg['own_user']!=$_SESSION['UsrPkg']['username']){
                //The owner of the respectively entrie isn't the same as the logged user
                //Then disable Edit(), Delete(), Hide()/Unhide() edit, delete and hide functions
                echo "<div>
                    <table class='blueTable' style='height: 85px;'>
                    <thead>
                        <tr>
                            <th colspan='5'>",$pkg['title'],"</th>
                            <th><button class='btn btn-light' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:28px;height:28px;'></img></button></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td colspan='6'>",$pkg['content'],"</td>
                    </tr>
                    <tr>
                    <td colspan='6'>
                        <span id='publishData'>Publicado por: <b>
                            <a href='profile.php?p=",$pkg['own_user'],"' target='_blank'>",$pkg['own_user'],"</a></b> - 
                            Fecha de publicación: <a href='viewPost.php?post=",$pkg['uuid_post'],"' target='_blank'>",$pkg['pubdate'],"</a>
                            </span><br>
                            <span class='rightUp_entryLegend'>",editLogger($pkg['edit_counter'],$pkg['edit_lastdate']),"</span></td>
                    </tbody>
                    </table>
                </div><br>";
            }else{
                echo "<div>
                <span class='rightUp_entryLegend'>Edits: X - Last edit date: DD/MM/YY HH:MM:SS</span>
                <table class='blueTable' style='height: 85px;'>
                <thead>
                    <tr>
                    <th colspan='2'>",$pkg['title'],"</th>
                    <th><button class='btn btn-light' onclick='letUpd(this)' value='",$pkg['uuid_post'],"'><img src='components/edit.png' style='width:25px;height:25px;'></img></button></th>
                    <th><button class='btn btn-light' onclick='letRem(this)' value='",$pkg['uuid_post'],"'><img src='components/delete.png' style='width:25px;height:25px;'></img></button></th>
                    <th><button class='btn btn-light' onclick='",hidden_FxSelector($pkg['hiddenprop']),"(this)' value='",$pkg['uuid_post'],"' ><img src='components/",hidden_imgSelector($pkg['hiddenprop']),".png' style='width:25px;height:25px;'></img></button></th>
                    <th><button class='btn btn-light' onclick='letRep(this)' value='",$pkg['uuid_post'],"'><img src='components/repost.png' style='width:25px;height:25px;'></img></button></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <td colspan='6'>",$pkg['content'],"</td>
                </tr>
                <tr>
                <td colspan='6'><span id='publishData'>Publicado por: <b><a href='profile.php?p=",$pkg['own_user'],"' target='_blank'>",$pkg['own_user'],"</a></b> - Fecha de publicación: <a href='viewPost.php?post=",$pkg['uuid_post'],"' target='_blank'>",$pkg['pubdate'],"</a></span></td>
                </tr>
                </tbody>
                </table></div>";
            }
        }else{
            echo "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img></button>";
        }
    }
    
    
?>