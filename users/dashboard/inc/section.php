<?php 

class section {
	
	public static function Title( $title ) { 
		global $settings;
		$__user = (new user())->info();
?>
	<div class="card py-5">
        <div class="card-body d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class=" pb-2 fw-bold text-capitalize"><?php echo $title; ?></h2>
                <h5 style="swiper" class="op-7 mb-2">
                    <marquee style="" width="50%" >Thanks for investing in <?php  echo $settings['name'];?> have a nice day!</marquee>
                </h5>
            </div>
            </br>
            <div class="ml-md-auto py-2 py-md-0">
                <input type="text" id="myInput" value="<?php echo user::get($__user, 'reflink'); ?>" readonly="true" class='form-control bg-light' />
				<button class="btn btn-primary" data-copy="#myInput">
					Click to copy Referral link
				</button>
            </div>
        </div>
    </div>
	<?php }
	
	public static function price_widget() {
	?>
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
				{
				"symbols": [
				  {
					"title": "S&P 500",
					"proName": "OANDA:SPX500USD"
				  },
				  {
					"title": "Nasdaq 100",
					"proName": "OANDA:NAS100USD"
				  },
				  {
					"title": "EUR/USD",
					"proName": "FX_IDC:EURUSD"
				  },
				  {
					"title": "BTC/USD",
					"proName": "BITSTAMP:BTCUSD"
				  },
				  {
					"title": "ETH/USD",
					"proName": "BITSTAMP:ETHUSD"
				  }
				],
				"colorTheme": "dark",
				"isTransparent": false,
				"displayMode": "adaptive",
				"locale": "en"
				}
			</script>
		</div>
	<?php
	}
	
}