<?php 

// Define variables and initialize with empty values

$username = $email = $password = $cpassword = $address = $phone = $country = null;
$username_err = $email_err = $password_err = $cpassword_err =  $address_err = $phone_err = $country_err =  null;

$refcode = sysfunc::sanitize_input($_GET['refcode'] ?? '');

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if( $is_on && $google_captcha->verify() == false ) $temp->msg = "Sorry! Please verify the captcha";
	
	else if( !isset($_POST['terms']) ) $temp->msg =  "You have to accept terms and condition!";

    else {
		
		$db_values = array();
		
		### sanitize every input in $_POST
		foreach( $_POST as $key => $value ) {
			$_POST[$key] = sysfunc::sanitize_input($value);
		};
		
		### 
		function confirm_uniqueness($key, ?string $label = null, &$var) {
			global $link, $db_values;
			if( is_null($label) ) $label = $key;
			if( empty($_POST[$key]) ) return "Please enter a {$label}";
			else {
				$sql = "SELECT id FROM users WHERE {$key} = '" . $_POST[$key] . "'";
				$exists = $link->query($sql)->num_rows;
				if( $exists ) return "The {$label} is already taken";
				$var = $db_values[$key] = $_POST[$key];
			};
		};
		
		### verify username;
		$username_err = confirm_uniqueness('username', null, $username);
		
		### verify email;
		$email_err = confirm_uniqueness('email', null, $email);
		
		
		### validate password;
		if(empty($_POST["password"])) $password_err = "Please enter a password.";     
		else if(strlen($_POST["password"]) < 6) $password_err = "Password must have atleast 6 characters.";
		else $password = $db_values['password'] = trim($_POST["password"]);
		
		
		### validate confirm password
		if(empty($_POST["cpassword"])) $cpassword_err = "Please confirm password.";     
		else if(empty($password_err) && ($password != $_POST['cpassword'])) $cpassword_err = "Password did not match.";
		
		
		// Check input errors before inserting in database
		$is_valid = ( !$username_err && !$email_err && !$password_err && !$cpassword_err );
		
		if( $is_valid ) {
		
			foreach(['phone', 'country', 'address', 'referred', 'bonus'] as $key) {
				$ref = ($key == 'bonus') ? 'walletbalance' : $key;
				$db_values[$ref] = $_POST[$key];
			};

			$db_values['token'] = sysfunc::keygen(10, true);
			$db_values['refcode'] = sysfunc::keygen(10);
			
			### prepare database column
			$the_columns = implode(', ', array_keys($db_values));
			
			### prepare database values;
			$the_values = array_map(function($value) {
				return "'{$value}'";
			}, array_values($db_values));
			
			$the_values = implode(', ', $the_values);
			
			// Prepare an insert statement
			$sql = "INSERT INTO users ($the_columns) VALUES ($the_values)";
			
			$inserted = $link->query( $sql );
			
			if( $inserted ) {
				
				$temp->mailMsg = "You will receive a notification once your account has been activated!";
				
				$eh = (new email_handler())->setTitle( "Thank you for Registering on {$settings['name']}" );
				
				$mail = sysfunc::initMail();
				$mail->addAddress($email);
				
				$mail->Subject = "Email Verification";
				$mail->Body = $eh->message( $temp->mailMsg );
				
				if(!$mail->send()) $temp->msg = "Mailer Error: " . $mail->ErrorInfo;
				else $temp->msg =  "Registration Successful! <br> We have sent a message to your Email";
				
			} else $temp->msg = "Something went wrong! <br> Request could not be handled";
			
		};

	}

}