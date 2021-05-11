<?php 
session_start();

    /*Entry print*/

    //This provides to the viewers if an entry was edited and how many times was affected.
    function PrintEditCounterFrame($count,$lastdate,$originalDate){
        //If there is a 1 single or more edits attached to an entry, let print it's respective data
        if($count!=0){
            //There is affections attached to the entry across the time
            $r = "Ediciones: ".$count." - Fecha de edición previa a la actual: ".$lastdate." - Fecha de publicación original: ".$originalDate;
        }

        return $r;
    }

    //If an entry is property of the same logged user in system, it will show actions buttons
    function PrintEntryActions($pkg){
        $isLoggedUser = $_SESSION['UsrPkg']['username'];
        
        if(empty($isLoggedUser)){
            //Session username is not declared. This post wants viewed from the public
            echo "<tr><th id='entryTitle' colspan='6'>",$pkg['title'],"</th></tr>";
        }else{
            //Session username is declared, compare, and show repost or not, or all actions
            if($pkg['own_user']!=$isLoggedUser){
                //Then disable Edit(), Delete(), Hide()/Unhide() edit, delete and hide functions
                echo "<tr>
                <th id='entryTitle' colspan='5'>",$pkg['title'],"</th>
                <th style='width:45px'><button class='btn btn-light' id='btn_repost' onclick='startRepost(this)' value='",$pkg['uid_post'],"'><img src='components/repost.png' style='width:28px;height:28px;'></img></button></th>
                </tr>";
            }else{
                //Entry owner is the same as logged user
                echo "<tr>
                <th id='entryTitle' colspan='2'>",$pkg['title'],"</th>
                <th style='width:45px'><button class='btn btn-info' id='btn_edit' onclick='startUpdatePost(this)' value='",$pkg['uid_post'],"'><img src='components/edit.png' style='width:25px;height:25px;'></img></button></th>
                <th style='width:45px'><button class='btn btn-danger' id='btn_del' onclick='startRemovePost(this)' value='",$pkg['uid_post'],"'><img src='components/delete.png' style='width:25px;height:25px;'></img></button></th>
                <th style='width:45px'><button class='btn btn-warning' id='btn_hide' onclick='",hidden_FxSelector($pkg['hiddenprop']),"(this)' value='",$pkg['uid_post'],"' ><img src='components/",hidden_imgSelector($pkg['hiddenprop']),".png' style='width:25px;height:25px;'></img></button></th>
                <th style='width:45px'><button class='btn btn-light' id='btn_repost' onclick='startRepost(this)' value='",$pkg['uid_post'],"'><img src='components/repost.png' style='width:25px;height:25px;'></img></button></th>
                </tr>";
            }
        }
        
    }

    //If an entry is a repost of another one, let print another row to show it
    function PrintEntryAttached($pkg){
        if($pkg['attached_prop']!=0){
            //There is an attached entry, post its content while the attached post exists
            if(!$pkg['attached_content']){
                //The attached entry is private or was deleted.
                echo "<tr><td colspan='6' style='height:85px;'><b><i>Esta entrada es un repost de otra que está privada o fue eliminada.</i></b></td></tr>";
            }else{
                //The attached entry is available
                echo "<tr><td colspan='6' style='height:45px;'>Repost a entrada de: <a href='Profile.php?p=",$pkg['attached_user'],"' target='_blank'><b>@",$pkg['attached_user'],"</b></a> : '",$pkg['attached_title'],"'</td></tr>";
                echo "<tr><td colspan='6' style='height:85px;'><i>",$pkg['attached_content'],"</i></td></tr>";
                echo "<tr><td colspan='6'><a href='Post.php?post=",$pkg['attached_uid_post'],"' target='_blank'>Ver original del post adjunto</a></td></tr>";
            }
            
        }
        
    }

    //Auxiliar counter for printEntry_VC
    function PrintEntryVersionControlCounter($version){
        if($version==0){echo "Versión original.";}else{echo "Edición #".$version;}
    }

    //Show the entry
    function PrintEntry($pkg){
        //pkg = package ; mode = define if entry is show as public (no button action) or have button if is logged some user
        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        
        if($pkg!=null){
            
            //In this statement, means that the system will show at least 1 entry
            echo "<div style='padding-top: 15px;' id='",$pkg['uid_post'],"'>
                <span id='entryEdits' class='rightUp_entryLegend'>
                    ",PrintEditCounterFrame($pkg['edit_counter'],$pkg['edit_lastdate'],$pkg['pubdate_original']),"
                </span>
                    
                <table class='blueTable' style='height: 85px;'>
                <thead>
                    ",PrintEntryActions($pkg),"
                </thead>
                <tbody>
                <tr>
                    <td  id='entryContent' colspan='6' style='height:85px'>",$pkg['content'],"</td>
                </tr>
                    ",PrintEntryAttached($pkg),"
                <tr>
                <td colspan='6'>
                    <span id='publishData'>Publicado por: <b>
                        <a href='Profile.php?p=",$pkg['own_user'],"' target='_blank'>",$pkg['own_user'],"</a></b> - 
                        Fecha de publicación: <a href='Post.php?post=",$pkg['uid_post'],"' target='_blank'>",$pkg['pubdate'],"</a>
                    </span>
                </td>
                </tbody>
                </table>
            </div>";
        }else{
            //System doesn't have any entry to show, that means the user haven't published an entry or follow nobody.
            echo "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img></button>";
        }
    }

    //Show the previous data of the entry following instructions on version control
    function PrintEntryVersionControl($pkg){
        //Verify that the data package isn't empty or null, if it's empty that means the DB isn't working properly
        //or the user that wants to load post haven't followed accounts
        
        if($pkg!=null){
             //In this statement, means that the system will show at least 1 entry
            echo "<div id='",$pkg['uid_post'],"'>
                    <span id='entryEdits' class='rightUp_entryLegend'>
                    ",PrintEntryVersionControlCounter($pkg['edit_version']),".
                </span>
                <table class='blueTable' style='height: 85px;'>
                <thead>
                <tr>
                <th id='entryTitle' colspan='5'>",$pkg['title'],"</th></tr>
                </thead>
                <tbody>
                <tr>
                    <td  id='entryContent' colspan='6' style='height:85px'>",$pkg['content'],"</td>
                </tr>
                    ",PrintEntryAttached($pkg),"
                <tr>
                <td colspan='6'>
                    <span id='publishData'>Publicado por: <b>",$pkg['own_user'],"</b> - Fecha de publicación de esta versión: ",$pkg['pubdate'],"
                    </span><br>
                </td>
                </tbody>
                </table>
            </div><br>";
        }
    }
    
    
?>