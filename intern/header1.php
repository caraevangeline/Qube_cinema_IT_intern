<html>
	<head>
		<title>
		ITSM Portal
		</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<style>
	.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}</style>
	<body>
<?php
if(!isset($_SESSION)){
		session_start();}
		
		$user=$_SESSION['login_user'];
		/*if(isset($_POST["logout1"])){
			unset($_SESSION['login_user']);  
      session_destroy();*/
		
?>
		<nav class="nav navbar-inverse">
			<div class="container-fluid">
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

					<ul class="nav navbar-nav">
						<li><a href="dashboard1.php"><img src="images/logo.png" alt="logo" width="120" height="30"></a></li>
						<li></li>
						<li><a href="incident2a.php" style="font-size: 17px;">Incident Management</a></li>
						<li><a href="form1.php" style="font-size: 17px;">Change Management</a></li>
						<!-- <li><a href="project.php">Project</a></li> -->
						
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 17px;">Requests <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="database1a.php">Change Requests</a></li>
            <li><a href="database3a.php">Incident Requests</a></li>
          </ul>
        </li></ul>
      <ul class="nav navbar-nav navbar-right">
						<li>
	<!-- <div class="tooltip"> -->
        <a href="" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="<?php echo "Welcome $user!!"?>" style="font-size: 17px;">
          <span class="glyphicon glyphicon-user"></span>
          <span class="tooltiptext">Profile</span>
        </a>
      <!-- </div> -->
</li><li>
	<!-- <div class="tooltip">-->
		
		<a href="logout.php" style="font-size: 17px;"> 
				<!-- <button name="logout1">Logout</button> -->
          <span class="glyphicon glyphicon-log-out"></span>
          <span class="tooltiptext">Logout</span>
        </a>
    <!-- </div> -->
    </li>
</ul>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"></a></li>
							
								<div id="mymodal" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												
											</div>
										</div>
									</div>
								</div>
						</li>
					</ul>
				</form>
			</div>
		</nav>
		
	</body>
</html>