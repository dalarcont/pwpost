<?php


    //We need to call DB method because this file is only called by a keyup control
    include 'sys_db_con.php';
    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string(DB_CON(), $_POST['email']);
        $SQL_QUERY = "SELECT user_email FROM pi_users WHERE user_email = '$email'";
        if(!$result = mysqli_query(DB_CON(), $SQL_QUERY)){
            exit(mysqli_error(DB_CON()));
        }

        if(mysqli_num_rows($result) > 0){
            //There is a user with the same email, can't create a profile with same email
            echo "<span style='color:red'>Email <b>'$email'</b> pertenece a otro usuario!</span>";
            echo "<script>$('#availableControl2').val('false');  $('#doRegistry').prop('disabled', true);</script>";
        }else{
            echo "<span style='color:green'>Email <b>'$email'</b> está libre de asociación!</span>";
            echo "<script>$('#availableControl2').val('false');  $('#doRegistry').prop('disabled', false);</script>";
        }
    }

?>