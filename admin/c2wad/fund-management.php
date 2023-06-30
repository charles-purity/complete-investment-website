<?php require __dir__ . '/sub-config.php';

$_GET['id'] = is_numeric($_GET['id']) ? $_GET['id'] : 0;

$USER_SQL = "SELECT * FROM users WHERE id = '{$_GET['id']}'";

$client = $link->query( $USER_SQL )->fetch_assoc();

require "inc/for-fund-management.php";

require 'header.php';

?>

	<div class='card'>
		<h5 class='card-header'>
			Manage Fund
		</h5>
		<div class='card-body'>
		
			<div class='row'>
			
				<?php if( !$client ): ?>
					
					<div class='text-center col-lg-7 m-auto py-4'>
						<div class='border p-3 rounded'>
							<h3>Sorry! <br> No user was found</h3>
							<p class='text-capitalize'>Cannot manage fund of unknown user</p>
							<a href='edit.php' class='btn btn-primary'>Go Back</a>
						</div>
					</div>
					
				<?php else: ?>
					
					<div class='col-md-12'>
					
						<p><strong>Username:</strong> <?php echo $client['username']; ?></p>
						<p><strong>Email:</strong> <?php echo $client['email']; ?></p>
						<p><strong>Balance:</strong> $<?php echo number_format($client['walletbalance'], 2); ?></p>
						
						<hr>
						
						<?php sysfunc::html_notice( $msg, $status ?? null ); ?>
						
						<div class='row my-4'>
							<div class='col-lg-8 m-auto'>
								<div class='border px-3 py-4'>
								
									<form method='POST'>
										
										<div class='form-group'>
											<select type='text' class='form-control' name='type'>
												<option value='credit'>Credit User</option>
												<option value='debit'>Debit User</option>
											</select>
										</div>
										
										<div class='form-group'>
											<div class='input-group'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>$</span>
												</div>
												<input type='number' class='form-control' placeholder='amount' step='0.001' name='amount' required>
											</div>
										</div>
										
										<hr>
										
										<div class='form-group'>
											<textarea class='form-control' rows='7' placeholder='Write Reason' name='reason'></textarea>
										</div>
										
										<div class=''>
											<button class='btn btn-primary btn-block' type='submit'>
												Update Balance
											</button>
										</div>
									
									</form>
									
								</div>
							</div>
						</div>
						
					</div>
					
				<?php endif; ?>
			
			</div>
			
		</div>
	</div>

<?php require 'footer.php';