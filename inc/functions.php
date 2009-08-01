<?php
	class Modules {
		public function displayBanner() {
			echo "<div id=\"banner\">
						<img id=\"usa-vlag\" src=\"images/index_13.png\" width=\"200\" height=\"63\" alt=\"USA Vlag\" />
					   </div>";
			//return $banner;
		}
		
		public function breadcrumb() {
			return("Home");
		}
	
		public function blog(){
			$mysql = DB::get_db()->get_handle();
			echo"<div id=\"blogrol\">";
			if ($result = $mysql->query("SELECT * FROM berichten")){
				while($row = $result->fetch_object()){
					echo"<div class=\"post\">";
					echo"\t	<div class=\"datum\">";
					echo"\t \t	<div class=\"numeriek\">";
					echo "\t \t \t" . $this->parseDate("dag", 0, $row->datum);
					echo "\t \t </div>";
					echo "\t \t " . $this->parseDate("maand", "full", $row->datum);
					echo "\t </div>";
					echo "\t <div class=\"content\">";
					echo "\t \t <h2>" . $row->titel . "</h2>";
					echo "\t \t " . $row->inhoud;
					echo "\t </div>";
					echo "</div>";
				}	
			}
			
			else {
				//doe iets met fouten
			}
			echo "</div>";
			
		}
		
		public function parseDate($type, $formaat, $datum_src) {
			$date = explode("-", $datum_src);
			$dag = explode(" ", $date[2]);
			if($type == "dag"){
				return $dag[0];
			}
			if($type == "maand"){
				if($formaat == "0"){
					return $date[1];}
				if($formaat == "full"){
					return strftime("%B", strtotime("$date[1]/10/$date[0]"));
				}
			}
			if($type == "jaar"){
				return $date[0];
			}
			if($type == "jaar" && $formaat == "2"){
				// hak date2 in stukjes, return alleen de llatste 2 getallen
				return $date[0];
			}
		}
	}
?>