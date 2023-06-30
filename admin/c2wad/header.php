<!DOCTYPE html>
<html>
<head>
  
  <?php require __core_views . '/head-tags.php'; ?>
	
  <link rel="stylesheet" href="<?php echo sysfunc::url( __core_vendors . '/dist/css/AdminLTE.min.css' ); ?>">
  <link rel="stylesheet" href="<?php echo sysfunc::url( __admin_contents . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ); ?>">
  <link rel="stylesheet" href="<?php echo sysfunc::url( __core_vendors . '/css/page.css' ); ?>">
  <link rel="stylesheet" href="<?php echo sysfunc::url( __dir__ . '/assets/admin.css' ); ?>">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body>
	<div class="wrapper">
		
		
		<header class="main-header" >
			<!-- Logo -->
			<a  class="logo">
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg text-white text-bold"><b>ADMIN PANEL</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a  class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
				</a>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar" >
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel text-white text-center font-weight-bold d-none"></div>
				<ul class="sidebar-menu mt-2 mt-md-0" data-widget="tree" >
					<li>
						<a href="<?php echo sysfunc::url( __admin_contents . '/index.php?' ); ?>">
							<i class="fa fa-home"></i> Home 
						</a>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-lock"></i>
						<span> Security</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="password.php"><i class="fa fa-refresh"></i>Change Password</a></li>
							<li><a href="deactivate.php"><i class="fa fa-times"></i> Deactive Authenticator</a></li>
							<li><a href="recaptcha.php"><i class="fa fa-times"></i>ReCaptcha</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-bank"></i>
						<span> Gateways</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="addwallet.php"><i class="fa  fa-plus"></i> Add Gateway</a></li>
							<li><a href="ivtpackages.php"><i class="fa  fa-edit"></i> Manage Gateway</a></li>
						</ul>
					</li>
					<li><a href="settings.php">
						<i class="fa  fa-cog"></i> Settings</a>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-user-circle"></i>
						<span> Users </span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="users.php"><i class="fa fa-users"></i> View All</a></li>
							<li><a href="../../users/form/signup.php"><i class="fa fa-user-plus"></i> Add New</a></li>
							<li><a href="verify.php"><i class="fa fa-check-circle"></i> Approvals </a></li>
							<li><a href="edit.php"><i class="fa fa-users"></i> Manage Users</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-credit-card"></i>
						<span> Transactions</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="withdraw.php"><i class="fa fa-send"></i> Withdrawal Request</a></li>
							<li><a href="deposit.php"><i class="fa fa-bank"></i> Deposited Orders</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-btc"></i>
						<span>Shares</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="package2.php"><i class="fa fa-plus"></i>Add New</a></li>
							<li><a href="upgrade.php"><i class="fa fa-eye"></i> View All</a></li>
							<li><a href="scat.php"><i class="fa fa-folder-open"></i>Category</a></li>
							<li><a href="actshares.php"><i class="fa fa-calendar-check-o"></i> Active List</a></li>
							<li><a href="editshares.php"><i class="fa fa-pencil"></i> Edit Shares</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
						<i class="fa fa-comments-o"></i>
						<span>Messages</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-down pull-right"></i>
						</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="inmessage.php"><i class="fa fa-comment-o"></i> Send Message</a></li>
							<li><a href="viewmail.php"><i class="fa fa-bookmark"></i> View Messages</a></li>
							<li><a href="sendmail.php"><i class="fa fa-envelope"></i>Send Mail</a></li>
						</ul>
					</li>
					<li><a href="log-outa.php">
						<i class="fa  fa-sign-out"></i> Log-out</a>
					</li>
				</ul>
			
			</section>
			<!-- /.sidebar -->
		</aside>

		<div class="content-wrapper pt-4 pt-md-0">
			<!-- Main content -->
			<section class="content">

