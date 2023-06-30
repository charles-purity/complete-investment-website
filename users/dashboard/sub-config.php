<?php 

require_once realpath( __dir__ . '/../../' ) . '/config/config.php';

$__user = (new user())->info();

if( !defined('ignore_login_check') ) {
	if( !$__user ) {
		header("location: " . sysfunc::url( __users_login_page ));
		exit;
	};
};

if( !empty($__user) ) {
	### increase investment profit;
	shares::increment( $__user['email'] );
}

require_once __dir__ . '/inc/section.php';