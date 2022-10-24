<?php


include('header.php');

date_default_timezone_set('Asia/Kolkata');

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
		.modal-open.modal {
			overflow-x: hidden;
			overflow-y: hidden;
		}
</style>
</head>
<body>
<div class="card"  style="border: none; margin-top: 20px;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h1 class="panel-title" style="margin-top: 0;">ASSIGNMENT</h1>
			</div>
			<div class="col-md-3" align="right">
				<button type="button" id="add_button" class="btn btn-sm" style="width: 120px; height: 43px; border-radius: 20px; background: #b30086;">
				<i class="fa fa-plus" aria-hidden="true" style="padding-right: 1em !important; padding-top: 0.238em !important;"></i> Create
				</button>
			</div>
		</div>
	</div>
</div>
<br />
<div class = "col-md-12">
	<h3 class = "grid" style = "float: right; margin-right: 10px;">
		<a href = "desc.php" id="popover" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Gallery View">
			<i class="fas fa-th" style ="margin-right: 10px; color : grey !important;">
			</i>
		</a>
		<a href ="exam.php" id="popover2" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="List View">
			<i class="fas fa-th-list" style = "margin-right: 10px; color : #000000 !important;"></i>
		</a>
	</h3>
</div>
<script>
$("#popover").popover({ trigger: "hover" });
$("#popover2").popover({ trigger: "hover" });
</script>
<br />
	<div class="card-body">
		<div class="table-responsive">
			<table id="exam_data_table" class="table table-bordered table-striped table-hover">
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
						<th>Question</th>
						<th>Enrollment</th>
						<th>Result</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="formModal">
  	<div class="modal-dialog modal-lg">
    	<form method="post" id="exam_form">
      		<div class="modal-content">

        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">
					  	<span style="color: #b30086 !important; margin-left: 0.3em !important;">
						  	<i class="far fa-clipboard" style="padding-right: 0.6em !important;"></i> 
							  <b>Assignment</b>
						</span>
					</h4>
          			<button type="button" class="close" data-dismiss="modal">
						<span style="margin-right: 0.7em !important;">&times; </span>
					</button>
        		</div>

        		<div class="modal-body">
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Title</label>
            			<div class="center">
	              			<div class="col-md-12">
	                			<input type="text" name="online_exam_title" id="online_exam_title" style="height:1.2em;" class="form-control" />
	                		</div>
            			</div>
          			</div><br /><br />

					<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Subject</label>
            			<div class="center">
	              			<div class="col-md-12">
	                			<input type="text" name="online_exam_subject" id="online_exam_subject" style="height:1.2em;" class="form-control" />
	                		</div>
            			</div>
          			</div><br /><br />

					<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Assigned by</label>
            			<div class="center">
	              			<div class="col-md-12">
	                			<input type="text" name="online_exam_assigned_by" id="online_exam_assigned_by" style="height:1.2em;" class="form-control" />
	                		</div>
            			</div>
          			</div><br /><br />  

				<div class="row justify-content-center">
          			<div class="form-group">
					  <label style="margin-left: 9%; Color: #b30086;">Date & Time</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Exam Date & Time <span class="text-danger">*</span></label-->
	              			<div class="col">
	                			<input type="text" name="online_exam_datetime" id="online_exam_datetime" style="border-color: #ced4da; height:1.2em; text-align: center; " class="form-control" readonly />
	                		</div>
            			</div>
          			</div>
				
          			<div class="form-group">
					  <label style="margin-left: 15%; Color: #b30086">Duration</label>
              				<!--label class="col-md-4 text-right" style="margin-top: 10px">Exam Duration <span class="text-danger">*</span></label-->
	              		<div class="col-md-12">
	                		<select name="online_exam_duration" id="online_exam_duration" style="border-top: none; border-right: none; border-left: none;" class="form-control">
	                			<option value="">Select</option>
	                			<option value="5">5 Minute</option>
	                			<option value="30">30 Minute</option>
	                			<option value="60">1 Hour</option>
	                			<option value="120">2 Hour</option>
	                			<option value="180">3 Hour</option>
	                		</select>
	                	</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 11%; Color: #b30086">No. of Questions</label>
              				<!--label class="col-md-4 text-right" style="margin-top: 10px">Total Question <span class="text-danger">*</span></label-->
	              		<div class="col-md-12">
	                		<select name="total_question" id="total_question" style="border-top: none; border-right: none; border-left: none;" class="form-control">
	                			<option value="">Select</option>
	                			<option value="5">5 Question</option>
	                			<option value="10">10 Question</option>
	                			<option value="25">25 Question</option>
	                			<option value="50">50 Question</option>
	                			<option value="100">100 Question</option>
	                			<option value="200">200 Question</option>
	                			<option value="300">300 Question</option>
	                		</select>
	                	</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 13%; Color: #b30086">Right Answer</label>
              				<!--label class="col-md-4 text-right" style="margin-top: 10px">Marks for Right Answer <span class="text-danger">*</span></label-->
	              		<div class="col-md-12">
	                		<select name="marks_per_right_answer" id="marks_per_right_answer" style="border-top: none; border-right: none; border-left: none;" class="form-control">
	                			<option value="">Select Marks</option>
	                			<option value="1">+1 Mark</option>
	                			<option value="2">+2 Mark</option>
	                			<option value="3">+3 Mark</option>
	                			<option value="4">+4 Mark</option>
	                			<option value="5">+5 Mark</option>
	                		</select>
	                	</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 13%; Color: #b30086">Wrong Answer</label>
              				<!--label class="col-md-4 text-right" style="margin-top: 10px">Marks for Wrong Answer <span class="text-danger">*</span></label-->
	              		<div class="col-md-12">
	                		<select name="marks_per_wrong_answer" id="marks_per_wrong_answer" style="border-top: none; border-right: none; border-left: none;" class="form-control">
	                			<option value="">Select Marks</option>
	                			<option value="1">-1 Mark</option>
	                			<option value="1.25">-1.25 Mark</option>
	                			<option value="1.50">-1.50 Mark</option>
	                			<option value="2">-2 Mark</option>
	                		</select>
	                	</div>
          			</div>
        		</div>
			</div>
	        	<div class="modal-footer">
	        		<input type="hidden" name="online_exam_id" id="online_exam_id" />

	        		<input type="hidden" name="page" value="exam" />

	        		<input type="hidden" name="action" id="action" value="Add" />

					<button type="button" class="btn btn-gray btn-sm" style="height: 35px; width: 100px;" data-dismiss="modal"><span style="color: grey;">Cancel</span></button>
					<!--i class="far fa-trash-alt fa-lg" style="padding-right: 1em !important;" data-dismiss="modal"></i-->
					<input type="submit" name="button_action" id="button_action" style="background: #b30086 !important; height: 35px; width: 100px;" class="btn btn-success btn-sm" value="Add">
					<!--button type="Submit" id="button_action" class="btn btn-sm" style="background: #b30086; height: 35px; width: 100px;">Assign</button-->
	        	</div>
        	</div>
    	</form>
  	</div>
