function updatePreview(c) {
		if (parseInt(c.w) > 0) {
			lengthX = Math.round(c.w);
			lengthY = Math.round(c.h);
			initialX = Math.round(c.x);
			initialY = Math.round(c.y);
		}
	}

	function readFoto(input) {
		if (input.files && input.files[0]) {
			var anchoMaximo = 568;
			var FR = new FileReader();
			FR.onload = function(e) {
				$("#targetFoto").remove();
				$(".jcrop-holder").remove();
				$("#cositoFoto").append("<img src='' id='targetFoto'/>");
				var can = document.getElementById('canvasFoto');
				var ctx = can.getContext('2d');
				ctx.beginPath();
				var img = new Image();
				img.src = e.target.result;
				// lets resize it to 1/4 original size
				var bigside = Math.max(img.width, img.height);
				var ratio = (anchoMaximo - 32) / img.width;
				can.width = img.width * ratio;
				can.height = img.height * ratio;
				ctx.scale(ratio, ratio); // scale by 1/4
				ctx.drawImage(img, 0, 0);
				$('#targetFoto').attr("src", can.toDataURL());
				$('#targetFoto').Jcrop({
					onSelect: updatePreview,
					aspectRatio: 1.333,
					keySupport: false,
					setSelect: [50, 50, 500, 250]
				});
			};
			FR.readAsDataURL(input.files[0]);
		}
	}

/*function readFotoLink(input) {

	alert(2);
		var anchoMaximo = 568;
			$("#targetFoto").remove();
			$(".jcrop-holder").remove();
			$("#cositoFoto").append("<img src='' id='targetFoto'/>");
			var can = document.getElementById('canvasFoto');

	
			var img = new window.Image();
			var ctx = can.getContext("2d");

			img.src= input;
			var ratio = (anchoMaximo - 32) / img.width;
			can.width = img.width * ratio;
			can.height = img.height * ratio;
			img.onload=start(ctx);
	
			function start(ctx){
					
			
			ctx.scale(ratio, ratio); // scale by 1/4
			ctx.drawImage(img, 0, 0);
				alert(1);
			}
	
	
			
			$('#targetFoto').attr("src", can.toDataURL());
			$('#targetFoto').Jcrop({
				onSelect: updatePreview,
				aspectRatio: 1.333,
				keySupport: false,
				setSelect: [50, 50, 500, 250]
			});
}*/

function readLogo(input) {
	
		if (input.files && input.files[0]) {
			var anchoMaximo = 568//$(".modal-dialog").width();
			var FR = new FileReader();
			FR.onload = function(e) {
				$("#targetLogo").remove();
				$(".jcrop-holder").remove();
				$("#cositoLogo").append("<img src='' id='targetLogo'/>");
				var can = document.getElementById('canvasLogo');
				var ctx = can.getContext('2d');
				ctx.beginPath();
				var img = new Image();
				img.src = e.target.result;
				// lets resize it to 1/4 original size
				var bigside = Math.max(img.width, img.height);
				var ratio = (anchoMaximo - 32) / img.width;
				can.width = img.width * ratio;
				can.height = img.height * ratio;
				ctx.scale(ratio, ratio); // scale by 1/4
				ctx.drawImage(img, 0, 0);
				$('#targetLogo').attr("src", can.toDataURL());
				$('#targetLogo').Jcrop({
					onSelect: updatePreview,
					 bgColor: '',
					keySupport: false,
					setSelect: [50, 50, 100, 100],
				});
			};
			FR.readAsDataURL(input.files[0]);
		}
	}	

function readLogo2(input) {
		if (input.files && input.files[0]) {
			var anchoMaximo = 568//$(".modal-dialog").width();
			var FR = new FileReader();
			FR.onload = function(e) {
				$("#targetLogo2").remove();
				$(".jcrop-holder").remove();
				$("#cositoLogo2").append("<img src='' id='targetLogo2'/>");
				var can = document.getElementById('canvasLogo2');
				var ctx = can.getContext('2d');
				ctx.beginPath();
				var img = new Image();
				img.src = e.target.result;
				// lets resize it to 1/4 original size
				var bigside = Math.max(img.width, img.height);
				var ratio = (anchoMaximo - 32) / img.width;
				can.width = img.width * ratio;
				can.height = img.height * ratio;
				ctx.scale(ratio, ratio); // scale by 1/4
				ctx.drawImage(img, 0, 0);
				$('#targetLogo2').attr("src", can.toDataURL());
				$('#targetLogo2').Jcrop({
					onSelect: updatePreview,
					 bgColor: '',
					keySupport: false,
					setSelect: [50, 50, 100, 100],
				});
			};
			FR.readAsDataURL(input.files[0]);
		}
	}	


function readPersona(input) {
		if (input.files && input.files[0]) {
			var anchoMaximo = 568//$(".modal-dialog").width();
			var FR = new FileReader();
			FR.onload = function(e) {
				$("#targetPersona").remove();
				$(".jcrop-holder").remove();
				$("#cositoPersona").append("<img src='' id='targetPersona'/>");
				var can = document.getElementById('canvasPersona');
				var ctx = can.getContext('2d');
				ctx.beginPath();
				var img = new Image();
				img.src = e.target.result;
				// lets resize it to 1/4 original size
				var bigside = Math.max(img.width, img.height);
				var ratio = (anchoMaximo - 32) / img.width;
				can.width = img.width * ratio;
				can.height = img.height * ratio;
				ctx.scale(ratio, ratio); // scale by 1/4
				ctx.drawImage(img, 0, 0);
				$('#targetPersona').attr("src", can.toDataURL());
				$('#targetPersona').Jcrop({
					onSelect: updatePreview,
						aspectRatio: 1,
					 bgColor: '',
					keySupport: false,
					setSelect: [50, 50, 200, 200],
				});
			};
			FR.readAsDataURL(input.files[0]);
		}
	}	