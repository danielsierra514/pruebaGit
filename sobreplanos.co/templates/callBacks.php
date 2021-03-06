<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Callbacks - fullPage.js</title>
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
				afterLoad: function(anchorLink, index){

					//section 2
					if(index == 2){
						//moving the image
						$('#section1').find('img').delay(500).animate({
							left: '0%'
						}, 1500, 'easeOutExpo');

						$('#section1').find('p').first().fadeIn(1800, function(){
							$('#section1').find('p').last().fadeIn(1800);
						});;

					}

					//section 3
					if(anchorLink == '3rdPage'){
						//moving the image
						$('#section2').find('.intro').delay(500).animate({
							left: '0%'
						}, 1500, 'easeOutExpo');
					}
				}
			});

		});
	</script>

	<style>
		#section1 img{
			left: 130%;
			position:relative;
		}
		#section1 p{
			display:none;
		}
		#section2 .intro{
			left: -130%;
			position:relative;
		}
	</style>

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
		<p>Configure the easing jQuery UI effect!</p>
		<img src="imgs/fullPage.png" alt="fullPage" />
	</div>
	<div class="section" id="section1">
		<div class="intro">
			<img src="imgs/1.png" alt="Cool" />
			<h1>easeOutExpo</h1>
			<p>This example is working with `easeOutExpo` effect instead of the default `easeOutExpo`</p>
			<p>You can see more about them <a href="http://jqueryui.com/resources/demos/effect/easing.html" target="_blank">here</a></p>
		</div>
	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>Cool uh?</h1>
			<p>Choose the best easing effect for your site!</p>
		</div>
	</div>
</div>
</body>
</html>
