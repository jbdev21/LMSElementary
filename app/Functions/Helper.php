<?php

function activeMenu($segments, $returnShow = true, $position = 2){
    $boolean = false;
    if(is_array($segments)){
        $boolean = in_array(Request::segment($position), $segments);
    }else{
        $boolean = Request::segment($position) == $segments;
    }

    if($returnShow){
        return $boolean ? 'show' : '';
    }

    return false;
}

function activeMainMenu($segments, $returnString = "show", $position = 2){
    $boolean = false;
    if(is_array($segments)){
        $boolean = in_array(Request::segment($position), $segments);
    }else{
        $boolean = Request::segment($position) == $segments;
    }

    return $boolean ? $returnString : '';
}