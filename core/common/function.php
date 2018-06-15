<?php
function p($var)
{
    if(is_bool($var)){
        var_dump($var);
    }elseif(is_null($var)){
        var_dump(null);
    }else{
        echo "<pre style='position:relative;z-index:999;padding:10px;border-radius:5px;background:#eee;border:1px solid #ccc;font-zize:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
    }    
}


/**
	接收post参数的方法
	$name 对应值
	$default 默认值
	$fitt 过滤方法 如'int'
*/
function post($name,$default=false,$fitt=false){
	if (isset($_POST[$name])) {
		if ($fitt) {
			switch ($fitt) {
				case 'int':
					if (is_numeric($_POST[$name])) {
						return $_POST[$name];
					}else{
						return $default;
					}

					break;
				
				default:
					# code...
					break;
			}
		}else{
			return $_POST[$name]
		}
	}else{
		return $default;
	}
}
