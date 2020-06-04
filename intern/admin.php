 <!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>
		ITSM Portal
		</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/jquery.min.js" rel="stylesheet">
</head>
<body>  


<?php
include ("header.php");
if(!isset($_SESSION['login_user'])) 
      {header("Location: main.php"); 
      exit();} 
/*session_start();
if (isset($_SESSION['login_user'])){

}else{

header("location:main.php");
exit();
}*/
?>
 <!-- <div class="container"> -->
			<!-- <div class="row">
				   <div class="col-sm-4">
				      </div>
				 
				     <div class="col-sm-4">
				     </div>
			       </div> -->
			     <!-- <div class="row">
				  <div class="col-sm-3">
				  </div> -->
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 <div class="col-sm-16 well">
					
					        <fieldset>
                            <legend><h5>Admin Settings</h5></legend>
                            <!-- <div class="split"> -->

                         <div class="leftpane1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                         	<img src="images/helpdesk.jpg" alt="images" width="100" height="100"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHelpdesk Customizer
                             <!--<h5>Helpdesk Customizer</h5>-->
                             <br>
                             <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="category.php">Category</a>&nbsp  | &nbsp<a href="status.php">Status</a>&nbsp  | &nbsp<a href="level.php">Level</a>&nbsp  | &nbsp<a href="mode.php">Mode</a>&nbsp  | &nbsp<a href="priority.php">Priority</a>&nbsp  | &nbsp<a href="#">Worklog Type</a>&nbsp  | 
                             <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Request Closure Code</a>&nbsp | &nbsp<a href="closing.php">Request Closing Rules</a>&nbsp |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Incident-Additional Fields</a>&nbsp | &nbsp<a href="#">Incident Template</a>&nbsp |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Resolution Template</a>&nbsp | &nbsp<a href="#">Reply Template</a>&nbsp | &nbsp<a href="#">Task Type</a>&nbsp |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Task Template</a>&nbsp | &nbsp<a href="#">Task Closing Rules</a>&nbsp | &nbsp<a href="#">Worklog - Additional Fields</a>&nbsp |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Service Categories</a>&nbsp | &nbsp<a href="#">Request Custom Menu</a>&nbsp | &nbsp<a href="#">Custom Triggers</a>&nbsp |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Chat Settings</a>&nbsp  

                         </div>
                             <div class="middlepane1">
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <img src="images/organization.jpg" alt="images" width="100" height="100"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrganizational Details
                             <br>
                             <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Organisational Details</a>&nbsp  | &nbsp<a href="mail.php">Mail Server Settings</a>&nbsp  | 
                             <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">SMS Notification Settings</a>&nbsp | &nbsp<a href="#">Regions</a>&nbsp | &nbsp<a href="#">Sites</a>&nbsp  | &nbsp<a href="#">Operational Hours</a>&nbsp  |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Holidays</a>&nbsp | &nbsp<a href="#">Departments</a>&nbsp | &nbsp<a href="#">Organizational Roles</a>&nbsp  | &nbsp<a href="#">Business Rules</a>&nbsp  |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Resolution Template</a>&nbsp | &nbsp<a href="#">Reply Template</a>&nbsp | &nbsp<a href="#">Task Type</a>&nbsp |
                              
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Service Level Agreements</a>&nbsp | &nbsp<a href="#">Notification Rules</a>&nbsp | 
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Preventive Maintenance Tasks</a>&nbsp | &nbsp<a href="#">Window Domain Scan</a>&nbsp 
                              <br><br><br>   
                           </div>
                             <div class="rightpane1">
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <img src="images/users.jpg" alt="images" width="100" height="100"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUsers
                             <br>
                             <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Roles</a>&nbsp  | &nbsp<a href="#">User - Additional Fields</a>&nbsp  | 
                             <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Support groups</a>&nbsp | &nbsp<a href="#">User Groups</a>&nbsp | &nbsp<a href="#">Active Directory</a>&nbsp  | &nbsp<a href="#">LDAP</a>&nbsp  |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Leave Types</a>&nbsp | &nbsp<a href="#">Robo Technician</a>&nbsp | &nbsp<a href="#">Techician Auto Assign</a>&nbsp  
                              <br>
                              <br><br><br><br><br><br><br><br>  

                         </div>
                         

<!-- </div> -->
                     </fieldset>

                    <br>
                          
			<!-- </div>











<div class="col-sm-16 well"> -->
					

                         <div class="leftpane1">
                         	<!-- <img src="C:\xampp\htdocs\intern\images\student.png" alt="images" width="100" height="50"> -->
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <img src="images/survey.jpg" alt="images" width="100" height="100"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUser Survey
                             <br>
                             <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Survey Setting</a>&nbsp  | &nbsp<a href="#">Define Setting</a>&nbsp  | &nbsp<a href="#">Survey Preview</a>&nbsp  | &nbsp<a href="#">Survey Results</a>&nbsp   
                             <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                         </div>
                             <div class="middlepane1">
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <img src="images/settings.jpg" alt="images" width="100" height="100"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGeneral Settings
                             <br>
                             <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Self- Survey Portal Setting</a>&nbsp  | &nbsp<a href="#">Security Settings</a>&nbsp  | &nbsp<a href="#">Theme</a>&nbsp |
                             <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Backup Scheduling</a>&nbsp | &nbsp<a href="#">Data Archiving</a>&nbsp | &nbsp<a href="#">Custom Schedules</a>&nbsp  | &nbsp<a href="#">API</a>&nbsp  |
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Advanced Analytics</a>&nbsp | &nbsp<a href="#">Proxy Settings</a>&nbsp | &nbsp<a href="#">ME Integrations</a>&nbsp  | 
                              <br><br>
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#">Self monitoring service for SDP</a>&nbsp | &nbsp<a href="#">Translations</a>&nbsp 
                              <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                 
                          
                         

<!-- </div> -->
                     
                          
			</div>
			
<div class="rightpane1">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                         </div>















			</form>
			
		<!-- </div> -->
	</body>
</html>
       