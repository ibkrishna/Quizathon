<?php

include('header.php');

?>
<br>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="card"  style="border: none;">
	<div class="card-header">
		<div class="row">
			<div class="col-md-9">
				<h1 class="panel-title" style="margin-top: 0;">Dashboard</h1>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
  <div class="col-sm-5"><br /><br /><hr><br/>
    <div class="card" style="box-shadow: 5px 10px 18px grey;">
      <div class="card-body">
	  <img class="card-img-top" style="height: 220px;" src="exam.jpg" alt="Card image cap">
        <a href="desc.php" style="width: 97.5%; background: #000000;" class="btn">Assignments <i class="fas fa-book-open"></i></a>
      </div>
    </div>
  </div>
  <div class="col-sm-5"><br /><br /><hr><br />
    <div class="card" style="box-shadow: 5px 10px 18px grey;">
      <div class="card-body">
      <img class="card-img-top" style="height: 220px;" src="students.png" alt="Card image cap">
        <a href="exam.php" style="width: 97.5%; background: #000000;" class="btn">Students Record <i class="fas fa-id-card" aria-hidden="true"></i></a>
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