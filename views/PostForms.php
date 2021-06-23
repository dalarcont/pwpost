<?php 

    function Form_New(){
        echo  "<div id='form_newPost' title='".Form_newEntry::Fields(0)."' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='newEntry_title' placeholder='".Form_newEntry::Fields(1)."' style='width:450px'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
                <textarea id='newEntry_content' style='width:500px;height:280px;resize:none' placeholder='".Form_newEntry::Fields(2)."'></textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' onclick='".Form_newEntry::ScriptLang()."'>".Form_newEntry::Fields(3)."</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_newPost').dialog({height:450,width:550});</script>
        ";
    }

    function Form_Edit($title,$content,$postid){
        $md1 = hash("md5",$title);
        $md2 = hash("md5",$content);
        echo  "<input type='hidden' id='editpostid' value='",$postid,"'>
        <input type='hidden' id='alterationControl_t' value='",$md1,"'>
        <input type='hidden' id='alterationControl_c' value='",$md2,"'>
        <div id='form_editPost' title='".Form_newEntry::Fields(4)."' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='editEntry_title' placeholder='".Form_newEntry::Fields(5)."' style='width:450px' onkeyup='ButtonSetUpUpdatePost(this)' value='",$title,"'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
            <i style='color:black'>".Form_newEntry::Fields(6)."</i><br>
                <br><textarea id='editEntry_content' style='width:500px;height:280px;resize:none' placeholder='".Form_newEntry::Fields(2)."' onkeyup='ButtonSetUpUpdatePost(this)'>",$content,"</textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' id='updBtn' style='display:none;' onclick='SetUpUpdatePost()'>".Form_newEntry::Fields(7)."</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_editPost').dialog({height:550,width:650});</script>
        ";
    }

    function Form_Repost($rp_src,$rp_t,$rp_c){
        echo  "<div id='form_rePost' title='".Form_newEntry::Fields(8)."' style='display:none;'><center>
        <input type='hidden' id='repostsourceid' value='",$rp_src,"'>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='reEntry_title' placeholder='".Form_newEntry::Fields(13)."' style='width:450px'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
                <textarea id='reEntry_content' style='width:500px;height:150px;resize:none' placeholder='".Form_newEntry::Fields(9)."'></textarea>
            </td>
            </tr>
            <tr class='tdrp'>
            <td colspan='1'  >
                <span><i>".Form_newEntry::Fields(10).":</i></span><br><b>",$rp_t,"</b>
            </td>
            </tr>
            <tr class='tdrp'>
            <td colspan='1'  >
                <span><i>".Form_newEntry::Fields(11).":</i></span><br><b>",$rp_c,"</b>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' onclick='".Form_newEntry::ScriptLang_R()."'>".Form_newEntry::Fields(12)."</button>
                </td>
            </tr>
            </tbody>
            </table><br> 
                </center>
                </div>
                <script>$('#form_rePost').dialog({height:450,width:650});</script>
        ";
    }

    function Form_TwNew($x,$y){
        echo  "<div id='form_TwNewPost' title='Twitter' style='display:none;'><center>
            <table class='blueTable' style='height:95%; width:95%'>
            <thead>
                <tr>
                <th colspan='1' style='height:30px'>
                    <input type='text' id='tw_add_title' placeholder='".Twitter::dialogText(0)."' style='width:450px'>
                </th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td colspan='1'  >
                <textarea id='tw_add_content' style='width:500px;height:280px;resize:none' placeholder='".Twitter::dialogText(1)."'></textarea>
            </td>
            </tr>
            <tr>
            <td colspan='1'>
            <button class='btn btn-light' onclick=SetUp_TwPost('".$x."','".$y."')>".Form_newEntry::Fields(3)."</button>
                </td>
            </tr>
            </tbody>
            </table><br>        


                </center>
                </div>
                <script>$('#form_TwNewPost').dialog({height:450,width:550});</script>
        ";
    }


?>
