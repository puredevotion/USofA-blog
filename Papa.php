<?php
class Papa {
	public $papa1, $papa2;
//	global $papaGlobal, $papaGlobal1;
	
	function otherParentFunction(){global $papa1; $papa1 = "Global papa1";}
	function parentFunction(){
		global $papaGlobal;
		echo $papaGlobal . " " . $papaGlobal1;
		$papa1 = "Hoi Pap!";
		echo"ChildFunction tadaa<br />";
		echo $papa1;
		global $papa1;
		echo $papa1;
		 $this->papa2 = "ik ben de tweede";
	}
}
?>