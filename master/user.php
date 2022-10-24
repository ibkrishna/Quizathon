<?php

include('header.php');

?>
<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
		.dataTables_length{
			margin-left: 10px;
		}
		.col-sm-12.col-md-6{
			margin-left: -10px;
		}
		body.modal-open {
		overflow: hidden;
		}
</style>
</head>
<body>
<br />
<div class="card"  style="border: none;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h1 class="panel-title" style="margin: 0;">STUDENTS RECORD</h1>
			</div>
			<!--div class="col-md-3" align="right">
				<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
			</div-->
		</div>
	</div>
	</div>
	<div class="card-body">
		<span id="message_operation"></span>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="user_data_table">
				<thead>
					<tr>
						<th>Image</th>
						<th>Student Name</th>
						<th>Branch</th>
						<th>Roll No</th>
						<th>Email Address</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="detailModal">
  	<div class="modal-dialog modal-dialog-lg">
    	<div class="modal-content">

      		<div class="modal-header">
        		<h4 class="modal-title">Student Detail</h4>
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		</div>

      		<div class="modal-body" id="user_details">
        		
      		</div>

			<!--Ayan change it-->
      		<!--div class="modal-footer">
        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      		</div-->
    	</div>
  	</div>
</div>

<script>

$(document).ready(function(){
	
	var dataTable = $('#user_data_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"ajax_action.php",
			type:"POST",
			data:{action:'fetch', page:'user'}
		},
		"columnDefs":[
			{
				"targets":[0,6],
				"orderable":false,
			},
		],
	});

	$(document).on('click', '.details', function(){
		var user_id = $(this).attr('id');
		$.ajax({
	      	url:"ajax_action.php",
	      	method:"POST",
	      	data:{action:'fetch_data', user_id:user_id, page:'user'},
	      	success:function(data)
	      	{
	        	$('#user_details').html(data);
	        	$('#detailModal').modal('show');
	      	}
	    });
	});

});

</script><br />
<?php

include('footer.php');

?>
</body>
</html>