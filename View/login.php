<link rel="stylesheet" href="../Content/css/user_auth.css">

<!-- Modal HTML -->
<div id="loginModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<!-- <form action="" method=""> -->
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">User ID</label>
            <div class="col-sd-8">
            <input id="userID" name="userID" placeholder="Enter User ID" class="form-control input-md" required="" type="text">
            <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Password</label>
            <div class="col-sd-8">
            <input id="loginPassword" name="loginPassword" placeholder="Enter Password" class="form-control input-md" required="" type="password">
            <span class="help-block"> </span>
            </div>
          </div>
          <!-- Button -->
					<div class="form-group">
            <label class="col-sd-3 control-label" for="singlebutton"> </label>
            <div class="col-sd-8">
							<button id="singlebutton" class="btn btn-primary btn-block btn-sm" onclick="loginUser();">Submit</button>
            </div>
						<!-- <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" onclick="loginUser();"> -->
					</div>
				<!-- </form> -->
				<p class="hint-text small"><a href="#">Forgot Your Password?</a></p>
			</div>
		</div>
	</div>
</div>
<script src="../Content/script/user_cred_post.js"></script>