</div>

<div class="modal" id="deleteModal">
  	<div class="modal-dialog">
    	<div class="modal-content">

      		<div class="modal-header">
        		<h4 class="modal-title">Delete Confirmation</h4>
        		<button type="button" class="close" data-dismiss="modal">
				<span style="margin-right: 0.7em !important;">&times; </span>
				</button>
      		</div>

      		<div class="modal-body">
        		<h3 align="center">Are you sure you want to remove this?</h3>
      		</div>

      		<div class="modal-footer">
      			<button type="button" name="ok_button" id="ok_button" class="btn btn-primary btn-sm">Delete</button>
        		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal" id="questionModal">
  	<div class="modal-dialog modal-lg">
    	<form method="post" id="question_form">
      		<div class="modal-content">

        		<div class="modal-header">
          			<h4 class="modal-title" id="question_modal_title">
					  <span style="color: #b30086 !important; margin-left: 0.3em !important;">
						  	<i class="fas fa-clipboard-list" style="padding-right: 0.6em !important;"></i> 
							  <b>Question</b>
						</span>  
					</h4>
          			<button type="button" class="close" data-dismiss="modal">
					  <span style="margin-right: 0.7em !important;">&times; </span>
					</button>
        		</div>


        		<div class="modal-body">
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Question</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Question Title <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="question_title" id="question_title" style="height:1.2em; margin-top: -10px;" autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 1</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 1 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_1" id="option_title_1" style="height:1.2em; margin-top: -10px;" autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 2</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 2 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_2" id="option_title_2" style="height:1.2em; margin-top: -10px;" autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 3</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 3 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_3" id="option_title_3" style="height:1.2em; margin-top: -10px;" autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 4</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 4 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_4" id="option_title_4" autocomplete="off" style="height:1.2em; margin-top: -10px;" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Answer Key</label><br />
            			<div class="center">
              				<!--label class="col-md-4 text-right">Answer <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<select name="answer_option" id="answer_option" class="form-control">
	                				<option value="">Select</option>
	                				<option value="1">Option 1</option>
	                				<option value="2">Option 2</option>
	                				<option value="3">Option 3</option>
	                				<option value="4">Option 4</option>
	                			</select>
	                		</div>
            			</div>
          			</div>
        		</div>

	        	<div class="modal-footer">
	        		<input type="hidden" name="question_id" id="question_id" />

	        		<input type="hidden" name="online_exam_id" id="hidden_online_exam_id" />

	        		<input type="hidden" name="page" value="question" />

	        		<input type="hidden" name="action" id="hidden_action" value="Add" />

	        		<button type="button" class="btn btn-gray btn-sm" style="height: 35px; width: 100px;" data-dismiss="modal"><span style="color: grey;">Cancel</span></button>
	          		<!--button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button-->
					<!--i class="far fa-trash-alt fa-lg" style="padding-right: 1em !important;" data-dismiss="modal"></i-->
					<button type="Submit" id="button_action" class="btn btn-sm" style="background: #b30086; height: 35px; width: 100px;">Add</button>
				</div>
        	</div>
    	</form>
  	</div>
