<?php

include('master/Examination.php');

$exam = new Examination;

include('header.php');

?>
<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

	<div class="containter">
		<br />
		<br />
		<br />
		<?php
		if(isset($_SESSION["user_id"]))
		{

		?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<select name="exam_list" id="exam_list" class="form-control input-lg">
					<option value="">Select Exam</option>
					<?php

					echo $exam->Fill_exam_list();

					?>
				</select>
				<br />
				<span id="exam_details"></span>
			</div>
			<div class="col-md-3"></div>
		</div>
		
			<div class="row justify-content-center" style="margin-top: -20px;">
			  <div class="col-sm-5"><br /><hr><br/>
				<div class="card" style="box-shadow: 5px 10px 18px grey;">
				  <div class="card-body">
				  <img class="card-img-top" style="height: 220px;" src="exam.jpg" alt="Card image cap">
					<a href="enroll_exam.php" style="width: 97.5%; background: #000000;" class="btn">Assignments <i class="fas fa-book-open" style="margin-left: 15px;" ></i></a>
				  </div>
				</div>
			  </div>
			  <div class="col-sm-5"><br /><hr><br />
				<div class="card" style="box-shadow: 5px 10px 18px grey;">
				  <div class="card-body">
				  <img class="card-img-top" style="height: 220px;" src="profile.png" alt="Card image cap">
					<a href="profile.php" style="width: 97.5%; background: #000000;" class="btn">Profile <i class="fas fa-user" style="margin-left: 15px;" aria-hidden="true"></i></a>
				  </div>
				</div>
			  </div>
			</div>
		
		<script>
		$(document).ready(function(){

			$('#exam_list').parsley();

			var exam_id = '';

			$('#exam_list').change(function(){

				$('#exam_list').attr('required', 'required');

				if($('#exam_list').parsley().validate())
				{
					exam_id = $('#exam_list').val();
					$.ajax({
						url:"user_ajax_action.php",
						method:"POST",
						data:{action:'fetch_exam', page:'index', exam_id:exam_id},
						success:function(data)
						{
							$('#exam_details').html(data);
						}
					});
				}
			});

			$(document).on('click', '#enroll_button', function(){
				exam_id = $('#enroll_button').data('exam_id');
				$.ajax({
					url:"user_ajax_action.php",
					method:"POST",
					data:{action:'enroll_exam', page:'index', exam_id:exam_id},
					beforeSend:function()
					{
						$('#enroll_button').attr('disabled', 'disabled');
						$('#enroll_button').text('please wait');
					},
					success:function()
					{
						$('#enroll_button').attr('disabled', false);
						$('#enroll_button').removeClass('btn-warning');
						$('#enroll_button').addClass('btn-success');
						$('#enroll_button').text('Enroll success');
					}
				});
			});

		});
		</script>
		<?php
		}
		else
		{
		?>
		
		<div class="jumbotron text-center" style="margin-top:-70; padding: 1rem 1rem;">
			<nav class="navbar navbar-expand-sm navbar-dark" style="background: #000000;">
			<a class="navbar-brand" href="index.php">
				<img src="logo.opt.png" width="35" style="margin-left: 5px;" alt="" class="d-inline-block align-middle mr-2">
				<span class="text-uppercase font-weight-bold">QUIZATHON</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback <i class="far fa-comment-alt"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About <i class="fas fa-info-circle"></i></a>
                </li> 
				<li class="nav-item">
					<a class="nav-link" href="FAQs.php">FAQs <i class="fas fa-question"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="support.php">24*7 Help <i class="fas fa-hands-helping"></i></a>
				</li>  
            </ul>
        </div--> 			
			</nav>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<div align="center">
			<p><a href="register.php" style="width: 60%;" class="btn btn-warning btn-lg">Register</a></p>
			<p><a href="login.php" style="width: 60%;" class="btn btn-dark btn-lg">Login</a></p>
		</div>
		<?php
		}
		?>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
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

</body>

</html>