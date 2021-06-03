<?php 

    function Form_MakeIdentity(){

        echo "<div id='form_newUser' title='".FormIdentity::labels(5)."' style='display:none;'>
            <center>
            <fieldset>
            <br>
            <div class='mb-3'>
                <label for='fullname' class='form-label'>".FormIdentity::labels(0).":</label>
                <input type='text' class='form-control' id='mk_fullname' onkeyup='validatefullname();'><br>
                <input type='hidden' id='isOk_1' value='false'>
                <div id='mkmsg1'></div>

                <label for='username' class='form-label'>".FormIdentity::labels(1)."</label>
                <input type='text' class='form-control' id='mk_email' onblur='EmailValidation();' ><br>
                <div id='mkmsg3'></div>
                <input type='hidden' id='isOk_3' value='false'>
                
            
                <label for='username' class='form-label'>".FormIdentity::labels(2)."</label>
                <input type='text' class='form-control' id='mk_username' onkeyup='validateUsername();'><br>
                <input type='hidden' id='isOk_2' value='false'>
                <div id='mkmsg2'></div>
            
                
            
                <label for='password' class='form-label'>".FormIdentity::labels(3)."</label>
                <input type='password' class='form-control' id='mk_pswd' onblur='UserKeyValidation();'>
                <div id='mkmsg4'></div>
                <input type='hidden' id='isOk_4' value='false'>
            </div>
                <br>
                <span id='completedData' style='color:red'></id>
                    <button class='btn btn-primary' id='doRegistry' onclick='doMkIdentity()' style='display:none'>".FormIdentity::labels(4)."</button>
                <br><br>
            </fieldset>
            </center>
            </div>
            <script>$('#form_newUser').dialog({height:600,width:550});</script>
    ";
    }

?>