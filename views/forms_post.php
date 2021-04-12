<?php 

    session_start();

    function form_newPost(){
        echo  "<div id='form_newPost' title='Nueva entrada' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='newEntry_title' placeholder='Título del post' style='width:450px'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
                <textarea id='newEntry_content' style='width:500px;height:280px;resize:none' placeholder='Escribe el contenido de tu post&#10Recuerda que el sistema lee etiquetas HTML por si lo deseas'></textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' onclick='doPost()'>Publicar</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_newPost').dialog({height:450,width:550});</script>
        ";
    }


    function form_editPost($title,$content,$postid){
        echo  "<input type='hidden' id='editpostid' value='",$postid,"'>
        <div id='form_editPost' title='Editar entrada' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='editEntry_title' placeholder='Título del post' style='width:450px' value='",$title,"'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
                <textarea id='editEntry_content' style='width:500px;height:280px;resize:none' placeholder='Escribe el contenido de tu post&#10Recuerda que el sistema lee etiquetas HTML por si lo deseas'>
                ",$content,"</textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' onclick='postEdit()'>Publicar</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_editPost').dialog({height:450,width:550});</script>
        ";
    }


?>
