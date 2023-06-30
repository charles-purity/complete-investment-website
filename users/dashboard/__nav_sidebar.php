<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo sysfunc::url( __dir__ ); ?>" class="logo d-none">
		<span class="logo-lg">
			<img src="<?php echo $settings['logourl']; ?>" alt="navbar brand" style="">
		</span>
    </a>
	
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
	
        <!-- Sidebar toggle button-->
        <a href="#" class="btn btn-primary ml-2" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span><i class='fa fa-bars'></i>
        </a>
		
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo user::get($__user, 'avatar'); ?>" class="user-image rounded-circle" alt="avatar">
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li class="user-header">
                            <p class='pl-0 mb-0 text-center text-white'>
                                <?php  echo $__user['username']?>
                                <small class="mb-5"><?php  echo $__user['email']?></small>
								<div class='border-top my-1'></div>
                                <a href="update.php" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="mypackage.php"></i> My Shares</a>
                                </div>
                                <div role="separator" class="divider col-12"></div>
                                <div class="col-12 text-left">
                                    <a href="log-out.php">Logout</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <div class='bg-light p-2 pre-icon text-center'>
        <img src='<?php echo $settings['logourl']; ?>' class='img-fluid'>
    </div>
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="ulogo">
                <a href="<?php echo sysfunc::url( __dir__ ); ?>">
                    <!-- logo for regular state and mobile devices -->
                    <h6><?php  echo $__user['username']?></h6>
                </a>
            </div>
            <div class="image">
                <img src="<?php echo user::get($__user, 'avatar'); ?>" class="rounded-circle" alt="User Image">
            </div>
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="javascript:void(0)" class='pl-0'>
                    <div class='text-center'>
                        <h6 class="no-margin text-bol"> Balance</h6>
                        <h6 class="no-margin text-bold"> 
							$<?php echo round($__user['walletbalance'],2); ?> USD
						</h6>
                    </div>
				</a>
			</li>
			<li class=''> 
				<a href='<?php echo sysfunc::url( __dir__ ); ?>'>
					<span><i class='fa fa-dashboard mr-1'></i> Dashboard</span>
					<span class="pull-right-container"></span>
				</a>
            </li>
            <li class="treeview">
                <a href="#">
                <span><i class='fa fa-credit-card mr-1'></i> Wallet</span>
                <span class="pull-right-container">
                <img src="<?php echo 'a.jpg';?>" style="width:10px" >
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="deposit.php">Deposit Funds</a></li>
                    <li><a href="withdraw.php">Withdraw Funds</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <span><i class='fa fa-user-circle mr-1'></i> My Profile</span>
                <span class="pull-right-container">
                <img src="<?php echo 'a.jpg';?>" style="width:10px" >
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="update.php">
                        <span class="">Update Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="security.php">
                        <span class=""> Security</span>
                        </a>
                    </li>
                    <li>
                        <a href="bdetails.php">
                        <span class="">Wallet Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify.php">
                        <span class=""> Verify Account</span>
                        </a>
                    </li>
					<li class="">
						<a  href="downlines.php">
						<span class=""> My Downlines</span>
						</a>
					</li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <span><i class='fa fa-line-chart mr-1'></i> Shares</span>
                <span class="pull-right-container">
                <img src="<?php echo 'a.jpg';?>" style="width:10px" >
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="sstore.php">
                        <span class=""> Buy Shares</span>
                        </a>
                    </li>
                    <li>
                        <a href="mypackage.php">
                        <span class="">View Shares</span>
                        </a>
                    </li>
                    <li>
                        <a href="transaction_log.php">
                        <span class="">Transaction Logs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <span><i class='fa fa-envelope mr-1'></i> Ticket</span>
                <span class="pull-right-container">
                <img src="<?php echo 'a.jpg';?>" style="width:10px" >
                </span>
                </a>
                <ul class="treeview-menu">
					<li class="">
						<a href="read.php">
						<span class=''> Read Message</span>
						</a>
					</li>
					<li class="">
						<a href="message.php">
						<span class="">Send Message</span>
						</a>
					</li>
                </ul>
            </li>
			<li class=''> 
				<a href='log-out.php'>
					<span><i class='fa fa-sign-out mr-1'></i> Logout </span>
					<span class="pull-right-container"></span>
				</a>
            </li>
        </ul>
    </section>
</aside>
