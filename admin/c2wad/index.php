<?php

require __dir__ . '/sub-config.php';

include "inc/investors_query.php";

include "header.php";

?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
				<div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Total Users</h4>
					<h3><i class="fa fa-users text-warning"></i></h3>
				</div>
                  <h3><?php echo $total;?></h3>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-12 mb-3" >
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Total Trades</h4>
					<h3><i class="fa fa-line-chart text-info"></i></h3>
				</div>
                  <h3> <?php echo $total1 ;?></h3>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                  <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Withdrawal Requests</h4>
					<h3><i class="fa fa-credit-card text-info"></i></h3>
				</div>
                  <h3>	<?php echo $total3;?></h3>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                  <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Deposit Requests</h4>
					<h3><i class="fa fa-usd text-info"></i></h3>
				</div>
                  <h3>	<?php echo $deposits;?></h3>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                  <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Online Users</h4>
					<h3><i class="fa fa-podcast text-info"></i></h3>
				</div>
                  <h3>	<?php echo $total2;?></h3>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                  <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Total Withdrawals</h4>
					<h3><i class="fa fa-paper-plane text-info"></i></h3>
				</div>
                  <h3>
                  $<?php echo round($withdraw,2);?> USD
                  <h3>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-xs-12 mb-3">
            <!-- small box -->
            <div class="card">
               <div class="card-body">
                  <div class='d-flex justify-content-between'>
					<h4 class='text-muted'>Total Deposits</h4>
					<h3><i class="fa fa-bank text-info"></i></h3>
				</div>
                  <h3>
                  $<?php echo round($deposit,2);?> USD
                  <h3>
               </div>
            </div>
         </div>
      </div>

 
<?php require "footer.php"; 