<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Horizontal navigation dots - fullPage.js</title>
	<script src="scripts/jquery.js"></script>
  <script type="text/javascript" src="scripts/jqueryUI.min.js"></script>
	<script type="text/javascript" src="scripts/slimscroll.min.js"></script>  
  <script type="text/javascript" src="scripts/fullPage.js"></script>
  <script type="text/javascript" src="scripts/examples.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/fullPage.css" />
	<link rel="stylesheet" type="text/css" href="styles/examples.css" />
	<style>

	/* Style for our header texts
	* --------------------------------------- */
	h1{
		font-size: 5em;
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
	}
	.intro p{
		color: #fff;
	}

	/* Centered texts in each section
	* --------------------------------------- */
	.section{
		text-align:center;
	}

	/* Overwriting styles for control arrows for slides
	* --------------------------------------- */
	.controlArrow.prev {
		left: 50px;
	}
	.controlArrow.next{
		right: 50px;
	}


	/* Bottom menu
	* --------------------------------------- */
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
				navigationTooltips: ['First page', 'Second page', 'Third and last page']
			});
		});
	</script>

</head>
<body>

<select id="demosMenu">
  <option selected>Choose Demo</option>
  <option id="backgrounds">Background images</option>
  <option id="backgroundVideo">Background video</option>
  <option id="gradientBackgrounds">Gradient backgrounds</option>
  <option id="backgroundsFixed">Fixed fullscreen backgrounds</option>
  <option id="looping">Looping</option>
  <option id="noAnchor">No anchor links</option>
  <option id="scrollingSpeed">Scrolling speed</option>
  <option id="easing">Easing</option>
  <option id="callbacks">Callbacks</option>
  <option id="css3">CSS3</option>
  <option id="continuous">Continuous scrolling</option>
  <option id="normalScroll">Normal scrolling</option>
  <option id="scrollBar">Scroll bar enabled</option>
  <option id="scrolling">Scroll inside sections and slides</option>
  <option id="navigationV">Vertical navigation dots</option>
  <option id="navigationH">Horizontal navigation dots</option>
  <option id="fixedHeaders">Fixed headers</option>
  <option id="apple">Apple iPhone demo (animations)</option>
  <option id="oneSection">One single section</option>
  <option id="responsiveHeight">Responsive Height</option>
  <option id="responsiveWidth">Responsive Width</option>
  <option id="methods">Methods</option>
</select>


<div id="fullpage">
	<div class="section " id="section0">
		<div class="intro">
			<h1>Navigation dots</h1>
			<p>An easy and beautiful way to navigate throw the sections</p>
		</div>
	</div>
	<div class="section" id="section1">
	    <div class="slide" id="slide1">
			<div class="intro">
				<h1>Clickable</h1>
				<p>
					You can even click on the navigation and jump directly to another section.
				</p>
			</div>
		</div>

	    <div class="slide" id="slide2">
			<h1>Slide 2</h1>
		</div>

	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>Enjoy it</h1>
		</div>
	</div>
</div>


</body>
</html>