<?php
include("inc/config.php");
	class System {
		public $modules, $pagina, $mysql;
			public function __construct(){				
				// include all configuration tokens
				//include("inc/config.php");
				// include all modules
				include("inc/functions.php");
				// init modules
				global $modules;
				$modules = new Modules;
				
				// set debug mode
				if (defined('DEV_MODE')) {
				  error_reporting(E_ALL);
				  set_error_handler(array(&$this, 'debug_ErrorHandler'));
				}
				
				// connect to MySQL
				$mysql = DB::get_db()->get_handle();
			//	$this->mysql = $mysql;
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
				
				//$pagina = htmlentities($_GET['pagina'], ENT_QUOTE, "utf-8");
				$pagina = "index";
				// parse apache mod_rewrite
				
			}
			
			function debug_ErrorHandler($errno, $errstr, $errfile, $errline) {
				print("PHP Error: [" . $errno . "] " . $errstr . " at line " . $errline . " in " . $errfile . ".<br />");
				// print naar XML file
				// stuur email.
				//return(true);
			}
			
			public function setHeader() {
				global $modules;
				echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
					  <html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
							<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
							<title>" . websiteName . " | ";							
							 echo $modules->breadcrumb();
							 echo "</title> 	
							<link href=\"templates/" . selectedTemplate . "/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
						</head>";	
				// echo meer meuk waar nodig, mar waar wel voor de head tag.
			}
			
			public function displayBody($pagina) {
					// Show the header of your page
					$this->displayHeader();
					
					// retrieve the body file
					$template = file("templates/" . selectedTemplate . "/" . $pagina . ".php", FILE_SKIP_EMPTY_LINES);
					
					// parse it through the parser, execute functions and HTML
					for($n=0; $n < count($template); $n++){
						if(preg_match("(({)(.*)(}))", $template[$n], $functions))
						{
							$this->parseFunctions($functions[2]);
						}
						else {
							echo $template[$n];
						}
					}
					
					// show the footer of the page
					$this->displayFooter();
			}
			
			private function parseFunctions($function) {
				global $modules;
				$function = $modules->$function();
				return $function;
			}
			

			
			public function displayHeader() {
				$header = file("templates/" . selectedTemplate . "/header.php", FILE_SKIP_EMPTY_LINES);
					
				// parse it through the parser, execute functions and HTML
				for($n=0; $n < count($header); $n++){
					if(preg_match("(({)(.*)(}))", $header[$n], $functions))
					{
						$this->parseFunctions($functions[2]);
					}
					else {
						echo $header[$n];
					}
				}
			}
			
			public function displayFooter() {
				$footer = file("templates/" . selectedTemplate . "/footer.php", FILE_SKIP_EMPTY_LINES);
					
				// parse it through the parser, execute functions and HTML
				for($n=0; $n < count($footer); $n++){
					if(preg_match("(({)(.*)(}))", $footer[$n], $functions))
					{
						$this->parseFunctions($functions[2]);
					}
					else {
						echo $footer[$n];
					}
				}
				$mysql = DB::get_db()->get_handle();
				$mysql->close();
				//	fetch evt. errors
			}
	}

class DB
{
  static private $db;

  private $handle;

  private function __construct()
  {
 // 	include("inc/config.php");
  	$this->handle = new mysqli(mysqlHost, mysqlUser, mysqlPass, mysqlDb);
			//	$this->mysql = $mysql;
			if ($this->handle->connect_error) {
				if(defined('DEV_MODE')){
			    	die('a connection error occured (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error . ' in the construct class, located at ' . $_SERVER['SCRIPT_FILENAME']);
				}
				else {
					// schrijf alle $_SERVER variabelen, en de error weg naar een XML bestand
					// stuur email met korte beschrijving
					header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
				}
			}
			else{echo "connectie succes!";} 
 //   $this->handle = mysql_connect(...);
  }
  
  static function get_db()
  {
    if ( ! isset(DB::$db) )
      DB::$db = new DB();
    return DB::$db;
  }

  function get_handle()
  {
    return $this->handle;
  }  
}

/*$mysql = DB::get_db()->get_handle();
//print_r($mysql->query("SELECT * FROM berichten"));
if ($result = $mysql->query("SELECT * FROM berichten")){
	echo"er is een result";
			while($row = $result->fetch_object()){
				print_r($row);
			}	
		}
*/
?>
