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
</div>

  <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6" style="margin-top:40px;">
          
          <span id="message">
          <?php
          if(isset($_GET['verified']))
          {
            echo '
            <div class="alert alert-success">
              Your email has been verified, now you can login
            </div>
            ';
          }
          ?>
          </span><br><br>
          <div class="card">
            <div class="card-header"  style="text-align: center;"><h3>LOGIN</h3></div>
            <div class="card-body">
              <form method="post" id="admin_login_form">
                <div class="form-group">
                  <input type="text" name="admin_email_address" id="admin_email_address" placeholder="Enter Email" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="password" name="admin_password" id="admin_password" maxlength="12" placeholder="Enter Password" class="form-control" />
				  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
                </div>
                <div class="form-group">
                  <input type="hidden" name="page" value="login" />
                  <input type="hidden" name="action" value="login" />
                  <div align="center">
				  <input type="submit" name="admin_login" id="admin_login" style="width: 40%;" class="btn btn-info" value="Login" />
                </div>
                </div>
              </form>
              <div align="center">
                <a href="register.php" style="text-decoration: none;">Don't have an account ? Register</a>
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

$(document).ready(function(){

  $('#admin_login_form').parsley();

  $('#admin_login_form').on('submit', function(event){
    event.preventDefault();

    $('#admin_email_address').attr('required', 'required');

    $('#admin_email_address').attr('data-parsley-type', 'email');

    $('#admin_password').attr('required', 'required');

    if($('#admin_login_form').parsley().validate())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#admin_login').attr('disabled', 'disabled');
          $('#admin_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href="index.php";
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          $('#admin_login').attr('disabled', false);
          $('#admin_login').val('Login');
        }
      });
    }

  });

});

</script>

<div class="modal fade" style="margin-top: 40px;" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Feedback <i class="far fa-comment-alt"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="row">

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" placeholder="Your name" id="name" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" placeholder="Your email" id="email" name="email" class="form-control">
                        </div>
                    </div>

                </div><br />
				
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <select class="browser-default custom-select mb-4" style="margin-left: -2px;">
								<option value="1" selected>Subject</option>
								<option value="2">Report a bug</option>
								<option value="3">Feature request</option>
								<option value="4">Feature request</option>
							</select>
                        </div>
                    </div>
                </div>
				
                <div class="row" style="margin-top: -30px;">

                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" placeholder="Your message" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">SEND</button>
      </div>
    </div>
  </div>
</div>

<br><br><br><br>

<?php

include('footer.php');

?>
</body>
</html>