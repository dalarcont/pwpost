<?php


    //We need to call DB method because this file is only called by a keyup control
    require 'SYS_DB_CON.php';
    require '../views/Language.php';
    if(isset($_POST['username'])){
        $username = mysqli_real_escape_string(DB_CON(), $_POST['username']);
        $SQL_QUERY = "SELECT username FROM users WHERE USERNAME = '$username'";
        if(!$result = mysqli_query(DB_CON(), $SQL_QUERY)){
            exit(mysqli_error(DB_CON()));
        }

        if(mysqli_num_rows($result) > 0){
            //There is a user with the same username, can't create a profile with same username
            echo "<span style='color:red'>".MakeIdentity::auxField()."<b>'$username'</b>".MakeIdentity::usernameCheck(0)."</span>";
            echo "<script>$('#isOk_2').val('false');</script>";
        }else{
            echo "<span style='color:green'>".MakeIdentity::auxField()."<b>'$username'</b>".MakeIdentity::usernameCheck(1)."</span>";
            echo "<script>$('#isOk_2').val('true');</script>";
        }

        DB_CON_CLOSE($result,DB_CON());
    }

?>