 <!DOCTYPE HTML>  
<html>
<head>
 <?php
include ("header.php");
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

$category1="";
$categoryerr1="";
$category=$subcategory="";
//$item=$subcategory1"";
$error=0;
$categoryerr=$subcategoryerr="";
//$itemerr=$subcategoryerr1"";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity1");



if($_SERVER["REQUEST_METHOD"] == "POST") {

  
if (isset($_POST["savec"])){
    if (empty($_POST["category1"]))
  {
    $categoryerr1 = "category_name is required";
    $error=1;
  }
  else
    {
      $category1 = test_input($_POST["category1"]);
    }

if($categoryerr1==""){

$query = "INSERT INTO category (category_name,type_id) VALUES ('$category1','1');";
$query .="INSERT INTO category (category_name,type_id) VALUES ('$category1','2');";
$query .="INSERT INTO category (category_name,type_id) VALUES ('$category1','3')";

if(mysqli_multi_query($link,$query)) 
{ //echo "your have successfully registered" ;
     // echo "<script>setTimeout(\"location.href = 'http://localhost/intern/database.php';\",1500);</script>";
}


else{ die ("failed to query database 4".mysqli_error($link));}

mysqli_close($link);

}
else{echo "enter all details";

     // echo "<script>setTimeout(\"location.href = 'http://localhost/se%20project/signup.php';\",1500);</script>";
}
}




if (isset($_POST["saves"])){
  if (empty($_POST["subcategory"]))
  {
    //$subcategoryerr = "subcategory_name is required";
    $error=1;
  }
  else
    {
      $subcategory = test_input($_POST["subcategory"]);
    }
    
    if (empty($_POST["category"]))
  {
    $categoryerr = "Category is required";
    $error=1;
  }
  else
    {
      $category = test_input($_POST["category"]);
    }
    

if($categoryerr==""&&$subcategoryerr==""){

$getinfo = "select category_id from category where category_name='$category'";
$query1 = mysqli_query($link,$getinfo);

while ($row = mysqli_fetch_array($query1)) {
    $cat = $row['category_id'];

//$cat = "select category_id from category1 where category_name=$category "; 
$query = "INSERT INTO subcategory (subcategory_name,category_id) VALUES ('$subcategory','$cat')";


if(mysqli_query($link,$query)) 
{ //echo "your have successfully registered" ;
//echo "hello";
     // echo "<script>setTimeout(\"location.href = 'http://localhost/intern/database.php';\",1500);</script>";
}


else{ die ("failed to query database 4".mysqli_error($link));}}

mysqli_close($link);

}

else{echo "enter all details";

     // echo "<script>setTimeout(\"location.href = 'http://localhost/se%20project/signup.php';\",1500);</script>";
}


}


 }
      function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>




 
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
    <a href="#">Mail Server Settings</a>
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
                         HelpDesk-Category
                         <br>
                         <br>
                         <div class="col-sm-17 well" style="background-color:#e5f2ff;">
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <legend><h5>Category List</h5></legend>
                            
                           <!-- <button onclick="myFunction()">New Category</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
                           <input type="button" name="cat" id="cat" class="but" style="width: 125px;" value="New Category" onclick="myFunction()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                            <input type="button" name="cat" id="cat" class="but" style="width: 130px;" value="New SubCategory" onclick="myFunction1()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <br>
                            <br>
                            <div id="myDIV">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp*Category Name
                            <input type="text" name="category1" placeholder="enter category" id="category1" value="<?php echo $category1;?>" >
                            <br><br>
                            <input type="submit" name="savec" id="btn" class="but" value="Save">
                            <button type="reset" class="but">Clear</button>
                            </div>
                            <div id="myDIV1">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubCategory&nbsp&nbsp&nbsp
                            <input type="text" name="subcategory" placeholder="enter subcategory" id="subcategory" value="<?php echo $subcategory;?>" >
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCategory&nbsp&nbsp&nbsp
                           <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT distinct category_name FROM category ORDER BY category_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select id="category" name="category" style="width:250px; " value="<?php echo $category;?>">
    <option value="" disabled selected>Select Category</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
    ?>
</select>
                            <br><br>
                            <input type="submit" name="saves" id="btn" class="but" value="Save">
                            <button type="reset" class="but">Clear</button>
                            </div>

                            <!-- <div id="myDIV2">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp*Item
                            <input type="text" name="item" placeholder="enter item" id="item" value="<?php //echo $item;?>">
                            <br><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubCategory
                            <input type="text" name="subcategory1" placeholder="enter subcategory1" id="subcategory1" value="<?php //echo $subcategory1;?>" >
                            <br><br>
                            <input type="submit" name="savei" id="btn" class="btn btn-success" value="Save">
                            <button type="reset" class="btn btn-warning">Clear</button>
                            </div> -->


                            </form>
<br>
                           
                            




<table id="t01">
  <tr>
   
    
    <th></th>
    <th>Category</th>
    <th>Sub Category</th>
    </tr>

<?php


// Create connection
$conn = new mysqli("localhost","root","","dc_activity1");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql =  "SELECT distinct category_name,subcategory_name FROM category c,subcategory s where c.category_id=s.category_id ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
  /*echo "<table id="t01">";
  echo "<tr>";
    echo "<th>";
    echo '<input type="checkbox" name="name1" />';
    echo "</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "<th>Category</th>";
    echo "<th>Description</th>";
    echo "<th>Technician</th>";
  echo "</tr>";*/
    while($row = mysqli_fetch_assoc($result)) {
      $sub=$row['subcategory_name'];
        //echo "<tr><td>" . <img src="C:\xampp\htdocs\intern\images\arrow.jpg" alt="logo" width="15" height="15"> . "</td><td>" . <span class="glyphicon glyphicon-edit"></span> . "</td><td>" . $row['subcategory'] . "</td><td>" . $row['description'] . "</td><td>" . $row['technician'] . "</td></tr>";
      if($row['category_name']=="Server")
        {
            $ex=$row['subcategory_name'].'.'.'realimage.co.in';
        $ip = gethostbyname($ex);
        $sub=$row['subcategory_name'].'-'.$ip;
        //echo $ip;
        //$row['subcategory']=$row['subctaegory'].'-'.$ip;

}

      echo "<tr><td>";
       
      echo '<span class="glyphicon glyphicon-edit"></span>';
      echo "</td>";
echo "<td>" . $row['category_name'] . "</td><td>$sub</td></tr>"; 


    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 



</form>
                  </div>






<div class="col-sm-17 well">

<h4><b>Help Card</b></h4>
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
  <br><br>







</div>



                  
                         

                    </div>

                 </div>


                    
                          
			</div>
			</form>
      

			
	</body>
</html>
       