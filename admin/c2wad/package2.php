<?php

require __dir__ . '/sub-config.php';

include 'inc/for-package2.php';

include "header.php";

?>

<div class="card">

	<h5 class='card-header text-center text-md-left mb-0'>
		NEW SHARES
	</h5>
 
	 <div class="card-body">
	 
		<?php sysfunc::html_notice($temp->msg, $temp->status ?? null); ?>
		
		<form class="form-horizontal" action="package2.php" method="POST" >
			<legend>Create New Shares</legend>
			<input type="hidden" name="email"  value="<?php echo $temp->admin['email'];?>" class="form-control">
			<div class="form-group">
				<input type="text" name="pname" placeholder="Shares Name"   class="form-control" required>
			</div>
			<div class="form-group">
				<input type="number" step='0.01'  name="increase" placeholder="Daily Percentage Increase"   class="form-control" required>
			</div>
			<div class="form-group">
				<input type="number" step='0.01'  name="bonus" placeholder="Shares Purchase Bonus"   class="form-control" required>
			</div>
			
			<div class="item form-group">
				<?php if( empty(shares::categories()) ): ?>
					<div class='alert alert-danger'>
						<i class='fa fa-exclamation-circle mr-1'></i> 
						Please <a href='<?php echo sysfunc::url( __admin_contents . '/scat.php' ); ?>' class='font-weight-bold'>Add a category</a> to proceed
					</div>
				<?php endif; ?>
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
					Shares Category <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select  name="sharescat" id="fileToUpload" class="form-control text-capitalize" required >
						<?php
							foreach(shares::categories() as $category):
						?>
						<option value="<?php echo $category;?>"><?php echo $category;?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
					Shares Sub-Category <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select  name="sharesubcat" id="fileToUpload" class="form-control text-capitalize" required >
						<?php
							foreach(shares::categories(true) as $subcat):
						?>
						<option value="<?php echo $subcat;?>">
							<?php echo $subcat;?>
						</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<button style="" type="submit" class="btn btn-info" name="package2" >Create Shares </button>
		</form>
	</div>
</div>

<?php include 'footer.php'; ?>