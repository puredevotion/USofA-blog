<?php
	class System {
			public function __construct(){
				// include all configuration tokens
				include("config.php");
				
				// set debug mode
				if (defined('DEV_MODE')) {
				  error_reporting(E_ALL);
				  set_error_handler(array(&$this, 'debug_ErrorHandler'));
				}
				
				// connect to MySQL
				// host, user, pass, db
				$mysql = new mysqli('localhost', 'root', '', 'thijs');
				
				if ($mysql->connect_error) {
					if(defined('DEV_MODE')){
				    	die('a connection error occured (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error . ' in the construct class, located at ' . $_SERVER['SCRIPT_FILENAME']);
					}
					else {
						// schrijf alle $_SERVER variabelen, en de error weg naar een XML bestand
						// stuur email met korte beschrijving
						header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
					}
				}
				
				// parse apache mod_rewrite
				
			}
			
			function debug_ErrorHandler($errno, $errstr, $errfile, $errline) {
				print("PHP Error: [" . $errno . "] " . $errstr . " at line " . $errline . " in " . $errfile . ".<br />");
				// print naar XML file
				// stuur email.
				//return(true);
			}
			
			public function secure_arr($arr) {
//				foreach $key as $val {
					
//				}
			}
			
			public function breadcrumb() {
				return("Home");
			}
			
			public function displayHeader() {
				echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
					  <html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
							<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
							<title>" . websiteName . " | ";							
							 echo $this->breadcrumb();
							 echo "</title> 	
							<link href=\"templates/" . selectedTemplate . "/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
						</head>";	
				// echo meer meuk waar nodig
			}
			
			public function displayBody() {
				echo "<body>";
					echo $this->displayBanner();
				
				// echo de modules die moeten worden getoond.
			}
			
			public function displayBanner() {
				$banner = "<div id=\"banner\">
							<img id=\"usa-vlag\" src=\"images/index_13.png\" width=\"200\" height=\"63\" alt=\"USA Vlag\" />
						   </div>";
				return $banner;
			}
			
			public function displayFooter() {
				// echo de footer
				// mysqli_close();
				//	fetch evt. errors
			}
			

	}

?>
