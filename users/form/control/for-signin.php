<?php

$email_err = $password_err = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	### verify email;
	if (empty($_POST["email"])) $email_err = "Email is required";
	else {
		$email = sysfunc::sanitize_input($_POST["email"], true);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $email_err = "Invalid email format"; 
	};
	
	### verify password;
	if (empty($_POST["password"])) $password_err = "Password is required";
	else $password = sysfunc::sanitize_input($_POST["password"], true);
    
	### get ip address;
	$ip = $_SERVER['REMOTE_ADDR'];
	
	
	if($email == "" || $password == "") $temp->msg = "Email or Password fields cannot be empty!";
	
	else {
		
		if( defined("admin_login_panel") && isset($temp->admin_login) ) {
			
			### Login As Admin
			
			($temp->admin_login)();
			
		} else {
				
			### Login As Member 
			
			$result = $link->query("
				SELECT * FROM users 
				WHERE email='$email' AND password= '$password'
			");
			
			if( $result->num_rows ) {
				
				$__user = $result->fetch_assoc();
				
				if( empty($__user['confirm']) ) $temp->msg = "Please wait for administrator's approval on your account for activation!";
					
				else {
						 
					if( !empty($__user['2fa']) ){
						
						header("location:" . sysfunc::url( __users_contents . "/login.php?email=$email") );
						die;
						
					} else {
						
						### save user data in session;
						
						$_SESSION['users:email'] = $email;
						$_SESSION['password'] = $password;
						
						$date = date("Y/m/d");
						
						header("location:" . sysfunc::url( __users_contents . "/index.php"));
						
						### send Email;
						$mail = sysfunc::initMail();
						$mail->addAddress($__user['email'], $__user['username']);
						$mail->Subject = "Account Details";
						
						$temp->mailMsg = "
							Your account was logged in from (IP: {$ip}) on " . date("F j, Y, g:i a") .". <br>
							If you did not login from this device, contact your account manager to secure your account.
						";

						$mail->Body = (new email_handler())->message( trim($temp->mailMsg), $__user['username'] );
						
						if($mail->send()) $temp->msg =  "Message has been sent successfully!";
						else $temp->msg = "Something went wrong. Please try again later!";
						
						exit;
						
						// endpoint;
					};
				};
				  
			} else $temp->msg = "Email or Password incorrect!";
		
		}; // Login as Member;
			
	}
		
};
			 
		
		
	
	



