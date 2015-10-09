<?php

/* HTML div creator */
function div_open($class = NULL, $id = NULL)
{
    $code   = '<div ';
    $code   .= ( $class != NULL )   ? 'class="'. $class .'" '   : '';
    $code   .= ( $id != NULL )      ? 'id="'. $id .'" '         : '';
    $code   .= ">\n";
    return $code;
}

function div_close()
{
    return "</div>\n";
}

/* HTML a creator */
function a_open($class = NULL, $href = '',$id = NULL)
{
    $code   = '<a ';
    $code   .= ( $class != NULL )  ? 'class="'. $class .'" '   : '';
    $code   .= ( $href != NULL )   ? 'href="'. $href .'" '   : '';
    $code   .= ( $id != NULL )     ? 'id="'. $id .'" '         : '';
    $code   .= ">\n";
    return $code;
}

function a_close()
{
    return "</a>\n";
}

function strToUrl($param){
    return str_replace(array(' ','.'),array('_',''), $param);
}


?>