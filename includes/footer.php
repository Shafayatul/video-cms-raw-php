  <script src="assets/js/libs.js"></script>
  <script src="assets/js/app.js"></script>


<!-- daterangepicker -->

    <?php if(isset($is_date_picker) && $is_date_picker){ ?>
	    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	    <style>
	    	#datepicker{
	    		background-color: white;
	    	}
	    </style>
	    <script>
	        $('#datepicker').datepicker({
	        	format: 'dd/mm/yyyy',
	        	value: '<?php echo $user['birthday'];?>'
	        });
	    </script>
    <?php } ?>

</body>
</html>