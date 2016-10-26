<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Responsive - fullPage.js</title>
	<script src="../scripts/jquery.js"></script>
  <script type="text/javascript" src="../scripts/jqueryUI.min.js"></script>
	<script type="text/javascript" src="../scripts/slimscroll.min.js"></script>  
  <script type="text/javascript" src="../scripts/fullPage.js"></script>
  <script type="text/javascript" src="../scripts/examples.js"></script>
  <link rel="stylesheet" type="text/css" href="../styles/fullPage.css" />
	<link rel="stylesheet" type="text/css" href="../styles/examples.css" />
	<style>
	h1{
		font-size: 5em;
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
	}
	.intro p{
		color: #fff;
	}
	.section{
		text-align:center;
	}

	#infoMenu li a {
		color: #fff;
	}
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage', 'secondPage', '3rdPage'],
				sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
				navigation: true,
				navigationPosition: 'right',
				navigationTooltips: ['First page', 'Second page', 'Third and last page'],
				responsiveWidth: 900
			});
		});
	</script>
</head>
<body>
<div id="fullpage">
	<div class="section " id="section0">
		<div class="intro">
			<h1>Responsive</h1>
			<p>This example will turn to normal scroll when the window size gets smaller than 900px width</p>
		</div>
	</div>
	<div class="section" id="section1">
	    <div class="slide" id="slide1">
			<div class="intro">
				<h1>Ideal for small screens</h1>
			</div>
		</div>
	    <div class="slide" id="slide2">
			<h1>This example uses responsiveWidth: 900</h1>
		</div>
	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>Keep it simple!</h1>
		</div>
	</div>
</div>
</body>
</html>