<link rel="stylesheet" href="../Content/css/user_auth.css">

<!-- Modal HTML -->
<div id="signupModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sign Up</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<!-- <form action="" method=""> -->
        <!-- Text input-->
					<div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">First Name</label>
            <div class="col-sd-8">
              <input id="first_name" name="first_name" placeholder="Enter First Name" class="form-control input-md" required="" type="text">
              <span class="help-block"> </span>
            </div>
					</div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Last Name</label>
            <div class="col-sd-8">
            <input id="last_name" name="last_name" placeholder="Enter Last Name" class="form-control input-md" required="" type="text">
            <span class="help-block"> </span>
            </div>
          </div><!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Region</label>
            <div class="col-sd-8">
							<select class='form-control col-sm-4' name='selectedArea' id='selectedArea' >
                <option value=>Select Value</option>
              </select>
            <!-- <input id="textinput" name="region" placeholder="Enter Region" class="form-control input-md" required="" type="text"> -->
            <span class="help-block"> </span>
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Email</label>
            <div class="col-sd-8">
            <input id="email" name="email" placeholder="Enter Email" class="form-control input-md" required="" type="text">
            <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Password</label>
            <div class="col-sd-8">
            <input id="signupPassword" name="signupPassword" placeholder="Enter Password" class="form-control input-md" required="" type="password">
            <span class="help-block"> </span>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="textinput">Confirm Password</label>
            <div class="col-sd-8">
            <input id="confPass" name="confPass" placeholder="Confirm your Password" class="form-control input-md" required="" type="password">
            <span class="help-block"> </span>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-sd-3 control-label" for="singlebutton"> </label>
            <div class="col-sd-10">
							<button id="singlebutton" class="btn btn-primary btn-block btn-sm" onclick="signupUser();">Submit</button>
              <!-- <input type="submit" class="btn btn-primary btn-block btn-lg" value="Sign Up"> -->
            </div>
          </div>

				<!-- </form> -->
				<p class="hint-text small"><a href="#">Forgot Your Password?</a></p>
			</div>
		</div>
	</div>
</div>

<script src="../Content/script/select_location.js"></script>
<script type="text/javascript">
	getSelectedLocation("Region");
</script>

<script src="../Content/script/user_cred_post.js"></script>
