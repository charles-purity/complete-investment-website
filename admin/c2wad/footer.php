	</section>
</div>


<?php require __core_views . '/foot-tags.php'; ?>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button);</script>


<script src="<?php echo sysfunc::url( __core_vendors . '/components/jquery-sparkline/dist/jquery.sparkline.min.js' ); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo sysfunc::url( __core_vendors . '/components/jvectormap/jquery-jvectormap-1.2.2.min.js' ); ?>"></script>
<script src="<?php echo sysfunc::url( __core_vendors . '/components/jvectormap/jquery-jvectormap-world-mill-en.js' ); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo sysfunc::url( __core_vendors . '/components/jquery-knob/dist/jquery.knob.min.js' ); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo sysfunc::url( __core_vendors . '/components/moment/min/moment.min.js' ); ?>"></script>
<script src="<?php echo sysfunc::url( __core_vendors . '/components/bootstrap-daterangepicker/daterangepicker.js' ); ?>"></script>
<!-- datepicker -->
<script src="<?php echo sysfunc::url( __core_vendors . '/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ); ?>"></script>
<script>
$(document).ready(function(){$("#vendors").load("inc/for-package.php");}); </script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo sysfunc::url( __core_vendors . '/components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ); ?>"></script>

<script src="<?php echo sysfunc::url( __core_vendors . '/dist/js/adminlte.min.js' ); ?>"></script>
<script src="<?php echo sysfunc::url( __core_vendors . '/dist/js/pages/dashboard.js' ); ?>"></script>
<script src="<?php echo sysfunc::url( __core_vendors . '/dist/js/demo.js' ); ?>"></script>

</body>
</html>