<html>
	<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
<title>js. test</title>

</head>
<body>
Op dit moment is deze website nog in volle ontwikkeling. Voordat ik vertrek is hij zeker weten af.<br />
		Tot die tijd kan ik je op de hoogte houden via e-mail, of RSS. <br /><br />
		<img src="ja.png" alt="Ja ik wil!" />&nbsp; &nbsp;
		<a href="#" onclick="document.write('En je wilt ook geen RSS lezen?');"><img src="nee.png" alt="Nee, ik haat je!" style="margin-left: 5px; border-color: #000; border-width: 1px;"/></a>
		<div class="msg_list">
			<p class="msg_head">Header-1 </p>
			<div class="msg_body">
			orem ipsum dolor sit amet, consectetuer adipiscing elit orem ipsum dolor sit amet, consectetuer adipiscing elit
			</div>
			
			<p class="msg_head">Header-2</p>
			<div class="msg_body">
			orem ipsum dolor sit amet, consectetuer adipiscing elit orem ipsum dolor sit amet, consectetuer adipiscing elit
			</div>
			
			<p class="msg_head">Header-3</p>
			<div class="msg_body">
			orem ipsum dolor sit amet, consectetuer adipiscing elit orem ipsum dolor sit amet, consectetuer adipiscing elit
			</div>
		</div>
	</body>
	</html>