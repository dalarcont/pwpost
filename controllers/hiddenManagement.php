<?php

    //During the load of an entrie, if its owner user is the same as logged user we need to check something like the following instruction:
        //if the hidden property is enabled, that means the entrie isn't visible at public but visible to its owner, then, we need to show the 'unhide' button
        //if the hidden property is disbaled, that means the entrie is visible to whoever wants to see it, then, we need to show the 'hide' button


    function hidden_FxSelector($property){
        if($property==0){
            //Visible
            $r = "letHide";
        }else{
            //Not visible
            $r = "letUnhide";
        }
        return $r ;
    }

    function hidden_imgSelector($property){
        if($property==0){
            //Visible
            $r = "hide";
        }else{
            //Not visible
            $r = "unhide";
        }
        return $r;
    }

?>