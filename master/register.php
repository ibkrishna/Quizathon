<?php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_public();

?>

<html lang="en">
<head>
    <title>QUIZATHON</title>
	<link rel="icon" href="logo.opt.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<style>
		.field-icon {
		  float: right;
		  margin-left: -25px;
		  margin-top: -43px;
		  position: relative;
		  z-index: 2;
		}

		.container{
		  padding-top:50px;
		  margin: auto;
		}
	</style>
</head>
<body>
<body>
<div class="sticky-top">
  <div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
		<nav class="navbar navbar-expand-sm navbar-dark" style="background: #000000;">
			<a class="navbar-brand" href="index.php">
				<img src="logo.opt.png" width="35" style="margin-left: 5px;" alt="" class="d-inline-block align-middle mr-2">
				<span class="text-uppercase font-weight-bold">QUIZATHON</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
		</nav>
	</div>
	</div>

	<div class="container">
  		<div class="row">
    		<div class="col-md-3">

    		</div>
    		<div class="col-md-6" style="margin-top:50px;">
    			<span id="message"></span>
      			<div class="card" style="border: none;">
        			<div class="card-header"  style="text-align: center;"><h3>REGISTER</h3></div>
        			<div class="card-body">
          				<form method="post" id="admin_register_form">
                    <div class="form-group">
                        <input type="text" name="admin_email_address" id="admin_email_address" placeholder="Enter Email" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='Email Address already Exists' />
                    </div>
                    <div class="form-group">
                      <input type="password" name="admin_password" id="admin_password" maxlength="12" placeholder="Enter Password" class="form-control" />
					  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirm_admin_password" id="confirm_admin_password" maxlength="12" placeholder="Confirm Password" class="form-control" />
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction1()"></span>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="page" value="register" />
                      <input type="hidden" name="action" value="register" />
					  <div align="center">
                      <input type="submit" name="admin_register" id="admin_register" style="width: 40%;" class="btn btn-info" value="Register" />
                    </div>
                    </div>
                  </form>
          				<div align="center">
          					<a href="login.php" style="text-decoration: none;">Already have an account ? Login</a>
          				</div>
        			</div>
      			</div>
    		</div>
		    <div class="col-md-3">

		    </div>
  		</div>
	</div>

<script>

function myFunction() {
  var x = document.getElementById("admin_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction1() {
  var x = document.getElementById("confirm_admin_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function(){

	window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value)
    {
      return $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:{page:'register', action:'check_email', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#admin_register_form').parsley();

  $('#admin_register_form').on('submit', function(event){

    event.preventDefault();

    $('#admin_email_address').attr('required', 'required');

    $('#admin_email_address').attr('data-parsley-type', 'email');

    $('#admin_password').attr('required', 'required');

    $('#confirm_admin_password').attr('required', 'required');

    $('#confirm_admin_password').attr('data-parsley-equalto', '#admin_password');

    if($('#admin_register_form').parsley().isValid())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#admin_register').attr('disabled', 'disabled');
          $('#admin_register').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            $('#message').html('<div class="alert alert-success">Please check your email</div>');
            $('#admin_register_form')[0].reset();
            $('#admin_register_form').parsley().reset();
          }

          $('#admin_register').attr('disabled', false);
          $('#admin_register').val('Register');
        }
      });
    }

  });

});

</script><br><br><br><br>

<?php

include('footer.php');

?>
</body>
</html>