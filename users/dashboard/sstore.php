<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['activate'])){
	
	
  $email = $_POST['email'];
  $usd = $_POST['usd'];
  $cdate = date('Y-m-d H:i:s');


  $sql2= "SELECT * FROM users WHERE email= '$email'";
  $result2 = mysqli_query($link,$sql2);
  if(mysqli_num_rows($result2) > 0){
   $row = mysqli_fetch_assoc($result2);
   $row['walletbalance'];
   $row['activate'];
   $from = $row['froms'];
   $bonus = $row['bonus'];
 

    $sql1 = "UPDATE users SET activate = '1',pdate='$cdate',usd='$usd',walletbalance= walletbalance + $bonus  WHERE email='$email'";
    
    
		
	
  
 

  if(isset($row['activate']) &&  $row['activate'] == '1'){

    $msg = "package is already active!";

  }else{
	
if(isset($row['walletbalance']) && isset($row['froms']) && $row['walletbalance'] >= $from && $row['walletbalance'] >= $usd && $usd >= $from){


  mysqli_query($link, $sql1);
	
  $msg = "Your package is successfully activated!";


}else{
		

    $msg = "Package cannot be activated, insufficient balance or amount less than package minimum value ! ";
}
    }
  }

}
	
	
include "header.php";



?>



<div class="row">
    <div class="col-12">
        <div class="box box-inverse box-dark">
            <div class="box-body tickers-block">
                <ul id="webticker-7">
                    <li>
                        <div class="coin-name">ETH/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.01551</div>
                        <div><span class="text-success">Sell:</span> 0.01548</div>
                    </li>
                    <li>
                        <div class="coin-name">EOS/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.32552</div>
                        <div><span class="text-success">Sell:</span> 0.32550</div>
                    </li>
                    <li>
                        <div class="coin-name">ZEC/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.10015</div>
                        <div><span class="text-success">Sell:</span> 0.10013</div>
                    </li>
                    <li>
                        <div class="coin-name">OMG/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.02006</div>
                        <div><span class="text-success">Sell:</span> 0.02004</div>
                    </li>
                    <li>
                        <div class="coin-name">DSH/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.04356</div>
                        <div><span class="text-success">Sell:</span> 0.04354</div>
                    </li>
                    <li>
                        <div class="coin-name">ZEC/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.02286</div>
                        <div><span class="text-success">Sell:</span> 0.02284</div>
                    </li>
                    <li>
                        <div class="coin-name">LOT/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.13355</div>
                        <div><span class="text-success">Sell:</span> 0.13353</div>
                    </li>
                    <li>
                        <div class="coin-name">LTC/BTC</div>
                        <div><span class="text-danger">Buy:</span> 0.11011</div>
                        <div><span class="text-success">Sell:</span> 0.11009</div>
                    </li>
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
						<h4 class="mb-0 text-bold"><?php echo $row["sharescat"];?></h4>
						<h4><?php echo $row["sharesubcat"];?></h4>
						<h4><?php echo $row["increase"];?>%</h4>
						<h4><?php echo $row["sid"];?></h4>
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
        }
		?>
</div>


<?php include 'footer.php'; ?>