</div>

<script>

$(document).ready(function(){
	
	var dataTable = $('#exam_data_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url: "ajax_action.php",
			method:"POST",
			data:{action:'fetch', page:'exam'}
		},
		"columnDefs":[
			{
				"targets":[7, 8, 9],
				"orderable":false,
			},
		],
	});

	function reset_form()
	{
		//$('#modal_title').text('Add Exam Details');
		$('#button_action').val('Assign');
		$('#action').val('Add');
		$('#exam_form')[0].reset();
		$('#exam_form').parsley().reset();
	}

	$('#add_button').click(function(){
		reset_form();
		$('#formModal').modal('show');
		$('#message_operation').html('');
	});

	var date = new Date();

	date.setDate(date.getDate());

	$('#online_exam_datetime').datetimepicker({
		startDate :date,
		format: 'yyyy-mm-dd hh:ii',
		autoclose:true
	});

	$('#exam_form').parsley();

	$('#exam_form').on('submit', function(event){
		event.preventDefault();

		$('#online_exam_title').attr('required', 'required');
		
		$('#online_exam_subject').attr('required', 'required');

		$('#online_exam_assigned_by').attr('required', 'required');

		$('#online_exam_datetime').attr('required', 'required');

		$('#online_exam_duration').attr('required', 'required');

		$('#total_question').attr('required', 'required');

		$('#marks_per_right_answer').attr('required', 'required');

		$('#marks_per_wrong_answer').attr('required', 'required');

		if($('#exam_form').parsley().validate())
		{
			$.ajax({
				url:"ajax_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function(){
					$('#button_action').attr('disabled', 'disabled');
					$('#button_action').val('Validate...');
				},
				success:function(data)
				{
					if(data.success)
					{
						$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');

						reset_form();

						dataTable.ajax.reload();

						$('#formModal').modal('hide');
					}

					$('#button_action').attr('disabled', false);

					$('#button_action').val($('#action').val());
				}
			});
		}
	});

	var exam_id = '';

	$(document).on('click', '.edit', function(){
		exam_id = $(this).attr('id');

		reset_form();

		$.ajax({
			url:"ajax_action.php",
			method:"POST",
			data:{action:'edit_fetch', exam_id:exam_id, page:'exam'},
			dataType:"json",
			success:function(data)
			{
				$('#online_exam_title').val(data.online_exam_title);

				$('#online_exam_subject').val(data.online_exam_subject);

				$('#online_exam_assigned_by').val(data.online_exam_assigned_by);

				$('#online_exam_datetime').val(data.online_exam_datetime);

				$('#online_exam_duration').val(data.online_exam_duration);

				$('#total_question').val(data.total_question);

				$('#marks_per_right_answer').val(data.marks_per_right_answer);

				$('#marks_per_wrong_answer').val(data.marks_per_wrong_answer);

				$('#online_exam_id').val(exam_id);

			//	$('#modal_title').text('Edit Exam Details');

				$('#button_action').val('Edit');

				$('#action').val('Edit');

				$('#formModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		exam_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});

	$('#ok_button').click(function(){
		$.ajax({
			url:"ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, action:'delete', page:'exam'},
			dataType:"json",
			success:function(data)
			{
				$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
				$('#deleteModal').modal('hide');
				dataTable.ajax.reload();
			}
		})
	});

	function reset_question_form()
	{
	//	$('#question_modal_title').text('Add Question');
		$('#question_button_action').val('Add');
		$('#hidden_action').val('Add');
		$('#question_form')[0].reset();
		$('#question_form').parsley().reset();
	}

	$(document).on('click', '.add_question', function(){
		reset_question_form();
		$('#questionModal').modal('show');
		$('#message_operation').html('');
		exam_id = $(this).attr('id');
		$('#hidden_online_exam_id').val(exam_id);
	});

	$('#question_form').parsley();

	$('#question_form').on('submit', function(event){
		event.preventDefault();

		$('#question_title').attr('required', 'required');

		$('#option_title_1').attr('required', 'required');

		$('#option_title_2').attr('required', 'required');

		$('#option_title_3').attr('required', 'required');

		$('#option_title_4').attr('required', 'required');

		$('#answer_option').attr('required', 'required');

		if($('#question_form').parsley().validate())
		{
			$.ajax({
				url:"ajax_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function(){
					$('#question_button_action').attr('disabled', 'disabled');

					$('#question_button_action').val('Validate...');
				},
				success:function(data)
				{
					if(data.success)
					{
						$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');

						reset_question_form();
						dataTable.ajax.reload();
						$('#questionModal').modal('hide');
					}

					$('#question_button_action').attr('disabled', false);

					$('#question_button_action').val($('#hidden_action').val());
				}
			});
		}
	});

});

</script>

<?php

include('footer.php');

?>
</body>
</html>