<?php
function p($var)
{
    if(is_bool($var)){
        var_dump($var);
    }elseif(is_null($var)){
        var_dum(null);
    }else{
        echo "<pre style='position:relative;z-index:999;padding:10px;border-radius:5px;background:#eee;border:1px solid #ccc;font-zize:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
    }    
}