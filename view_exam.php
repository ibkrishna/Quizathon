<?php


include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

include('header.php');

$exam_id = '';
$exam_status = '';
$exam_title = '';
$total_question ='';
$total_mark='';
$remaining_minutes = '';
$marks_per_right_answer ='';
$marks_per_wrong_answer ='';

if(isset($_GET['code']))
{
	$exam_id = $exam->Get_exam_id($_GET["code"]);
	$exam->query = "
	SELECT online_exam_status, online_exam_title, total_question, marks_per_right_answer, marks_per_wrong_answer, online_exam_datetime, online_exam_duration FROM online_exam_table 
	WHERE online_exam_id = '$exam_id'
	";

	$result = $exam->query_result();

	foreach($result as $row)
	{
		$exam_status = $row['online_exam_status'];
		$exam_title = $row['online_exam_title'];
		$marks_per_wrong_answer = $row['marks_per_wrong_answer'];
		$marks_per_right_answer = $row['marks_per_right_answer'];
		$total_question = $row['total_question'];
		$exam_star_time = $row['online_exam_datetime'];
		$duration = $row['online_exam_duration'] . ' minute';
		$exam_end_time = strtotime($exam_star_time . '+' . $duration);

		$exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
		$remaining_minutes = strtotime($exam_end_time) - time();
	}
}
else
{
	header('location:enroll_exam.php');
}

