<?php 

    //Entry printer in loop
    //IMPORTANT: All files that use this procedure must have declared the view files that contains the Entry template to print
    function EntryPrinter($PKG){
        $size = count($PKG);
        //print entries, connect to views
        for($i=0; $i<=($size-1); $i++){
            PrintEntry($PKG[$i]);
        }
    }


?>