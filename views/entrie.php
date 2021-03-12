<?php 
session_start();
    /*Entrie print*/
    
    function printEntrie($pkg){
        if($pkg!=null){
            if($pkg['own_user']!=$_SESSION['UsrPkg']['username']){
                //The owner of the respectively entrie isn't the same as the logged user
                //Then disable edit, delete and hide functions
                echo "<br>
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
                    <td colspan='6'><span id='publishData'>Publicado por: <b><a href='profile.php?p=",$pkg['own_user'],"' target='_blank'>",$pkg['own_user'],"</a></b> - Fecha de publicación: <a href='viewPost.php?post=",$pkg['uuid_post'],"' target='_blank'>",$pkg['pubdate'],"</a></span></td>
                    </tr>
                    </tbody>
                    </table><br>";
            }else{
                echo "<br>
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
                </table><br>";

            }
        }else{
            echo "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>
            <button class='art-button' onclick='letPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img></button>";
        }
    }
    
    
?>