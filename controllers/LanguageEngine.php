<?php 
session_start();
    $selectedLang = $_POST['select'];

    if($selectedLang==0){
        //User selects english version
        $_SESSION['lang'] = "EN";
    }else{
        //User selects spanish version
        $_SESSION['lang'] = "ES";
    }

    //Always do a reload
    echo "<script>location.reload();</script>";

?>