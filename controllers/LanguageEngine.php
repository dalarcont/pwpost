<?php 
session_start();
    $selectedLang = $_POST['select'];
    //If this file is not executed SPANISH version will be default language
    if($selectedLang==0){
        //User selects english version
        $_SESSION['lang'] = "EN";
    }else{
        //User selects spanish version
        $_SESSION['lang'] = "ES";
    }

    //Always do a reload to let the system know what language load.
    echo "<script>location.reload();</script>";

?>