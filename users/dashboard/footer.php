<script>  
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");
    
      /* Select the text field */
      copyText.select();
    
      /* Copy the text inside the text field */
      document.execCommand("copy");
    
      /* Alert the copied text */
      alert("Copied the text: " + copyText.value);
    }
</script> 

				</section>
			<!-- /.content -->
			</div>
			
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				&copy; 2022 <a href="<?php echo sysfunc::url( MAIN_DIR ); ?>"><?php echo $settings['name']; ?></a>. All Rights Reserved.
			</footer>
			
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>

	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<?php require __core_views . '/foot-tags.php'; ?>
	
	<script src="<?php echo sysfunc::url( __core_vendors . '/components/Web-Ticker-master/jquery.webticker.min.js' ); ?>"></script>
	
	<!-- Chart -->
	<script src="<?php echo sysfunc::url( __core_vendors . '/components/chart.js/Chart.min.js' ); ?>"></script>
	<script>$(document).ready(function(){$("#package").load("js/pages/widget-charts2.php");}); </script>
	<script src="<?php echo sysfunc::url( __core_vendors . '/components/echarts-master/dist/echarts-en.min.js' ); ?>"></script>
	<script src="<?php echo sysfunc::url( __core_vendors . '/components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js' ); ?>"></script>
	
	<!-- This is data table -->
    <script src="<?php echo sysfunc::url( __core_vendors . '/components/DataTables-1.10.15/media/js/jquery.dataTables.min.js' ); ?>"></script>
	
	<!-- Unique_Admin App -->
	<script src="<?php echo sysfunc::url( __dir__ . '/js/template.js' ); ?>"></script>
	<script src="<?php echo sysfunc::url( __dir__ . '/js/pages/dashboard-3.js' ); ?>"></script>
	<script src="<?php echo sysfunc::url( __dir__ . '/js/pages/dashboard-chart-3.js' ); ?>"></script>
	<script src="<?php echo sysfunc::url( __dir__ . '/js/demo.js' ); ?>"></script>
	
	<script src="<?php echo sysfunc::url( __dir__ . '/js/main.js' ); ?>"></script>

	
</body>

</html>
