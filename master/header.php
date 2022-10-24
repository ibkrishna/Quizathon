<?php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_private();

?>

<html lang="en">
<head>
  	<title>QUIZATHON</title>
	<link rel="icon" href="logo.opt.png" type="image/x-icon">
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/dist/parsley.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
    <script src="../style/bootstrap-datetimepicker.js"></script>
</head>
<body>
<div class="sticky-top">
<div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #000000;">
    <a class="navbar-brand" href="index.php">
		<img src="logo.opt.png" width="35"  style="margin-left: 5px;"alt="" class="d-inline-block align-middle mr-2">
		<span class="text-uppercase font-weight-bold">QUIZATHON</span>
	</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="desc.php">Assignments <i class="fas fa-book-open"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php">Students Record <i class="fas fa-id-card" aria-hidden="true"></i></a>
                </li> 
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout <i class="fas fa-sign-out-alt" aria-hidden="true"></i></a>
				</li>  
            </ul>
        </div>  
		</nav>
</div>
</div>

	<div class="container-fluid">