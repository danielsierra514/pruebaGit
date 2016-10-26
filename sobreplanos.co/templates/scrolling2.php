<?php
$idCliente=$_GET["idCliente"];
$tipoNosotros=$_GET["tipoNosotros"];
$tipoMapa=$_GET["tipoMapa"];
$tipoPorEstado=$_GET["tipoEstado"];
$colorInicial="4984ad";
$colorFinal="000000";
$colorHeader=$_GET["colorHeader"];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jqueryUI.min.js"></script>
	<script type="text/javascript" src="scripts/slimscroll.min.js"></script>
	<script type="text/javascript" src="scripts/fullPage.js"></script>
	<script type="text/javascript" src="scripts/examples.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage'],
				sectionsColor: ['#4A6FB1', '#939FAA', '#323539'],
				scrollOverflow: true
			});
		});
	</script>
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
		padding:40px 0 0 0;
	}
	.intro p{
		color: #fff;
		padding:40px 0 0 0;
	}

	/* Centered texts in each section
	* --------------------------------------- */
	.section{
		text-align:center;
	}


	/* Bottom menu
	* --------------------------------------- */
	#infoMenu li a {
		color: #fff;
	}
	</style>

	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

	
	

</head>
<body>

<div id="fullpage">
	<div class="section " id="section0">
		<div class="intro">
			<h1>Scrolling inside sections</h1>
			<p>Easy and useful! Just make use of the option `scrollOverflow` for it and add the slimScroll plugin! <br></p>


			<img src="./imgs/iphone2.png" alt="iphone" id="iphone-two" />

			<p>Eu nec ferri molestie consequat, vel at alia dolore putant. Labore philosophia ut vix. In vis nostrud interesset appellantur, vis et tation feugiat scripserit. Te nec noster suavitate persecuti. Diceret erroribus cu vix, alii omnes ei sit. Sea an corrumpit patrioque, virtute accumsan nominavi et usu, ex mei dolore vocibus incorrupte.

	Duo ea saperet tacimates. Sed possim prodesset no, per novum putent doctus ea. Eu mea magna aliquip graecis, pri corpora officiis complectitur ei, lorem saepe consetetur his ad. Meis consulatu ei vis, an altera ocurreret interesset qui.

	Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.

	Per alienum torquatos eu. Sed saepe quodsi et, ullum choro definitionem sed et. Ullum elitr comprehensam sed at, sint illum propriae per eu. Eu enim laudem reformidans vel. Pro clita quando ad. Usu te virtute quaestio, ut eruditi tacimates volutpat per.

	Affert accusamus duo ex, ea pri habeo graece, cu magna dolorum sea. Quas dictas assueverit ad qui, cu duo harum fabulas apeirian, ullum gubergren et sit. Ne cetero recusabo adipiscing quo, cu harum quaestio neglegentur cum. Has tation aliquip ad, virtute volumus definitionem mel ne. Nobis audiam civibus ius at.

	Ei eum hinc mutat inciderint. Cu maluisset assentior per, graecis ponderum no mel. Eum eu vitae quando gloriatur, cum graece percipitur no, sed errem maiestatis te. Sed porro epicuri te, ad nam malorum verterem. Ea zril aliquip euismod sed.

		  </p>
		</div>
	</div>
	<div class="section" id="section1">
	    <div class="slide" id="slide1">
			<div class="intro">
				<h1>Also in sections</h1>
				<img src="./imgs/iphone-two.png" alt="iphone" id="iphone-two" />
				<p>
					Eu nec ferri molestie consequat, vel at alia dolore putant. Labore philosophia ut vix. In vis nostrud interesset appellantur, vis et tation feugiat scripserit. Te nec noster suavitate persecuti. Diceret erroribus cu vix, alii omnes ei sit. Sea an corrumpit patrioque, virtute accumsan nominavi et usu, ex mei dolore vocibus incorrupte.

					Duo ea saperet tacimates. Sed possim prodesset no, per novum putent doctus ea. Eu mea magna aliquip graecis, pri corpora officiis complectitur ei, lorem saepe consetetur his ad. Meis consulatu ei vis, an altera ocurreret interesset qui.

					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.
					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.
					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.

					Per alienum torquatos eu.
				</p>
			</div>
		</div>

	    <div class="slide" id="slide2"><h1>Even inside slides</h1></div>
		<div class="slide" id="slide3">
			<div class="intro">
				<h1>Scrolling slide</h1>
				<img src="./imgs/iphone-red.png" alt="iphone" id="iphone-two" />
				<p>
					Eu nec ferri molestie consequat, vel at alia dolore putant. Labore philosophia ut vix. In vis nostrud interesset appellantur, vis et tation feugiat scripserit. Te nec noster suavitate persecuti. Diceret erroribus cu vix, alii omnes ei sit. Sea an corrumpit patrioque, virtute accumsan nominavi et usu, ex mei dolore vocibus incorrupte.

					Duo ea saperet tacimates. Sed possim prodesset no, per novum putent doctus ea. Eu mea magna aliquip graecis, pri corpora officiis complectitur ei, lorem saepe consetetur his ad. Meis consulatu ei vis, an altera ocurreret interesset qui.

					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.
					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.
					Eu ponderum comprehensam his, case antiopam pri te. Mel ne partem consequat instructior. Ad dicunt malorum sea, ex qui omnes invenire gubergren. Ius cu autem aliquando, pri vide ornatus perpetua an, no has epicuri verterem. Nam at animal pertinax efficiantur.

					Per alienum torquatos eu.
				</p>
			</div>
		</div>
	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>No limitations!</h1>
			<p>Content is a priority. Even if it is so large :)</p>
		</div>
	</div>
</div>

</body>
</html>
