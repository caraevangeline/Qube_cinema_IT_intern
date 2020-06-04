<!DOCTYPE HTML>  
<html>
<head>
  <?php
include "header1.php";
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
    var a = $(this).find("td.p").text();
    if (a == "High" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
       $(this).addClass('high'); 
    }
    if (a == "Low" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
       $(this).addClass('low'); 
    }
if (a == "Medium" && (col_val =="Open" || col_val == "Resolved" || col_val == "WFC" || col_val == "In Progress" || col_val =="On Hold" )){
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
  font-size: 12px;
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

/*table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
table, th, td {
    border: 1px solid black;
}*/
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: center;
    height: 40px;
    width:70px;
}
#rcorners2 {
    border-radius: 5px;
    border: solid #A9A9A9;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px;    
}
.error {color: #FF0000;}
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
//session_start();
/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php"); */ 

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

    if(isset($_GET['kit']) && isset($_GET['k'])){
      

          $ticketno = $_GET['k'];
    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,des,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where ticketno = '$ticketno' ");}


  if(isset($_GET['kit']) && isset($_GET['k1'])){
           $technician = $_GET['k1'];
    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,des,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where technician = '$technician' ");}



    if(isset($_GET['kit']) && isset($_GET['k2'])){
           $category= $_GET['k2'];
    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,des,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where category = '$category' ");}



    if(isset($_GET['kit'])  && isset($_GET['k1'])  && isset($_GET['k2']) ){
           $technician = $_GET['k1'];
            $category= $_GET['k2'];
    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,des,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where technician = '$technician' and category = '$category' ");}



   if(isset($_GET['kit']) && isset($_GET['k3']) && isset($_GET['k4']) && isset($_GET['k5'])){

   $fromdate = $_GET['k3'];
   $todate = $_GET['k4'];
   $status = $_GET['k5'];
   $fromdate1 = $_GET['k3'];
   $todate1 = $_GET['k4'];
   $status1 = $_GET['k5'];
    $result = $db->query("SELECT sno,priority,location,name,site,technician,type,category,subcategory,item,description,des,ticketno,status,mode,email,subject,resolution,reason,file,time1 FROM incident where ticketno in (SELECT ticketno from status where status='$status' and date1 between '$fromdate' and '$todate') ");
    
   }




if ($result->num_rows > 0 && (isset($_GET['k3']) && isset($_GET['k4']) && isset($_GET['k5']))) {
    echo "<br><br>";
    echo "<table class='myTable' id='table_id' align='center'><tr><th>Ticket No</th><th>Current Status</th><th>Mode</th><th>Priority</th><th>Location</th><th>Name</th><th>Time</th><th>Site</th><th>Technician</th><th>Type</th><th>category</th><th>Subcategory</th><th>Item</th><th>E-Mail</th><th>Subject</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDescription&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th><th>File</th><th>Resolution</th><th>Reason</th><th></th><th></th><th>Status History</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $tic=$row['ticketno'];
$result1 = $db->query("SELECT date1,status from status where ticketno = '$tic'");
    if($result1->num_rows >0)
    {
        
        
        $history="";
        while($row1 = $result1->fetch_assoc()){
$s=$row1['status'];
$new = str_replace(' ', '-', $s);
         $history=$history.PHP_EOL.$new."-".$row1['date1'];
        

        }
        
    }

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
        echo "<tr><td style='font-size:15px;'>" . $row["ticketno"]. "</td><td class='s' style='font-size:15px;'>" . $row["status"]. "</td><td style='font-size:15px;'>" . $row["mode"]. "</td><td class='p' style='font-size:15px;'>" . $row["priority"]. "</td><td style='font-size:15px;'>" . $row["location"]. "</td><td style='font-size:15px;'>" . $row["name"]. "</td><td style='font-size:15px;'>" . $row["time1"]. "</td><td style='font-size:15px;'>" . $row["site"]. "</td><td class='t' style='font-size:15px;'>" . $row["technician"]. "</td><td style='font-size:15px;'>" . $row["type"]. "</td><td style='font-size:15px;'>" . $row["category"]. "</td><td style='font-size:15px;'>$sub</td><td style='font-size:15px;'>" . $row["item"]. "</td><td style='font-size:15px;'>" . $row["email"]. "</td><td style='font-size:15px;'>" . $row["subject"]. "</td><td style='font-size:15px;'>" . $row["des"]. "</td>";
       // echo "<td><a name='$sno' href=img.php>Click Here</a></td>";
        echo "<td><form method='GET' action='img1.php' >";
        $sno=$row['sno'];
        //$_SESSION['varname'] = $sno;
        echo "<button name='ok' class='but' value='$sno'>Click here</button></form></td>";

        //$_SESSION['varname'] = $_GET['$sno'];
        echo "<td style='font-size:15px;'>" . $row["resolution"]. "</td><td style='font-size:15px;'>" . $row["reason"]. "</td>";
        echo "<td><form method='GET' action='edit1a.php' ><button name='o' class='but' value='$sno'>Edit</button></form></td>";
        echo "<td><form method='GET' action='pdf1.php' ><button name='generate_pdf' class='but' value='$sno'>Print</button></form></td>";
         echo "<td><form method='GET' action='history.php'><button name='h' class='but' value='$history'>History</button></form></td></tr>";
    }
   
    echo "</table>";
}


    
   else if ($result->num_rows > 0 &&  (isset($_GET['k']) || isset($_GET['k1']) || isset($_GET['k2'])) ) {
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
        $tech=$row['technician'];
$new = str_replace(' ', '%20', $tech);
$url='direct.php?technician='.$new;
$pr=$row['priority'];
$url1='piedirect.php?priority='.$pr;
        echo "<tr><td style='font-size:15px;'>" . $row["ticketno"]. "</td><td class='s' style='font-size:15px;'>" . $row["status"]. "</td><td style='font-size:15px;'>" . $row["mode"]. "</td><td class='p' style='font-size:15px;'>" . $row["priority"]. "</td><td style='font-size:15px;'>" . $row["location"]. "</td><td style='font-size:15px;'>" . $row["name"]. "</td><td style='font-size:15px;'>" . $row["time1"]. "</td><td style='font-size:15px;'>" . $row["site"]. "</td><td class='t' style='font-size:15px;'>" . $row["technician"]. "</td><td class='type' style='font-size:15px;'>" . $row["type"]. "</td><td style='font-size:15px;'>" . $row["category"]. "</td><td style='font-size:15px;'>$sub</td><td style='font-size:15px;'>" . $row["item"]. "</td><td style='font-size:15px;'>" . $row["email"]. "</td><td style='font-size:15px;'>" . $row["subject"]. "</td><td style='font-size:15px;'>" . $row["des"]. "</td>";
       // echo "<td><a name='$sno' href=img.php>Click Here</a></td>";
        echo "<td><form method='GET' action='img1.php' >";
        $sno=$row['sno'];
        //$_SESSION['varname'] = $sno;
        echo "<button name='ok' class='but' value='$sno'>Click here</button></form></td>";

        //$_SESSION['varname'] = $_GET['$sno'];
        echo "<td style='font-size:15px;'>" . $row["resolution"]. "</td><td style='font-size:15px;'>" . $row["reason"]. "</td>";
        echo "<td><form method='GET' action='edit1a.php' ><button name='o' class='but' value='$sno'>Edit</button></form></td>";
        echo "<td><form method='GET' action='pdf1.php' ><button name='generate_pdf' class='but' value='$sno'>Print</button></form></td></tr>";
    }
  
    echo "</table>";
}
/*} else {
    //echo "0 results";
}*/







 else {
   echo "<script type='text/javascript'>alert('No Results ')</script>";
}




?>
<br>
<br>


</body>
</html>