if(isset($_GET['code']))
{
	$exam_id = $exam->Get_exam_id($_GET["code"]);
	$exam->query = "
	SELECT SUM(marks) as total_mark FROM user_exam_question_answer 
	WHERE user_id = '".$_SESSION['user_id']."' 
	AND exam_id = '".$exam_id."'
	";

	$result = $exam->query_result();

	foreach($result as $row)
	{
		$total_mark = $row['total_mark'];
	}
}
?>

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<br />
<?php
if($exam_status == 'Started')
{
	$exam->data = array(
		':user_id'		=>	$_SESSION['user_id'],
		':exam_id'		=>	$exam_id,
		':attendance_status'	=>	'Present'
	);

	$exam->query = "
	UPDATE user_exam_enroll_table 
	SET attendance_status = :attendance_status 
	WHERE user_id = :user_id 
	AND exam_id = :exam_id
	";

	$exam->execute_query();

?>
<style>
	.body{
		background: rgb(252, 252, 252);
	}
	.btn.btn-hover{
		background: transparent;
	}
	p{
		color: #808080;
	}
	.timer{
		max-width:150px;
		width: 100%; 
		height: 70px;
	}
	.modal-body{
		text-align: center;
	}
	.close{
		margin-top: 4px;
		margin-right: 14px;
		text-align: right;
	}
	.modal-title{
		text-align: center;
	}
	body.modal-open {
    overflow: hidden;
	}
	.btn.btn-primary{
		background: rgb(8, 189, 128) !important;
	}
	.btn.btn-secondary{
		background: rgb(240, 244, 247) !important;
	}
</style>
<body>
	<div class="row justify-content-around">
		<div class="col-md-8">
			<div class="row justify-content-around">
				<div class="col-md-8" align="left">
					<p style="margin: 5% 0;"><?php echo $exam_title; ?> 
					<i class="fas fa-info-circle" data-toggle="modal" data-target="#exampleModal2"></i></p>
				</div>
				<div align="right">
					<div id="exam_timer" class="timer" data-timer="<?php echo $remaining_minutes; ?>"></div>
				</div>
			</div>
		</div>	
		<div class="col-md-4">
			<div align="right" style="margin-top: 2%;">
				<!--a href="enroll_exam.php"-->
				<button type="button" class="btn btn-hover" data-toggle="modal" data-target="#exampleModal">
					<p style="margin: 0px;">End test</p>
				</button>
				<!--/a-->
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-md-8">
		<!--div class="card">
			<div class="card-header">Online Exam</div-->
			<div class="card-body">
				<div id="single_question_area"></div>
			</div>
		<!--/div>
		<br />
		<div id="user_details_area"></div-->
	</div>
	<div class="col-md-4 justify-content-around">
	<br />
		<div id="question_navigation_area"></div>	
	</div>
</div>

<div class="modal fade bottom" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!--div class="modal-header" style="border-bottom: none;"-->
	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<br />
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to end the test?</h5>
      <!--/div-->
      <div class="modal-body">
		<div class="row justify-content-center" style="margin-top: 2%;">
			
		</div>
	  </div>
      <div class="modal-footer justify-content-center" style="border-top: none;">
	    <a class="btn btn-primary" href="enroll_exam.php">End test</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><p style="margin: 0;">Resume</p></button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
	  <h4 class="modal-title" id="exampleModalLongTitle">
	  <b><?php echo $exam_title; ?> <i class="fa fa-clipboard" style="margin-left: 5px;" aria-hidden="true"></i><b></h4>
	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<br />
      </div>
      <div class="modal-body">
		<!--div class="row justify-content-center" style="margin-top: 2%;"-->
			  <p style="margin: 0;">Total Questions : <?php echo $total_question; ?></p>
			  <p style="margin: 0;">Right Answer Marks: <?php echo $marks_per_right_answer; ?></p>
			  <p style="margin: 0;">Wrong Answer Marks: <?php echo $marks_per_wrong_answer; ?></p>
			  <p style="margin: 0;">Exam Start Time : <?php echo $exam_star_time; ?></p>
			  <p style="margin: 0;">Exam End Time : <?php echo $exam_end_time; ?></p>
		<!--/div-->
	  </div>
	  <br />
    </div>
  </div>
</div>

<script>

var q_num = 0;
function change(num){
	document.getElementById("qtn").innerHTML = 'Question ' + num;
}
	
$(document).ready(function(){
	var exam_id = "<?php echo $exam_id; ?>";
	load_question();
	question_navigation();
					
	function load_question(question_id = '', val = 0)
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, question_id:question_id, page:'view_exam', action:'load_question'},
			success:function(data)
			{
				$('#single_question_area').html(data);
				if(val == 0){
					q_num++;
				} else if(val == -1){
					q_num--;
				} else {
					q_num = val;
				}
				change(q_num);
			}
		})
	}

	$(document).on('click', '.next', function(){
		var question_id = $(this).attr('id');
		load_question(question_id, 0);
	});

	$(document).on('click', '.previous', function(){
		var question_id = $(this).attr('id');
		load_question(question_id, -1);
	});

	function question_navigation()
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, page:'view_exam', action:'question_navigation'},
			success:function(data)
			{
				$('#question_navigation_area').html(data);
			}
		})
	}

	$(document).on('click', '.question_navigation', function(){
		var question_id = $(this).data('question_id');
		var val = $(this).data('id');
		load_question(question_id, val);
	});

	function load_user_details()
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{page:'view_exam', action:'user_detail'},
			success:function(data)
			{
				$('#user_details_area').html(data);
			}
		})
	}

	load_user_details();

	$("#exam_timer").TimeCircles({ 
		time:{
			Days:{
				show: false
			},
			Hours:{
				show: false
			}
		}
	});

	setInterval(function(){
		var remaining_second = $("#exam_timer").TimeCircles().getTime();
		if(remaining_second < 1)
		{
			// ayan change it
				alert('Exam time over');
				header("location:login.php")
		}
	}, 1000);

	$(document).on('click', '.answer_option', function(){
		var question_id = $(this).data('question_id');

		var answer_option = $(this).data('id');

		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{question_id:question_id, answer_option:answer_option, exam_id:exam_id, page:'view_exam', action:'answer'},
			success:function(data)
			{
				//location.reload();
			}
		})
	});

});
</script>
<?php
}
if($exam_status == 'Completed')
{
	$exam->query = "
	SELECT * FROM question_table 
	INNER JOIN user_exam_question_answer 
	ON user_exam_question_answer.question_id = question_table.question_id 
	WHERE question_table.online_exam_id = '$exam_id' 
	AND user_exam_question_answer.user_id = '".$_SESSION["user_id"]."'
	";

	//echo $exam->query;

	$result = $exam->query_result();
?>
<br />
<div class="card"  style="border: none;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Result</h3>
			</div>
			<div class="col-md-3" align="right">
				<a href="pdf_exam_result.php?code=<?php echo $_GET['code']; ?>" class="btn btn-danger btn-sm" target="_blank">PDF</a>
			</div>
		</div>
	</div>
	</div>
	<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Your Answer</th>
						<th>Answer</th>
						<th>Result</th>
						<th>Marks</th>
					</tr>
					<?php
					$total_mark = 0;

					foreach($result as $row)
					{
						$exam->query = "
						SELECT * 
						FROM option_table 
						WHERE question_id = '".$row["question_id"]."'
						";

						$sub_result = $exam->query_result();
						$user_answer_option = '';
						$orignal_answer = '';
						$question_result = '';

						if($row['marks'] == '0')
						{
							$question_result = '<h4 class="badge badge-dark">Not Attend</h4>';
						}

						if($row['marks'] > '0')
						{
							$question_result = '<h4 class="badge badge-success">Right</h4>';
						}

						if($row['marks'] < '0')
						{
							$question_result = '<h4 class="badge badge-danger">Wrong</h4>';
						}

						echo '
						<tr>
							<td>'.$row['question_title'].'</td>
						';

						foreach($sub_result as $sub_row)
						{
							echo '<td>'.$sub_row["option_title"].'</td>';

							if($sub_row["option_number"] == $row['user_answer_option'])
							{
								$user_answer = $sub_row['option_title'];
							}

							if($sub_row['option_number'] == $row['answer_option'])
							{
								$orignal_answer = $sub_row['option_title'];
							}
						}
						echo '
						<td>'.$user_answer.'</td>
						<td>'.$orignal_answer.'</td>
						<td>'.$question_result.'</td>
						<td>'.$row["marks"].'</td>
					</tr>
						';
					}

					$exam->query = "
					SELECT SUM(marks) as total_mark FROM user_exam_question_answer 
					WHERE user_id = '".$_SESSION['user_id']."' 
					AND exam_id = '".$exam_id."'
					";

					$marks_result = $exam->query_result();

					foreach($marks_result as $row)
					{
					?>
					<tr>
						<td colspan="8" align="right">Total Marks</td>
						<td align="right"><?php echo $row["total_mark"]; ?></td>
					</tr>
					<?php	
					}

					?>
				</table>
			</div>
		</div>
	</div>

	<footer class="page-footer font-small special-color-dark pt-4 container-fluid text-center">

<div class="container">

  <ul class="list-unstyled list-inline text-center">
	<li class="list-inline-item">
	  <a class="btn-floating btn-fb mx-1">
		<i class="fab fa-facebook-f"> </i>
	  </a>
	</li>
	<li class="list-inline-item">
	  <a href="facebook.com" class="btn-floating btn-tw mx-1">
		<i class="fab fa-twitter"> </i>
	  </a>
	</li>
	<li class="list-inline-item">
	  <a href="http://www.googleplus.com" class="btn-floating btn-gplus mx-1">
		<i class="fab fa-google-plus-g"> </i>
	  </a>
	</li>
	<li class="list-inline-item">
	  <a href="http://www.linkedin.com" class="btn-floating btn-li mx-1">
		<i class="fab fa-linkedin-in"> </i>
	  </a>
	</li>
	<li class="list-inline-item">
	  <a href="http://www.twitter.com" class="btn-floating btn-dribbble mx-1">
		<i class="fab fa-dribbble"> </i>
	  </a>
	</li>
  </ul>
 
</div>

<div class="footer-copyright text-center py-1">© 2020 Copyright:
  <a href="https://mdbootstrap.com/">Quizathon</a>
</div>

</footer>

<?php
}

?>

</div>
</body>
</html>

