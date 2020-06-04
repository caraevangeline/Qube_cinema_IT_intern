 <!DOCTYPE HTML>  
<html>
<head>
 <?php
include "header.php";
if(!isset($_SESSION['login_user'])) 
      {header("Location: main.php"); 
      exit();} 
      ?>

  
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php

$status=$description=$timer="";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity1");
if($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
  $status=$_POST['status'];
  $description=$_POST['description'];
  $timer=$_POST['timer'];
$query = "INSERT into statuslist values ('$status','$description','$timer')";
    if(mysqli_query($link,$query)) 
{ }


else{ die ("failed to query database 4".mysqli_error($link));  }

}





}

?>
  

<style>








/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}




























.myTable { 
  width: 100%;
  text-align: left;
  background-color: white;
  border-collapse: collapse; 
  }
.myTable th { 
  background-color:#0080ff;
  color: white; 
  }
.mytable td {
   font-size: 20px;
   font-weight: bold;
}
.myTable td, 
.myTable th { 
  padding: 10px;
  border: 1px solid white; 
  }

#myDIV {
    display:none;
}
#myDIV1{
    display:none;
}



.dropbtn {
    background-color: white;
    color: black;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color:white;
}
</style>
<title>
		ITSM Portal
		</title>
		<!-- <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/jquery.min.js" rel="stylesheet"> -->

                          <script>
    function myFunction() {

    var x = document.getElementById("myDIV");
  
    
        if (x.style.display === "none") {
 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function myFunction1() {


    var x = document.getElementById("myDIV1");
    
    if (x.style.display === "none") {
 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

    
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

}
</script>
</head>
<body>  



 
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 
					
					        <div style="width:100%;"> 
                  
                    <div style="float:left; width:20%;">
                       <div class="col-sm-17 well" style="background-color: #e5f2ff;" >
                      <div class="dropdown" style="background-color: #e5f2ff;">
  <button class="dropbtn" style="background-color: #e5f2ff;">Help Desk</button>
  <div class="dropdown-content">
    <a href="category.php">Category</a>
    <a href="status.php">Status</a>
    <a href="level.php">Level</a>
    <a href="mode.php">Mode</a>
    <a href="priority.php">Priority</a>
    <a href="#">Worklog Type</a>
    <a href="#">Request Closure Code</a>
    <a href="#">Request Closing Rules</a>
    <a href="#">Incident - Additional Fields</a>
    <a href="#">Incident Template</a>
    <a href="#">Resolution Template</a>
    <a href="#">Reply Template</a>
    <a href="#">Task Types</a>
    <a href="#">Task Template</a>
    <a href="#">Task closing rules</a>
    <a href="#">Worklog - Additional Fields</a>
    <a href="#">Service Categories</a>
    <a href="#">Request Custom Menu</a>
    <a href="#">Custom Triggers</a>
    <a href="#">Chat Settings</a>
      </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color: #e5f2ff;">Organizational Details</button>
  <div class="dropdown-content">
    <a href="#">Organization Details</a>
    <a href="mail.php">Mail Server Settings</a>
    <a href="#">SMS Notification Settings</a>
    <a href="#">Regions</a>
    <a href="#">Sites</a>
    <a href="#">Operational Hours</a>
    <a href="#">Holidays</a>
    <a href="#">Departments</a>
    <a href="#">Organization Roles</a>
    <a href="#">Business Rules</a>
    <a href="#">Service Level Agreements</a>
    <a href="#">Notification Rules</a>
    <a href="#">Preventive Maintenance Tasks</a>
    <a href="#">Window Domain Scan</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color: #e5f2ff;">Users</button>
  <div class="dropdown-content">
   <a href="#">Roles</a>
    <a href="#">User - Additional Fields</a>
    <a href="#">Requesters</a>
    <a href="#">Technicians</a>
    <a href="#">Support Groups</a>
    <a href="#">User Groups</a>
    <a href="#">Active Directory</a>
    <a href="#">LDAP</a>
    <a href="#">Leave Types</a>
    <a href="#">Robo Technician</a>
    <a href="#">Technician Auto Assign</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color: #e5f2ff;">User Survey</button>
  <div class="dropdown-content">
    <a href="#">Survey Settings</a>
    <a href="#">Define Survey</a>
    <a href="#">Survey Preview</a>
    <a href="#">Survey Results</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color:#e5f2ff;">General</button>
  <div class="dropdown-content">
    <a href="#">Self-Service Portal Settings</a>
    <a href="#">Security Settings</a>
    <a href="#">Theme</a>
    <a href="#">Backup Scheduling</a>
    <a href="#">Data Archiving</a>
    <a href="#">Custom Schedules</a>
    <a href="#">API</a>
    <a href="#">Advanced Analytics</a>
    <a href="#">Proxy Settings</a>
    <a href="#">ME Integrations</a>
    <a href="#">Self monitoring service for SDP</a>
    <a href="#">Translations</a>
    </div>
</div>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
                    </div>
                    <div style="float:right; width:80%;background-color:#e5f2ff; ">
                      <div class="col-sm-17 well" style="background-color:#e5f2ff;">
                       <h3>Configuration Wizard</h3>
                         <br>
                         HelpDesk-Status
                         <br>
                         <br>
                         <div class="col-sm-17 well" style="background-color:#e5f2ff;">
                  
                          <legend>
                            <div class="leftpane2" style="background-color:#e5f2ff;">
                           <h5>Status List</h5></div>

                           <div class="rightpane2" style="background-color:#e5f2ff;">
                            <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><h5>[ Add New Status ]</h5></a>








<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <label ><b>Status Name</b></label>
      <input type="text" placeholder="Enter Status name" name="status" required value="<?php echo $status ?>">

      <label ><b>Description</b></label>
      <input type="text" placeholder="Enter Description" name="description" required value="<?php echo $description ?>">
        
        <label ><b>Timer Status</b></label>
      <input type="text" placeholder="Enter Timer Status" name="timer" required value="<?php echo $timer ?>">
      
      <button type="submit" name="submit" style="background-color: #0080ff;">Add</button>
      
    </div>

    
  </form>
</div>


</div></legend>

<form method="GET" action="status_d.php">

<?php
//session_start();

$servername = "localhost";
$username = "root";
//$password = "password";
$dbname = "dc_activity1";


/*$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity");*/
// Create connection
$conn = new mysqli($servername, $username,"", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM statuslist";
$result = $conn->query($sql);
echo "<br><br>";
if ($result->num_rows > 0) {
    //echo "<br><br>";

    echo "<table class='myTable' id='table_id' align='center'><tr><th></th><th>Status Name</th><th>Description</th><th>Timer Status</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $stat=$row["status"];
        
        echo "<tr><td><input type='checkbox' name='name1' ></td><td style='font-size:15px;'><a href='status_d.php?status=$stat'>" . $row["status"]. "</a></td><td style='font-size:15px;'>" . $row["description"]. "</td><td style='font-size:15px;'>" . $row["timer"]. "</td>";
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 
                            
 </form>                           
                           <!-- <button onclick="myFunction()">New Category</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
                          
                            
                            
                            </form>

                            
                            <br>


                  </div>






<div class="col-sm-17 well">

<h4><b>Help Card</b></h4>
Request status is an option used to indicate the level of progress of a request, based on which any action can be taken to resolve the request and close the same. Grouping requests under various status helps in proper organizing of requests and hence reduces the chaos.
<br><br>
To add a new status click the <b>Add New Status</b> link on the right hand side corner of the Status List table.
<br><br>

The Add Status form shown above has fields, namely Name, Type, and Description.
<br><br>
The status <b>Name</b> is where you specify the unique name that is used to identify each Status.
<br><br>
The status <b>Type</b> allows you to identify the whether the status that you are adding is still in progress and hence should be a part of the open requests or should be moved to the closed requests. If the added status requires the timer of the request to be stopped, then you need to set the check box Stop timer. You can enter a short description about the Status in the Description field. This will help in figuring out what each status means and which requests can be classified under this status, unless, the status name itself is explanatory.
<br><br>
Status Color: Select a color to denote the status using the color palette or specify the color code in the text box.
<br><br>
Click the <b>Save</b> button to save the status and return to the list view.<br>
Click the <b>Save and add</b> new button to save the status and add another status




</div>



                  
                         

                    </div>

                 </div>


                    
                          
			</div>












			</form>
      

			
	</body>
</html>
       