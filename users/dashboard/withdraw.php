<?php

require __dir__ . '/sub-config.php';

include 'inc/for-withdraw.php';

include "header.php";
 
?>

</script>


<div class="panel-header bg-primary-gradient">

    <?php section::Title("Withdrawal"); ?>
	
    <?php section::price_widget(); ?>
	 
</div>

<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <?php sysfunc::html_notice($msg, $temp->status ?? null); ?>
                            </div>
                            <div class="box-body" style="margin-left:5%">
                                <button type="button" class="btn btn-info" style="width:90%; font-size:30px;padding:40px; color: blue; " >
									<b> 
										<i class="fa fa-money" id="icone"></i> 
										Balance: <?php echo number_format($__user['walletbalance'],2);?> USD
									</b>
                                </button>
                                </br> </br></br>
                                <button style="width:90%" type="button" class="btn btn-success" data-toggle="modal" data-target="#btc">
									Request  Withdrawal
                                </button>
                                </br></br>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="modal modal-success fade" id="btc">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Withdrawal</h4>
                            </div>
                            <div class="modal-body">
								<div class='alert alert-warning'>
									Please ensure that your <a href='<?php echo sysfunc::url( __users_contents . '/bdetails.php' ); ?>'>wallet detail</a> is up to date before you proceed
								</div>
                                <form class="form-horizontal" action="withdraw.php" method="POST" >
                                    <div class="form-group">
                                        <input type="number" step="0.01" name="usd"  placeholder="Value in USD" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="wallet" id="wallet" class="form-control text-capitalize">
                                            <option value=''>Select Wallet type</option>
											<?php 
												$methods = array(
													"pm" => "Perfect Money",
													"eth" => "Ethereum",
													"btc" => "Bitcoin",
													"usdt" => "USD Tether"
												);
												foreach($methods as $key => $value):
													$addr = $__user[$key];
													if( empty($addr) ) continue;
											?>
												<option value="<?php  echo $addr; ?>" data-mode="<?php echo $value; ?>"> 
													<?php echo strtoupper($key); ?> - <?php  echo $addr; ?>
												</option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="mode" id="mode"  readonly placeholder="wallet type" class="form-control">
                                    </div>
									<div class='text-right'>
										<button type="submit" name="btc" class="btn btn-outline">Withdraw</button>
									</div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

				<script>
					(function() {
						var w = document.querySelector('#wallet');
						w.onchange = function() {
							var option = w.children[ w.selectedIndex ];
							document.querySelector('#mode').value = option.dataset.mode;
						};
					})();
				</script>
									
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
    
    ?>