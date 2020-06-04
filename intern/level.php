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
<style>
#myDIV {
    display:none;
}
#myDIV1{
    display:none;
}

table {
    width:100%;
    height:100%;
}
table, th, td {
    border: 1px white;
    border-collapse: collapse;
}
th {
    padding: 15px;
    text-align: left;
}
td
{
    border: solid 1px;
    border-left: none;
    border-right: none;
}
table#t01 tr:nth-child(even) {
    background-color: white;
}
table#t01 tr:nth-child(odd) {
   background-color:white;
}
table#t01 th {
    background-color: #0080ff;
    color: black;
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
.but {
    background-color:#0080ff;
    border: none;
    color: white;
    border-radius: 4px;
    /*padding: 15px 32px;*/
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    height:30px;
    width:100px;
    margin: 4px 2px;
    cursor: pointer;
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
                         HelpDesk-Level
                         <br>
                         <br>
                         <div class="col-sm-17 well" style="background-color:#e5f2ff;">
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                          <legend>
                            <div class="leftpane2" style="background-color:#e5f2ff;">
                           <h5>Level List</h5></div>

                           <div class="rightpane2" style="background-color:#e5f2ff;">
                            <a href="#"><h5>[ Add New Level ]</h5></a></div></legend>
                            
                            
                           <!-- <button onclick="myFunction()">New Category</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
                           
                            <br>
                            
                            </form>
<br>
                            
                            <br>
<table id="t01">
  <tr>
    <th><input type="checkbox" name="name1" /></th>
    <th></th>
    <th>Name</th>
    <th>Description</th>
    </tr>
  <tr>
    <td><input type="checkbox" name="name1" /></td>
    
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td>Info</td>
    <td> Info</td>
    
  </tr>
  <tr>
    <td><input type="checkbox" name="name1" /></td>
    
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td>New Requirement</td>
    <td>requirement for new purchase</td>
    
  </tr>
  <tr>
    <td><input type="checkbox" name="name1" /></td>
    
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td>Replacement</td>
    <td>Trouble Shooting2</td>
      </tr>
  <tr>
    <td><input type="checkbox" name="name1" /></td>
    
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td>Temp Replacement</td>
    <td>temp requirement</td>
    
  </tr>
  
  <tr>
    <td><input type="checkbox" name="name1" /></td>
    
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td> Tips</td>
    <td>Tips</td>
    
  </tr>
   
   <tr>
    <td><input type="checkbox" name="name1" /></td>
   
    <td><span class="glyphicon glyphicon-edit"></span></td>
    <td> Troubleshoot</td>
    <td>Trouble Shooting1</td>
    
  </tr>
</table>


</form>
                  </div>






<div class="col-sm-17 well">

<h4>Help Card</h4>
Request level is a measure used to indicate the complexity of a request. This helps in the proper assignment of requests to the corresponding technicians who are experienced enough to handle the requests. 
<br><br>
To add a new level click the Add New Level link on the right hand side corner of the Level List table.

<br><br>
The Add Level form shown above has two fields, namely Name, and Description.
<br><br>
The level Name is where you specify the unique name that is used to identify each level.
<br><br>
You can enter a short description about the level in the Description field. This will help in figuring out which requests can be classified under this level, unless, the level name itself is explanatory. 
<br><br>
Click the Save button to save the level and return to the list view.
Click the Save and add new button to save the level and add another level.





</div>



                  
                         

                    </div>

                 </div>


                    
                          
			</div>












			</form>
      

			
	</body>
</html>
       