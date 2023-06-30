<?php

require __dir__ . '/sub-config.php';
require __dir__ . '/control/for-reset.php';

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

				<div class="login-form">
					<form action="<?php echo sysfunc::sanitize_input($_SERVER["PHP_SELF"]);?>" method="POST">
						<input placeholder="Enter your email" id="inp" type="email" name="email" class='form-control form-control-lg'>
						<span class="help-block small text-danger"><?php echo $email_err ?? null; ?></span>
						</br>
						<div class="tp">
							<input type="submit" name="submit" value="Reset" class='btn btn-primary btn-block'>
						</div>
					</form>
				</div>

				<div class="my-4">
					<!-- Checkbox -->
					<p class="small fw-bold mt-2 pt-1 mb-0 text-center">
						Back to <a href="<?php echo sysfunc::url( __users_login_page ); ?>" class="link-danger">Login</a>
					</p>
				</div>

			</div>


			<div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
				<!-- Copyright -->
				<div class="text-white mb-3 mb-md-0">
					©  <?php echo $settings['name']; ?>. All Rights Reserved
				</div>
			</div>

		</div>

	</div>
</section>

<?php require __dir__ . '/form-footer.php'; ?>