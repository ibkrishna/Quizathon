<?php

//enroll_exam.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

$exam->Change_exam_status($_SESSION['user_id']);

date_default_timezone_set('Asia/Kolkata');

include('header.php');

?>
<style>
		.dataTables_length{
			margin-left: 10px;
		}
		.col-sm-12.col-md-6{
			margin-left: -10px;
		}
</style>
<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<br />
<div class="card"  style="background: rgb(255, 255, 255) !important;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-8">
				<h1 class="panel-title" style="margin: 0;">ASSIGNMENTS</h1>
			</div>
		</div>
	</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="exam_data_table">
				<thead>
					<tr>
						<th>Exam</th>
						<th>Subject</th>
						<th>Assigned by</th>
						<th>Date & Time</th>
						<th>Duration</th>
						<th>Total Question</th>
						<th>Right Answer</th>
						<th>Wrong Answer</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>


<script>

$(document).ready(function(){

	var dataTable = $('#exam_data_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"user_ajax_action.php",
			type:"POST",
			data:{action:'fetch', page:'enroll_exam'}
		},
		"columnDefs":[
			{
				"targets":[7],
				"orderable":false,
			},
		],
	});

});

</script>

<?php

include('footer.php');

?>
</body>
</html>