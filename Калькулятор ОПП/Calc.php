<?php

	class Calc{
		var $pi = 3.14;

		public function sum($a, $b){
			$res = $a + $b;
			return $res;
		}

		public function min($a, $b){
			$res = $a-$b;
			return $res;
		}

		public function divide($a, $b){
			$res = $a/$b;
			return $res;
		}

		public function umnoz($a, $b){
			$res = $a*$b;
			return $res;
		}
	}

	
	
?>
