<?php

include('header.php');

?>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		.modal-open .modal {
			overflow-x: hidden;
			overflow-y: auto;
		}
</style>
</head>
<body>
<br />
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="exam.php">Exam List</a></li>
    	<li class="breadcrumb-item active" aria-current="page">Questions</li>
  	</ol>
</nav>
<div class="card"  style="border: none;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Question</h3>
			</div>
		</div>
	</div>
	</div>
	<div class="card-body">
		<span id="message_operation"></span>
		<div class="table-responsive">
			<table id="question_data_table" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Questions</th>
						<th>Right Answer</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
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
						  	<i class="far fa-edit" style="padding-right: 0.6em !important;"></i> 
							  <b>Edit Question</b>
						</span>  
					</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>

        		<div class="modal-body">
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Question</label>
            			<div class="center">

						<!--AYAN HERE ARE SOME CHANGES-->

              				<!--label class="col-md-4 text-right">Question Title <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="question_title" id="question_title" style="height:1.2em; margin-top: -10px;"  autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 1</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 1 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_1" id="option_title_1" style="height:1.2em; margin-top: -10px;"  autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 2</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 2 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_2" id="option_title_2" style="height:1.2em; margin-top: -10px;"  autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 3</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 3 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_3" id="option_title_3" style="height:1.2em; margin-top: -10px;"  autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Option 4</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Option 4 <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<input type="text" name="option_title_4" id="option_title_4" style="height:1.2em; margin-top: -10px;"  autocomplete="off" class="form-control" />
	                		</div>
            			</div>
          			</div>
          			<div class="form-group">
					  <label style="margin-left: 4%; Color: #b30086">Answer Key</label>
            			<div class="center">
              				<!--label class="col-md-4 text-right">Answer <span class="text-danger">*</span></label-->
	              			<div class="col-md-12">
	                			<select name="answer_option" id="answer_option" class="form-control">
	                				<option value="">Select</option>
	                				<option value="1">1 Option</option>
	                				<option value="2">2 Option</option>
	                				<option value="3">3 Option</option>
	                				<option value="4">4 Option</option>
	                			</select>
	                		</div>
            			</div>
          			</div>
        		</div>

	        	<div class="modal-footer">
	        		<input type="hidden" name="question_id" id="question_id" />
	          		<input type="hidden" name="online_exam_id" id="hidden_online_exam_id" />
	          		<input type="hidden" name="page" value="question" />
	          		<input type="hidden" name="action" id="hidden_action" value="Edit" />
	          		<!--input type="submit" name="question_button_action" id="question_button_action" class="btn btn-success btn-sm" value="Add" /-->
	          		<button type="button" class="btn btn-gray btn-sm" style="height: 35px; width: 100px;" data-dismiss="modal"><span style="color: grey;">Cancel</span></button>
					<!--i class="far fa-trash-alt fa-lg" style="padding-right: 1em !important;" data-dismiss="modal"></i-->
					<button type="Submit" id="question_button_action" class="btn btn-sm" style="background: #b30086; height: 35px; width: 100px;">Edit</button>
	        	
				<!--AYAN HERE ARE SOME CHANGES-->
				
				</div>
        	</div>
    	</form>
  	</div>
</div>



<script>

$(document).ready(function(){
	
var code = "<?php echo $_GET["code"]; ?>";

var dataTable = $('#question_data_table').DataTable({
	"processing" :true,
	"serverSide" :true,
	"order" :[],
	"ajax" :{
		url:"ajax_action.php",
		method:"POST",
		data:{action:'fetch', page:'question', code:code}
	},
	"columnDefs":[
		{
			"targets" :[2],
			"orderable":false,
		}
	],
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

	function reset_question_form()
	{
		$('#question_button_action').val('Edit');
		$('#question_form')[0].reset();
		$('#question_form').parsley().reset();
	}

	var question_id = '';

	$(document).on('click', '.edit', function(){
		question_id = $(this).attr('id');
		reset_question_form();
		$.ajax({
			url:"ajax_action.php",
			method:"POST",
			data:{action:'edit_fetch', question_id:question_id, page:'question'},
			dataType:"json",
			success:function(data)
			{
				$('#question_title').val(data.question_title);
				$('#option_title_1').val(data.option_title_1);
				$('#option_title_2').val(data.option_title_2);
				$('#option_title_3').val(data.option_title_3);
				$('#option_title_4').val(data.option_title_4);
				$('#answer_option').val(data.answer_option);
				$('#question_id').val(question_id);
			//	$('#question_modal_title').text('Edit Question Details');
				$('#questionModal').modal('show');
			}
		})
	});

});

</script>

<br />
<?php

include('footer.php');

?>
</body>
</html>