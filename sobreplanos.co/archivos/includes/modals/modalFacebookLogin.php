<script>
	
	$(document).ready(function() {

		$("#loginFacebook").click(function() {
			FB.login(function(response) {
				statusChangeCallback(response);
			}, {
				scope: 'public_profile,email'
			});
		});

		$("#logoutFacebook").click(function() {
			FB.logout(function(response) {
				statusChangeCallback(response);
			});
		});

	});

</script>
<style>
	#profilePictureX{
		width:100%;
	}
	#profilePictureX img{
		width:100%;
		height:auto;
	}
</style>
<div class="modal fade" id="modalLoginFacebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title " id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30"><span id="profileFullNameX"></span></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">

					<div id="profilePictureX"></div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-social btn-facebook center-block" id="loginFacebook">
					<i class="fa fa-facebook"></i>LogIn
				</a>
				<a class="btn btn-social btn-facebook center-block" id="logoutFacebook">
					<i class="fa fa-facebook"></i>Log Out
				</a>
			</div>
		</div>
	</div>
</div>