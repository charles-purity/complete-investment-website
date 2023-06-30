<?php

require __dir__ . '/sub-config.php';

include 'header.php';

?>

<div class="panel-header bg-primary-gradient">

    <?php section::title("My Downlines"); ?>
	
    <?php section::price_widget(); ?>
	
</div>

<div class="card" style="margin-top:50px">
	<div class='card-body'>
	
		<div class="row row-card-no-pd mt--2">

			<?php sysfunc::html_notice( $msg ?? null ); ?> 
			
			<div class="col-md-12 col-sm-12 col-sx-12">
				<div class="table-responsive">
					<table class="display table"  id="example">
						<thead>
							<tr class="info">
								<th>Email</th>
								<th>Username</th>
								<th>My Code</th>
								<th>Registered Date</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							
								$sql= "SELECT * FROM users WHERE referred = '{$__user['refcode']}'";
								$result = mysqli_query($link,$sql);
								
								if(mysqli_num_rows($result) > 0):
									while($row = mysqli_fetch_assoc($result)): 

								 ?>
							<tr class="primary">
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['referred'];?></td>
								<td><?php echo $row['date'];?></td>
							</tr>
							<?php
									endwhile;
								endif;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php include 'footer.php'; ?>