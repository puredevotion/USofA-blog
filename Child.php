<?php
include("Papa.php");
class Child extends Papa {
	public $kind1, $kind2;
	
	function childFunction(){
		global $papaGlobal;
		echo $kind1;
		echo"ChildFunction tadaa<br />";
		echo $papa1;
		global $papa1;
		echo $papa1;
		
	}
}
?>