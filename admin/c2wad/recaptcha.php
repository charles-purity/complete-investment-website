<?php 

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $save = sysfunc::set_json_config('gcaptcha', $_POST);   
    $msg = $save ? "The captcha info was saved" : "The request failed";
}

require 'header.php';

$captcha = sysfunc::get_json_config('gcaptcha') ?? [];

?>

   <div class="card">
      <div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				GOOGLE RECAPTCHA
			</h5>
		</div>
         <div class="card-body">
            <div class="col-md-12 col-sm-12 col-sx-12">
				
				<?php sysfunc::html_notice( $msg, $save ?? null ); ?>
				
				<div class=''>
				    <form method='POST'>
				        
				        <div class='form-group'>
				            <label class='form-label'>Status</label>
				            <select name='recaptcha_status' class='form-control'>
				                <?php 
				                    foreach( array( "1" => 'On', "0" => 'Off') as $key => $value ):
				                        $select = (int)$key == ((int)$captcha['recaptcha_status']) ? "selected" : null;
				                ?>
				                <option value='<?php echo $key; ?>' <?php echo $select; ?>><?php echo $value; ?></option>
				                <?php endforeach; ?>
				            </select>
				        </div>
				        
				        <div class='form-group'>
				            <label class='form-label'>Site Key</label>
				            <input type='text' name='site_key' class='form-control' placeholder='eg 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI' value="<?php echo $captcha['site_key'] ?? null; ?>">
				        </div>
				        
				        <div class='form-group'>
				            <label class='form-label'>Secret Key</label>
				            <input type='text' name='secret_key' class='form-control' placeholder='eg 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe' value='<?php echo $captcha['secret_key']; ?>'>
				        </div>
				        
				        <div class='form-group'>
				            <button class='btn btn-primary' type='submit'>Save</button>
				        </div>
				        
				    </form>
				</div>
				
			</div>
		</div>
	</div>

<?php

require 'footer.php';