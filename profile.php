<?php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

include('header.php');

$exam->query = "
	SELECT * FROM user_table 
	WHERE user_id = '".$_SESSION['user_id']."'
";

$result = $exam->query_result();

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
	body.modal-open {
    overflow: hidden;
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
	.btn.btn-primary{
		background: rgb(8, 189, 128) !important;
	}
	.btn.btn-secondary{
		background: rgb(240, 244, 247) !important;
	}
	.field-icon {
		  float: right;
		  margin-left: -25px;
		  margin-top: -43px;
		  position: relative;
		  z-index: 2;
		}
</style>

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
	<!--div class="containter">
		<div class="d-flex justify-content-center">
			<br /><br />
			<span id="message"></span>
			<div class="card" style="margin-top:50px;margin-bottom: 100px; width: 900px; border: none;">
        		<div class="card-header"><h4>My Profile</h4></div>
        		<div class="card-body">
        			<form method="post" id="profile_form">
        				<?php
        				foreach($result as $row)
        				{
        				?>
        				<script>
        				$(document).ready(function(){
        					$('#user_gender').val("<?php echo $row["user_gender"]; ?>");
        				});
        				</script>
					    <div class="form-group">
					        <label>Name</label>
					        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row["user_name"]; ?>" />
					    </div>
					    <div class="form-group">
					        <label>Gender</label>
					        <select name="user_gender" id="user_gender" class="form-control">
					          	<option value="Male">Male</option>
					          	<option value="Female">Female</option>
					        </select>
					    </div>
					    <div class="form-group">
					        <label>Branch</label>
					        <textarea name="user_branch" id="user_branch" class="form-control"><?php echo $row["user_branch"]; ?></textarea>
					    </div>
					    <div class="form-group">
					        <label>Roll Number</label>
					        <input type="text" name="user_roll_no" id="user_roll_no" class="form-control" value="<?php echo $row["user_roll_no"]; ?>" />
					    </div>
					    <div class="form-group">
					        <label>Profile Image</label>
					        <input type="file" name="user_image" id="user_image" accept="image/*" /><br />
					        <img src="upload/<?php echo $row["user_image"]; ?>" class="img-thumbnail" width="250"  />
					        <input type="hidden" name="hidden_user_image" value="<?php echo $row["user_image"]; ?>" />
					    </div>
					    <br />
					    <div class="form-group" align="center">
					        <input type="hidden" name="page" value="profile" />
					        <input type="hidden" name="action" value="profile" />
					        <input type="submit" name="user_profile" id="user_profile" style="width: 80%;" class="btn btn-info" value="Save" />
					    </div>
					    <?php
						}
					    ?>
          			</form>
        		</div>
      		</div>
      		<br /><br />
      		<br /><br />
		</div>
	</div-->
<div class="card" style="margin-top: 20px;  background: rgb(255, 255, 255) !important;">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">
					<h1 class="panel-title" style="margin: 0;">PROFILE</h1>
				</div>
				<div class="col-md">
				<div align="right" style="margin: 0;">
					<!--a href="enroll_exam.php"-->
					<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
						<p style="margin: 0px;">Change <i class="fa fa-key" style="margin-left: 5px;" aria-hidden="true"></i></p>
					</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="containter">
		<div class="d-flex justify-content-center">
			<br /><br />
			<span id="message"></span>
			<div class="card" style="width: 100%; margin-top: 30px;">
        		<!--div class="card-header"><h4>My Profile</h4></div-->
        		<div class="card-body">
        			<form method="post" id="profile_form">
        				<?php
        				foreach($result as $row)
        				{
        				?>
        				<script>
        				$(document).ready(function(){
        					$('#user_gender').val("<?php echo $row["user_gender"]; ?>");
        				});
        				</script>
						<div class="form-group">
						<div  align="center">
					        <img src="upload/<?php echo $row["user_image"]; ?>" class="img-thumbnail" width="250"  />
						</div>
							<br />
							<br />
						<div  class="row justify-content-end">
					        <input type="file" name="user_image" id="user_image" accept="image/*" />
						</div>	
							<input type="hidden" name="hidden_user_image" value="<?php echo $row["user_image"]; ?>" />
					    </div>
						<br />
					    
						<div class="form-group">
					        <label>Name</label>
					        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row["user_name"]; ?>" />
					    </div>
					    <div class="form-group">
					        <label>Gender</label>
					        <select name="user_gender" id="user_gender" class="form-control">
					          	<option value="Male">Male</option>
					          	<option value="Female">Female</option>
					        </select>
					    </div>
					    <div class="form-group">
					        <label>Branch</label>
					        <textarea name="user_branch" id="user_branch" class="form-control"><?php echo $row["user_branch"]; ?></textarea>
					    </div>
					    <div class="form-group">
					        <label>Roll Number</label>
					        <input type="text" name="user_roll_no" id="user_roll_no" class="form-control" value="<?php echo $row["user_roll_no"]; ?>" />
					    </div>
						<div class="form-group">
					        <label>Email Address</label>
					        <input type="text" name="user_email_address" id="user_email_address" class="form-control" value="<?php echo $row["user_email_address"]; ?>" />
					    </div>
					    
					    <br />
					    <div class="form-group" align="right">
					        <input type="hidden" name="page" value="profile" />
					        <input type="hidden" name="action" value="profile" />
					        <input type="submit" name="user_profile" id="user_profile" class="btn btn-info" value="Update" />
					    </div>
					    <?php
						}
					    ?>
          			</form>
        		</div>
      		</div>
      		
		</div>
	</div>
	<br /><br />
    <br /><br />

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	<div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><b>Change <i class="fa fa-key" style="margin-left: 5px;" aria-hidden="true"></i><b></h4>
	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	</div>
		<br />
		<form method="post"	id="change_password_form">
		<div class="row justify-content-center">
	        <div class="form-group" style="width: 85%;">
		        <input type="password" name="user_password" id="user_password" maxlength="12" placeholder="New Password" class="form-control" />
				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
			</div>
		   <div class="form-group" style="width: 85%;">
		        <input type="password" name="confirm_user_password" id="confirm_user_password" maxlength="12" placeholder="Confirm Password" class="form-control" />
				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction1()"></span>
		    </div>
		</div>
		    <div class="form-group" align="center" style="margin-bottom: 6%;">
				<input type="hidden" name="page" value="change_password" />
		    	<input type="hidden" name="action" value="change_password" />
		    	<input type="submit" name="user_password" id="user_password" style="width: 80%;"class="btn btn-info" value="Change" />
		    </div>
		</form>
      <!--div class="modal-footer justify-content-center" style="border-top: none;">
	    <a class="btn btn-primary" href="enroll_exam.php">Update</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><p style="margin: 0;">Cancel</p></button>
      </div-->
    </div>
  </div>
</div>

<script>

//toggle password-ayan//

function myFunction() {
  var x = document.getElementById("user_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction1() {
  var x = document.getElementById("confirm_user_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function(){

	$('#change_password_form').parsley();

	$('#change_password_form').on('submit', function(event){
		event.preventDefault();

		$('#user_password').attr('required', 'required');

		$('#confirm_user_password').attr('required', 'required');

		$('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

		if($('#change_password_form').parsley().validate())
		{
			$.ajax({
				url:"user_ajax_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function()
				{
					$('#change_password').attr('disabled', 'disabled');
					$('#change_password').val('please wait...');
				},
				success:function(data)
				{
					if(data.success)
					{
						alert(data.success);
						location.reload(true);
					}
					$('#change_password').attr('disabled', false);
					$('#change_password').val('Change');
				}
			})
		}
	});
	
});

</script>

<script>

$(document).ready(function(){

	$('#profile_form').parsley();
	
	$('#profile_form').on('submit', function(event){

		event.preventDefault();

		$('#user_name').attr('required', 'required');

		$('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

		$('#user_branch').attr('required', 'required');

		$('#user_roll_no').attr('required', 'required');

		$('#user_roll_no').attr('data-parsley-pattern', '^[0-9]+$');

		//$('#user_image').attr('required', 'required');

		
		$('#user_email_address').attr('required', 'required');

		$('#user_image').attr('accept', 'image/*');

		if($('#profile_form').parsley().validate())
		{
			$.ajax({
				url:"user_ajax_action.php",
				method:"POST",
				data: new FormData(this),
				dataType:"json",
				contentType: false,
				cache: false,
				processData:false,				
				beforeSend:function()
				{
					$('#user_profile').attr('disabled', 'disabled');
					$('#user_profile').val('please wait...');
				},
				success:function(data)
				{
					if(data.success)
					{
						location.reload(true);
					}
					else
					{
						$('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
					}
					$('#user_profile').attr('disabled', false);
					$('#user_profile').val('Save');
				}
			});
		}
	});
});

</script>

<!--footer class="page-footer font-small special-color-dark pt-4 container-fluid text-center">

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

</footer-->

</body>

</html>