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
   background-color: white;
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
$('#myDIV1').hide();
//$('#myDIV2').hide();

    var x = document.getElementById("myDIV");
  
    
        if (x.style.display === "none") {
 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function myFunction1() {
$('#myDIV').hide();
//$('#myDIV2').hide();

    var x = document.getElementById("myDIV1");
    
    if (x.style.display === "none") {
 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
/*function myFunction2() {
$('#myDIV').hide();
$('#myDIV1').hide();


    var x = document.getElementById("myDIV2");
    
    if (x.style.display === "none") {
 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}*/
</script>
</head>
<body>  



<?php

 $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'dc_activity1';
    
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
   
    $result = $db->query("SELECT * FROM mailout ");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $host1=$row['host1'];
        $host2=$row['host2'];
        $fromname=$row['fromname'];
        $replyto=$row['replyto'];
        $username=$row['username'];
        $password=$row['password'];
      }

      $username1=$_SESSION['login_user'];
      $result = $db->query("SELECT mail from users where username='$username1' ");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $mail=$row['mail'];
        
      }
if (isset($_POST['saveo']))
      $query = $db->query("UPDATE mailout set host1='".$_POST['host1']."', host2='".$_POST['host2']."', fromname='".$_POST['fromname']."', replyto='".$_POST['replyto']."', username='".$_POST['username'] ."', password='".$_POST['password']."' where host1='$host1' ");
    if (isset($_POST['savei']))
      $query = $db->query("UPDATE users set mail='".$_POST['mail']."' where username='$username1' ");


?>




 
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 
					
					        <div style="width:100%;"> 
                  
                    <div style="float:left; width:20%;">
                       <div class="col-sm-17 well" style="background-color: #e5f2ff;" >
                      <div class="dropdown" style="background-color: #e5f2ff;">
  <button class="dropbtn" style="background-color: #e5f2ff;">Help Desk&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
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
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color: #e5f2ff;">Users&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color: #e5f2ff;">User Survey&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
<br>
<div class="dropdown">
  <button class="dropbtn" style="background-color:#e5f2ff;">General&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
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
                         HelpDesk - Mail Server Settings
                         <br>
                         <br>
                         <div class="col-sm-17 well" style="background-color:#e5f2ff; float:left;width:50%;">
                  <legend>Incoming</legend><br>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp
                   *E-mail Id(s) &nbsp&nbsp&nbsp<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <textarea name="mail" rows="8" cols="40"> <?php echo $mail ?></textarea><br>
                <br><br><br>
                  <br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <input type="submit" name="savei" id="btn" class="but" value="Save" >

                  </div>
                  <div class="col-sm-17 well" style="background-color:#e5f2ff; float:right;width:50%;">
                     <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                  <legend>Outgoing</legend><br> &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp
                  *Server Name &nbsp&nbsp&nbsp
                  <input type="text" name="host1" value="<?php echo $host1?>"><br><br>
                  &nbsp&nbspAlternative Server Name  &nbsp&nbsp&nbsp
                  <input type="text" name="host2" value="<?php echo $host2?>"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  Sender's Name  &nbsp&nbsp&nbsp
                  <input type="text" name="fromname" value="<?php echo $fromname?>"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  *Reply-to Address  &nbsp&nbsp&nbsp
                  <input type="text" name="replyto" value="<?php echo $replyto?>"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  E-mail Type  &nbsp&nbsp&nbsp
                  <input type="text" value="SMTP" readonly><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  *Username &nbsp&nbsp&nbsp
                  <input type="text" name="username" value="<?php echo $username?>"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  *Password  &nbsp&nbsp&nbsp
                  <input type="password" name="password" value="<?php echo $password?>"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <input type="submit" name="saveo" id="btn" class="but" value="Save" >
</form>
                  </div>






<div class="col-sm-17 well">

<!-- <h4><b>Help Card</b></h4>
You can classify different types of requests into different categories.  (Example: All requests for installing software can be classified under the category "Software Installation"). Also hierarchy of Category -> Sub-category -> Item is supported using which the type of the incident can be granularly categorised.  By using different categories you can configure the application to automatically route cases to the appropriate technician. As an example all Internet connectivity related issues could be automatically assigned to John - your Network Engineer.
<br>
<br>
<b>To Create New Category </b>
<br><br>
Click <b>New Category</b> button. This displays the category form. <br>
Specify the <b>Category</b> Name in the given text field. For ex. Printer. This is the only mandatory field. <br>
Specify relevant information about the newly created category in the Description field. <br>
Select the technician to be assigned for the newly created category from the Assign To Technician combo box. All the issues related to this category will be assigned to the selected technician. <br>
Click <b>Save</b> button to save the details. You can see the category getting listed in the category list view. <br>
Click <b>Save And Add Sub-Category</b> button to save the details and add another sub category. 
<br><br>
<b>To Create New Sub Category</b> 
 <br><br> 
Click <b>New Sub Category</b> button. This displays the sub-category form. <br>
Specify the <b>Sub Category</b> name in the given text field. For ex. Paper. This is a mandatory field. <br>
Specify relevant information about the newly created sub category in the Description field. <br>
Select the Category from the combo box. For ex. Printer. This is a mandatory field.  <br>   
  <br><br> -->







</div>



                  
                         

                    </div>

                 </div>


                    
                          
			</div>
			</form>
      

			
	</body>
</html>
       