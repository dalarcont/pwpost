<?php

    //We need to call DB method because this file is only called by a keyup control
    include 'SYS_DB_CON.php';

    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string(DB_CON(), $_POST['email']);
        $SQL_QUERY = "SELECT user_email FROM users WHERE user_email = '$email'";
        if(!$result = mysqli_query(DB_CON(), $SQL_QUERY)){
            exit(mysqli_error(DB_CON()));
        }

        if(mysqli_num_rows($result) > 0){
            //There is a user with the same email, can't create a profile with same email
            echo "<span style='color:red'>Email <b>'$email'</b> pertenece a otro usuario!</span>";
            echo "<script>$('#isOk_3').val('false');</script>";
        }else{
            //The input email address isn't used by other user
            echo "<span style='color:green'>Email <b>'$email'</b> está libre de asociación!</span>";
            echo "<script>$('#isOk_3').val('true');</script>";
        }
    }

?>