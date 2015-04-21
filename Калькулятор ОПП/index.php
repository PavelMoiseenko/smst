<?php

	function __autoload($class){
		include $class.'.php';
	}

	$myCalc = new Calc();
	echo $myCalc->sum(2,2);
	
?>
