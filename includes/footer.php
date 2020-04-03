  <script src="assets/js/libs.js"></script>
  <script src="assets/js/app.js"></script>


	<!-- daterangepicker -->
    <?php if(isset($is_date_picker) && $is_date_picker){ ?>
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		<script src="plugins/moment/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript">
			  $(function () {
			  	 var d = new Date();
			      var todayDate = '' + (d.getMonth() + 1) + '/' + d.getDate() + '/' + d.getFullYear();
			    $('#birthday2').daterangepicker({
			      timePicker: false,
			      singleDatePicker: true,
			      locale: {
			        format: 'DD/MM/YYYY'
			      },
			      showDropdowns: true,
			      maxDate: todayDate,
			    })

			  })
		</script>
    <?php } ?>

</body>
</html>