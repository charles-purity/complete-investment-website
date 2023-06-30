<?php

require __dir__ . '/sub-config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$msg = call_user_func(function() use($link) {
		
		foreach( $_POST as $key => $value ) {
			$_POST[$key] = sysfunc::sanitize_input($value);
			if( empty($_POST[$key]) ) return ["All fields are required", 0];
		};

		$email = $_POST['email'];
		$title = $_POST['title'];
		$message = $_POST['message'];
		$msgid = sysfunc::keygen(10);

		$sql = "INSERT INTO adminmessage (email, message, title, msgid) VALUES ('$email','$message','$title','$msgid')";
        if(mysqli_query($link, $sql)){
			$msg = ["Message sent!", 1];
		}else{
			$msg = ["Message not sent!", 0];
		};
		
		return $msg;
		
	});
	
	if( $msg[1] ) $_POST = sysfunc::clear_input($_POST);
	
}



include "header.php";


    ?>


   <div class="card">
      <div class="card-header">
         <h5 class='text-center text-md-left mb-0'>
			SEND PRIVATE MESSAGE
			</h5>
         </div>
		 
         <div class="card-body">
		 
			<?php sysfunc::html_notice( $msg[0] ?? null, $msg[1] ?? null ); ?>
			
            <form class="form-horizontal" action="inmessage.php" method="POST" >
               <legend>Private Message </legend>
               <div class="form-group">
                  <input type="email" name="email" placeholder="Recipient Email"  class="form-control" required value="<?php echo $_POST['email'] ?? null; ?>">
               </div>
               <div class="form-group">
                  <input type="text" name="title" placeholder="Title"  class="form-control" required value="<?php echo $_POST['title'] ?? null; ?>">
               </div>
               <div class="form-group">
                  <textarea placeholder="write message here" name="message" class="form-control" required><?php echo $_POST['message'] ?? null; ?></textarea>
               </div>
               <button style="" type="submit" class="btn btn-primary" > <i class="fa fa-send"></i>&nbsp; Send Meassage </button>
            </form>
			
         </div>
      </div>

<?php include 'footer.php'; ?>