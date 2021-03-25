<?php 
    //Confirmation for first access after a signup
        require '../procedures/firstAccessChkr.php';
        require '../procedures/sys_db_con.php';
    //Code
        $code = $_POST['code'];
    //Check code integrity
        $r = checkCode($code);
        if($r){
            //Code was successfully checked and the user can enter to the system
            echo "<script>$('#main').hide();</script><span style='color:green'>El código ha sido confirmado correctamente!<br>Bienvenido(a)!</span><script>function GoToPortal() {  window.location = 'Desktop.php'; } setTimeout('GoToPortal()', 1900); </script>";
        }else{
            echo "<span style='color:red'>Código incorrecto, verifica e intenta nuevamente.</span>";
        }



?>