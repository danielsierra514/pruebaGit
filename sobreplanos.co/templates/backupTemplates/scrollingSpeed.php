<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Scrolling speed - fullPage.js</title>
	<script src="scripts/jquery.js"></script>
  <script type="text/javascript" src="scripts/jqueryUI.min.js"></script>
	<script type="text/javascript" src="scripts/slimscroll.min.js"></script>  
  <script type="text/javascript" src="scripts/fullPage.js"></script>
  <script type="text/javascript" src="scripts/examples.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/fullPage.css" />
	<link rel="stylesheet" type="text/css" href="styles/examples.css" />
	<script type="text/javascript">
		$(document).ready(function() {
      
			$('#fullpage').fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu',
				scrollingSpeed: 1700
			});

		});
	</script>

</head>
<body>

<ul id="menu">
	<li data-menuanchor="firstPage"><a href="#firstPage">First slide</a></li>
	<li data-menuanchor="secondPage"><a href="#secondPage">Second slide</a></li>
	<li data-menuanchor="3rdPage"><a href="#3rdPage">Third slide</a></li>
</ul>

<div id="fullpage">
	<div class="section " id="section0">
		<h1>fullPage.js</h1>
		<p>Configure the scrolling speed!</p>
		<img src="imgs/fullPage.png" alt="fullPage" />
	</div>
	<div class="section" id="section1">
	    <div class="slide">
			<div class="intro">
				<img src="imgs/1.png" alt="Cool" />
				<h1>Slow scrolling speed</h1>
				<p>In case we want to make a site for old people, for example :)</p>
			</div>
		</div>
	    <div class="slide">
			<div class="intro">
				<img src="imgs/2.png" alt="Compatible" />
				<h1>Landscape too</h1>
				<p>Also applied to landscape slides. Great uh?</p>
			</div>
		</div>
	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>Slooooooww</h1>
			<p>Now you can try other demos!</p>
		</div>
	</div>
</div>


</body>
</html>
