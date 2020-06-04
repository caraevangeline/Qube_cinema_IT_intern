<!DOCTYPE HTML>  
<html>
<head>
  <?php
include "header.php";
if(!isset($_SESSION['login_user'])) 
      {header("Location: main.php"); 
      exit();} 
      ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">



$(function(){
  $("tr").each(function(){
    var col_val = $(this).find("td.s").text();
    if (col_val == "Closed"){
      $(this).addClass('selected');  //the selected class colors the row green//
      
    } 
    var b = $(this).find("td.p").text();
    if (b == "High" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
       $(this).addClass('high');
        
    }
    if (b == "Low" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
       $(this).addClass('low'); 
        
    }
if (b == "Medium" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
       $(this).addClass('medium'); 
        
    }


  });
});
    

</script>
<style>
.selected {
  background-color:white;
  color:#1a75ff;
  
}

.high{
  background-color:white;
  color:#cc3300;
}
.low{
  background-color:white;
  color:#00b359;
}
.medium{
  background-color:white;
  color:#FFA500;
}

#table_id {
    
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
  border: 1px solid #0080ff; 
  }

table, th, td {
    border: 1px solid #A9A9A9;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: center;
    height: 40px;
    width:70px;
}
#search {
    border:1px solid #0080ff;
    border-radius: 4px;
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
</head>
<body> 







<?php

//
/*session_start();
if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");  
*/
    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'dc_activity1';
    //$sno = $_SESSION['varname'];
    
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    

$priority=$_GET['priority'];
    //Get image data from database
        //$technician = $_SESSION['tech'];
   // $_SESSION['varname'] = $sno;

    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM change1 where priority = '$priority' ");

   
    
    if ($result->num_rows > 0) {
    echo "<br><br>";
    echo "<label>Change Requests </label> ";
     echo "<br><br>";
    echo "<table class='myTable' id='table_id' align='center'><tr><th>Ticket No</th><th>Status</th><th>Mode</th><th>Priority</th><th>Location</th><th>Name</th><th>Time</th><th>Site</th><th>Technician</th><th>Type</th><th>category</th><th>Subcategory</th><th>Item</th><th>E-Mail</th><th>Subject</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDescription&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th><th>File</th><th>Resolution</th><th>Reason</th><th></th><th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sub=$row['subcategory'];
        if($row['category']=="Server")
        {
            $ex=$row['subcategory'].'.'.'realimage.co.in';
        $ip = gethostbyname($ex);
        $sub=$row['subcategory'].'-'.$ip;
        //echo $ip;
        //$row['subcategory']=$row['subctaegory'].'-'.$ip;

}
else
$ip="";
        echo "<tr><td>" . $row["ticketno"]. "</td><td class='s'>" . $row["status"]. "</td><td>" . $row["mode"]. "</td><td class='p'>" . $row["priority"]. "</td><td>" . $row["location"]. "</td><td>" . $row["name"]. "</td><td>" . $row["time1"]. "</td><td>" . $row["site"]. "</td><td>" . $row["technician"]. "</td><td>" . $row["type"]. "</td><td>" . $row["category"]. "</td><td>$sub</td><td>" . $row["item"]. "</td><td>" . $row["email"]. "</td><td>" . $row["subject"]. "</td><td>" . $row["description"]. "</td>";
       // echo "<td><a name='$sno' href=img.php>Click Here</a></td>";
        echo "<td><form method='POST' action='img.php' >";
        $sno=$row['sno'];
        //$_SESSION['varname'] = $sno;
        echo "<button name='ok' class='but' value='$sno'>Click here</button></form></td>";

        //$_SESSION['varname'] = $_GET['$sno'];
        echo "<td>" . $row["resolution"]. "</td><td>" . $row["reason"]. "</td>";
        echo "<td><form method='POST' action='edit.php' ><button name='o' class='but' value='$sno'>Edit</button></form></td>";
        echo "<td><form method='POST' action='pdf.php' ><button name='generate_pdf' class='but' value='$sno'>Print</button></form></td></tr>";
    }
    echo "</table>";
} else {
    //echo "0 results";
    echo "<script type='text/javascript'>alert('No Change Requests on $priority')</script>";
}


















 $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where priority = '$priority' ");

   
    
    if ($result->num_rows > 0) {
    echo "<br><br>";
    echo "<label>Incident Requests</label>  ";
    echo "<br><br>";
    echo "<table class='myTable' id='table_id' align='center'><tr><th>Ticket No</th><th>Status</th><th>Mode</th><th>Priority</th><th>Location</th><th>Name</th><th>Time</th><th>Site</th><th>Technician</th><th>Type</th><th>category</th><th>Subcategory</th><th>Item</th><th>E-Mail</th><th>Subject</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDescription&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th><th>File</th><th>Resolution</th><th>Reason</th><th></th><th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sub=$row['subcategory'];
        if($row['category']=="Server")
        {
            $ex=$row['subcategory'].'.'.'realimage.co.in';
        $ip = gethostbyname($ex);
        $sub=$row['subcategory'].'-'.$ip;
        //echo $ip;
        //$row['subcategory']=$row['subctaegory'].'-'.$ip;

}
else
$ip="";
        echo "<tr><td>" . $row["ticketno"]. "</td><td class='s'>" . $row["status"]. "</td><td>" . $row["mode"]. "</td><td class='p'>" . $row["priority"]. "</td><td>" . $row["location"]. "</td><td>" . $row["name"]. "</td><td>" . $row["time1"]. "</td><td>" . $row["site"]. "</td><td>" . $row["technician"]. "</td><td>" . $row["type"]. "</td><td>" . $row["category"]. "</td><td>$sub</td><td>" . $row["item"]. "</td><td>" . $row["email"]. "</td><td>" . $row["subject"]. "</td><td>" . $row["description"]. "</td>";
       // echo "<td><a name='$sno' href=img.php>Click Here</a></td>";
        echo "<td><form method='POST' action='img1.php' >";
        $sno=$row['sno'];
        //$_SESSION['varname'] = $sno;
        echo "<button name='ok' class='but' value='$sno'>Click here</button></form></td>";

        //$_SESSION['varname'] = $_GET['$sno'];
        echo "<td>" . $row["resolution"]. "</td><td>" . $row["reason"]. "</td>";
        echo "<td><form method='POST' action='edit1.php' ><button name='o' class='but' value='$sno'>Edit</button></form></td>";
        echo "<td><form method='POST' action='pdf1.php' ><button name='generate_pdf' class='but' value='$sno'>Print</button></form></td></tr>";
    }
    echo "</table>";
} else {
    //echo "0 results";
    echo "<script type='text/javascript'>alert('No Incident Requests on $priority')</script>";
}



































?>
<br>
<br>


</body>
</html>
