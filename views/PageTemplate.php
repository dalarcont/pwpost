<?php 

    //Print HTML Structure with a defined title 
    function html_print_firstBlock($typePage,$titleAppend,$pageDescription){
        //If $typePage is null/false or anything different from the options offered in the switch, system will take to load default option that is the index page.
        switch($typePage){
            case "viewpost":
                $tP_r = "Entrada ";
            break;

            case "profile":
                $tP_r = "Perfil de ".$titleAppend."";
            break;

            case "rcvAccnt":
                $tP_r = "Recuperación de cuenta";
            break;

            case "rcvAccess":
                $tP_r = "Recuperación de acceso";

            case "Desktop":
                $tP_r = "TimeLine";
            break;
        }


        include 'views/HTML_1ST_BLOCK.php';
    }

    function html_print_HeaderNav_selector($selectorStatement){
        if(!empty($selectorStatement)){
            //Print data for logged users
            include 'views/HTML_2ND_BLOCK.html';
        }
            //Just do nothing if the previous statement was not taken
    }

    function html_print_main_frame(){

        echo '</header>
        <section>
            <article>
                <center>
                <div id="aux"></div>
                <div id="main">';
    }

    function html_print_FrontEnd_frame(){
        echo '</div>
        <div id="FrontEnd">
        ';
    }

    function html_print_CompletePage($footerEnable){
        
        if($footerEnable){
            include 'views/HTML_3RD_BLOCK.html';
        }else{
            include 'views/HTML_3RD_BLOCK_NF.html';
        }
        
    }


?>