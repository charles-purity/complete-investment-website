<?php

require __dir__ . '/sub-config.php';

include "header.php";

?>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div id="tradingview_eb21e"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/AAPL/" rel="noopener" target="_blank"><span class="blue-text">Apple</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
        new TradingView.MediumWidget(
        {
        "symbols": [
          [
            "Apple",
            "AAPL|1D"
          ],
          [
            "Google",
            "GOOGL|1D"
          ],
          [
            "Microsoft",
            "MSFT|1D"
          ]
        ],
        "chartOnly": false,
        "width": 1000,
        "height": 500,
        "locale": "en",
        "colorTheme": "light",
        "isTransparent": false,
        "autosize": false,
        "showVolume": true,
        "hideDateRanges": false,
        "scalePosition": "right",
        "scaleMode": "Normal",
        "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
        "noTimeScale": false,
        "valuesTracking": "1",
        "chartType": "line",
        "fontColor": "#787b86",
        "gridLineColor": "rgba(42, 46, 57, 0.06)",
        "container_id": "tradingview_eb21e"
        }
        );
    </script>
</div>
<!-- TradingView Widget END -->
<div class="row">
    <div class="col-12">
        <div class="box box-inverse box-dark">
            <div class="box-body tickers-block">
                <ul id="webticker-7">
                    <?php
                        $sql = "SELECT * FROM shared WHERE status = 1";
                        $result = $link->query($sql);
                        
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        
                        $sid = $row["sid"];
                        ?>
                    <li>
                        <div class="coin-name"><?php echo $row["pname"];?></div>
                        <div><span class="text-danger">Buy daily profit:</span> <?php echo $row["increase"];?>%</div>
                        <div><span class="text-success">Sell:</span> <?php echo $row["increase"];?>%</div>
                    </li>
                    <?php  
                        }
                        } else {
                        echo "No Shares Available In Store";
                        }?>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content-header">
    <h1>
        Shares Store  
    </h1>
</section>
</br></br>
<div class="row">
    <?php
        $sql = "SELECT * FROM shared WHERE status = 1";
        $result = $link->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        
        $sid = $row["sid"];
        ?>
    <div class="col-md-6 col-lg-4 col-12">
        <div class="box box-inverse bg-dark">
            <div class="box-body text-center">
                <h4 class="mb-0 text-bold"><?php echo $row["pname"];?></h4>
                <h4 class="mb-0"><?php echo $row["sharescat"];?></h4>
                <h6 class='text-warning'><?php echo $row["sharesubcat"];?></h6>
                <h4><?php echo $row["increase"];?>% <br> <sub>Daily</sub></h4>
				<a href="sdetails.php?id=<?php echo $sid ;?>">
					<button class="btn btn-primary">Buy Shares</button>
				</a> 
            </div>
        </div>
    </div>
    <?php  
        }
        } else {
        echo "No Shares Available In Store";
        }?>
</div>
<section class="content-header">
    <h1>
        My  Shares 
    </h1>
</section>
</br></br>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="media align-items-center p-0">
                    <div class="text-center">
                        <a href="#"><i class="cc USD mr-5" ></i></a>
                    </div>
                    <div>
                        <h6 class="no-margin text-bold"> Shares Profit </h6>
                        <h6 class="no-margin text-bold"> $ <?php echo shares::total_profit($__user['email']); ?></h6>
                    </div>
                </div>
            </div>
            <div class="box-footer p-0 no-border">
                <div class="chart">
                    <canvas id="chartjs1" class="h-80"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="media align-items-center p-0">
                    <div id="package"></div>
                    <div class="text-center">
                        <a href="#"><i class="cc USD mr-5" ></i></a>
                    </div>
                    <div>
                        <h6 class="no-margin text-bold"> Wallet Balance</h6>
                        <h6 class="no-margin text-bold"> $<?php echo round($__user['walletbalance'],2); ?> USD</h6>
                    </div>
                </div>
            </div>
            <div class="box-footer p-0 no-border">
                <div class="chart">
                    <canvas id="chartjs2" class="h-80"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="media align-items-center p-0">
                    <div class="text-center">
                        <a href="#"><i class="cc USD mr-5" ></i></a>
                    </div>
                    <div>
                        <h6 class="no-margin text-bold"> Referral Bonus</h6>
                        <h6 class="no-margin text-bold"> $<?php echo $__user['refbonus'];?> USD</h6>
                    </div>
                </div>
            </div>
            <div class="box-footer p-0 no-border">
                <div class="chart">
                    <canvas id="chartjs3" class="h-80"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 
<?php include 'footer.php'; ?>

