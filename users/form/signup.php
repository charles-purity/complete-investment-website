<?php

require __dir__ . '/sub-config.php';

$captcha = sysfunc::get_json_config('gcaptcha') ?? [];
$is_on = !empty($captcha['recaptcha_status']);

if( $is_on ) {
    
    $google_captcha = new google_v2_captcha();
    $google_captcha->site_key = $captcha['site_key'];
    $google_captcha->secret_key = $captcha['secret_key']; 
    
};

require __dir__ . '/control/for-signup.php';

### start HTML 

require __dir__ . '/form-header.php';

?> 

<section class="">
	<div class="container-fluid h-custom p-5">
		<div class="row d-flex justify-content-center align-items-center h-100">

			<div class="col-md-9 col-lg-6 col-xl-5 mb-4 text-center">

				<h2 align="center">
					<?php echo $settings['name']; ?>
				</h2>

				<?php sysfunc::html_notice( $temp->msg ); ?>

				<img src="<?php echo $settings['logourl']; //sysfunc::url( __dir__ . '/image/draw2.webp' ); ?>" class="img-fluid" alt="Sample image">
			</div>

			<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

				<form  action="<?php echo sysfunc::sanitize_input($_SERVER["PHP_SELF"]);?>" method="POST">
					
					<div class="form-outline mb-4">
						<input  class="form-control form-control-lg" id="inp" type="text" name="username" placeholder="Username"  value="<?php echo $username; ?>"> 
						<span class="help-block text-danger small"><?php echo $username_err; ?></span>
					</div>
					
					<div class="form-outline mb-4">
						<input class="form-control form-control-lg" id="inp" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
						<span class="help-block text-danger small"><?php echo $email_err; ?></span>
					</div>  

					<input type="hidden" name="bonus"   value="<?php echo $rb;?>">

					<div class="form-outline mb-4">
						<input class="form-control form-control-lg" id="inp" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
						<span class="help-block text-danger small"><?php echo $password_err; ?></span>
					</div>

					<div class="form-outline mb-4">
						<input class="form-control form-control-lg" id="inp" type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword; ?>">
					</div>		
					
					<div class="form-outline mb-4">
						<input class="form-control form-control-lg" id="inp"  placeholder="Phone Number" type="text" name="phone"   value="<?php echo $phone; ?>">
					</div>        

					<div class="form-outline mb-4">

						<select class="form-control form-control-lg" name="country" required>
							<option value="">-- Country --</option>
							<?php foreach( sysfunc::countries() as $key => $country ): ?>
							<option value="<?php echo $key; ?>"><?php echo $country; ?></option>
							<?php endforeach; ?>
						</select>

					</div>                                                      

					<div class="form-outline mb-4">
						<input class="form-control form-control-lg" id="inp"  placeholder="Address" type="text" name="address"   value="<?php echo $address; ?>">
						<span class="help-block text-danger small"><?php echo $address_err; ?></span>
					</div>   
					
					<?php if( $is_on ) $google_captcha->output(); ?>
					
					<div class="form-check mb-4">
						<input class="form-control form-control-lg" id="inp" type="hidden" name="referred"  readonly value="<?php echo $refcode; ?>">
						<input id="inp" type="checkbox"  name="terms"  value="" class='form-check-input' >
						<label class='form-check-label'>I accept the <a href='javascript:void(0)'>Terms Of Service</a></label>
						</br>      
					</div>

					<div class="text-center text-lg-start mt-4 pt-2">
						<button type="submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
							Register
						</button>
					</div>

				</form>

				</br>
			
				<p class="small fw-bold mt-2 pt-1 text-center">
					Already a Share Holder? <a href="<?php echo sysfunc::url( __users_login_page ); ?>"class="link-danger">Sign In</a>
				</p>

			</div>


			<!-- Right -->
			</br>  </br>
			
			<div  class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
				<!-- Copyright -->  </br>  </br>
				<div class="text-white mb-3 mb-md-0">
					©  <?php echo $settings['name']; ?>. All Rights Reserved
				</div>
			</div>

		</div>
	</div>

</section>

<?php require __dir__ . '/form-footer.php'; ?>
