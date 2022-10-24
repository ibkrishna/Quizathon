<?php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

include('header.php');

?>
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<br>
	<div class="containter">
		<div class="d-flex justify-content-center">
			<br /><br />
			
			<div class="card" style="margin-top:90px;margin-bottom: 100px; width:600px; border: none;">
        		<!--div class="card-header"><h4>Change Password</h4></div--><br />
        		<div class="card-body">
	        		<form method="post"	id="change_password_form">
	        			<div class="form-group">
					        <input type="password" name="user_password" id="user_password" placeholder="New Password" class="form-control" />
					    </div>
					    <div class="form-group">
					        <input type="password" name="confirm_user_password" id="confirm_user_password" placeholder="Confirm Password" class="form-control" />
					    </div>
					    <br />
					    <div class="form-group" align="center">
					    	<input type="hidden" name="page" value="change_password" />
					    	<input type="hidden" name="action" value="change_password" />
					    	<input type="submit" name="user_password" id="user_password" style="width: 80%;"class="btn btn-info" value="Change" />
					    </div>
	        		</form>
        		</div>
      		</div>
      		<br /><br />
      		<br /><br />
		</div>
	</div>


<script>

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
