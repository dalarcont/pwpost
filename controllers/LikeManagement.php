<?php

    //During the load of an entry, system will select a button to print if a post is liked or not by the logged user
    function like_FxSelector($property){
        if($property){
            //Liked
            $r = "unsetLikePost";
        }else{
            //Not like
            $r = "setLikePost";
        }
        return $r ;
    }

    function like_imgSelector($property){
        if($property){
            //Liked
            $r = "unsetlike";
        }else{
            //Not like
            $r = "setlike";
        }
        return $r;
    }

?>