<?php
	$action = strval(trim(mb_strtolower($_POST["function"])));
	$n1 = $_POST["n_one"];
	$n2 = $_POST["n_two"];

	if (strcasecmp($action, 'sum') == 0){
		echo call_user_func('sum', $n1, $n2);
	} elseif(strcasecmp($action, 'product') == 0){
		echo call_user_func('product', $n1, $n2);
	} elseif (strcasecmp($action, 'pow') == 0){
		echo call_user_func('pow1', $n1, $n2);
	} else {
		echo "Извините, в данном калькуляторе нет такой функции...=(";
	}
	

	function sum($a, $b) {
        return $sum = $a + $b;
    }

    function product($a, $b) {
    	return $product = $a * $b;
    }

   	function pow1($a, $b) {
    	return pow($a, $b);
    }
?>