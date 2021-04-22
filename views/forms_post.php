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
        $md1 = hash("md5",$title);
        $md2 = hash("md5",$content);
        echo  "<input type='hidden' id='editpostid' value='",$postid,"'>
        <input type='hidden' id='alterationControl_t' value='",$md1,"'>
        <input type='hidden' id='alterationControl_c' value='",$md2,"'>
        <div id='form_editPost' title='Editar entrada' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='editEntry_title' placeholder='Título del post' style='width:450px' onkeyup='updtng(this)' value='",$title,"'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
            <i style='color:black'>No se habilitará el botón hasta que hagas una modificación.<br>El solo hecho de añadir un espacio o cualquier elemento y dejarlo o hasta incluso borrarlo para dejar el contenido intacto se considerará como actualización de entrada.</i><br>
                <br><textarea id='editEntry_content' style='width:500px;height:280px;resize:none' placeholder='Escribe el contenido de tu post&#10Recuerda que el sistema lee etiquetas HTML por si lo deseas' onkeyup='updtng(this)'>",$content,"</textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' id='updBtn' style='display:none;' onclick='postEdit()'>Actualizar</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_editPost').dialog({height:550,width:650});</script>
        ";
    }


?>
