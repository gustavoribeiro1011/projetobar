<script>

$("#sidebarToggle").on('click', function(e) {

	var status = 'toggled';

	$.ajax({
		type: "POST",
		url: '<?php echo BASEURL;?>models/sidebar/ModelSidebar.php',
		data: {
			status:status
		},

		success: function(data) {

			
				//alert(data);
	

		} 


	});

});

</script>

