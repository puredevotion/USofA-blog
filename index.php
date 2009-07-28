<?php
	if(isset($_GET['contact']))
		$andere_pagina = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Thijs in de US of A | blog</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/layout.css" type="text/css" rel="stylesheet" />
	<link href="css/typografie.css" type="text/css" rel="stylesheet" />
	<link href="facefiles/facebox.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript" src="facefiles/facebox.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
	  //hide the all of the element with class msg_body
	  $(".msg_body").hide();
	  //toggle the componenet with class msg_body
	  $(".msg_head").click(function()
	  {
		 $(this).next(".msg_body").slideToggle(600);
	  });
	});
	</script>
	<?php
	if(!$andere_pagina){
		?>
	<script type="text/javascript">
		 jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox()
	//		jQuery.facebox("<div>This is the contents of a hidden DIV on the page, with ID='mydiv' and style set to 'display:none'<br /><br /><a href='http://www.dynamicdrive.com/dynamicindex4/facebox/index.htm'>Facebox image and content viewer (v 1.1)</a></div>");
		  jQuery.facebox(function() {
				jQuery.get('code.html', function(data) {
					$(".msg_body").hide();
					  //toggle the componenet with class msg_body
					  $(".msg_head").click(function()
					 {
						 $(this).next(".msg_body").slideToggle(600);
					});
					jQuery.facebox('<div style="font-family: verdana, arial, modern; font-size: 13px;">' + data + '</div>')
				})
			}) 
		 
		 })
	</script>
	<?php } ?>
	<style>
		p {
		padding: 0 0 1em;
		}
		.msg_list {
		margin: 0px;
		padding: 0px;
		width: 383px;
		}
		.msg_head {
		padding: 5px 10px;
		cursor: pointer;
		position: relative;
		margin:1px;
		}
		.msg_body {
		padding: 5px 10px 15px;
		background-color:#F4F4F8;
		}
	</style>

</head>
<body style="background-color:#FFF;">
	<div id="banner">
		<img id="usa-vlag" src="images/index_13.png" width="200" height="63" alt="" />
	</div>
	<div id="container">
		<div id="header">
   		<img id="titel" src="images/header_03.png" width="361" alt="Thijs in de US of A" />
   		<a href="http://feeds.feedburner.com/ThijsInDeUsOfA" id="rss_link"> </a>
			<a href="http://www.twitter.com/thijsbaars" id="twitter_link"> </a>
	</div>
	<div id="body">
		<div id="blogrol">
		<?php
			if($andere_pagina && isset($_POST['email']))
			{
				$mysqli = @new mysqli('sql10.pcextreme.nl', '26779thijs', 'topdesign', '26779thijs');
				
				if ($mysqli->connect_errno) {
					 die('Connection Error: ' . $mysqli->connect_errno);
				}
				$naam  =  htmlentities($_POST['naam'], ENT_QUOTES, 'utf-8');
				if(preg_match('/^[^\W][a-zA-Z0-9_\.]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $_POST['email']))
					$email = $_POST['email'];
				else {die("Er Ging iets fout bij je email adres. is het een bestaand adres?");}
				
				if ($mysqli->query("INSERT INTO gebruikers (naam, email) VALUES ('$naam', '$email')") === TRUE) {
					printf("Bedankt voor je anmelding! We'll keep you posted!");
				}
			}
			else {
		?>	
			<div class="post">
				<div class="datum">
					<div class="numeriek">26</div>Juni
				</div>
				<div class="content">
					<h2>Afscheids party</h2>
					de volle maan bull shit maar klinkt wel interessant.... bla bla bla
				</div>
			</div>
		</div>
		<div id="navigation">
			<div id="labels">
				<h2><img id="index_22" src="images/index_22.png" width="66" height="18" alt="Labels" style="margin-bottom: 5px;" /></h2>
					<div class="label"><img class="label_button" src="images/index_29.gif" width="23" height="23" alt="" /><div class="titel">USofA</div><div class="active">Active</div></div>
			</div>
		
			<div id="reading">
				<h2><img id="index_20" src="images/index_20.png" width="195" height="24" alt="Currently Reading" /></h2>
				<div class="book">
					<h3>titel</h3>
					<span class="author">By: auteur</span>
					<img id="index_41" src="images/index_41.gif" width="80" height="15" alt="Amazon.com" /><img id="index_37" src="images/index_37.gif" width="20" height="19" alt="Bol.com" />
				</div>
		</div>
		<div id="listening">
			<div class="song">
				<img id="favouriteTunes" src="images/index_45.png" width="171" height="18" alt="" />
				<h3>Butch - Amelie</h3>
				<span class="remix">Format B Remix</span>
				<div class="sell">
					<img class="amazon" src="images/index_54.gif" width="64" height="13" alt="Amazon" />
					<span class="itunes">
						<img id="itunes" src="images/index_51.gif" width="17" height="17" alt="iTunes" />
						<img id="USA" src="images/index_57.gif" width="17" height="8" alt="USA" />
						<img id="EU" src="images/index_48.gif" width="11" height="8" alt="EU" />
					</span>
				</div>
			</div>
		</div>
		<div id="gallerij"> 
			<img id="index_34" src="images/index_34.png" width="104" height="24" alt="" />
		</div>
    	<div id="footer">
   
    	</div> 
	</div>
	<?php } ?>
</body>
</html>