<!DOCTYPE html>
<html>
<head>
  <?php
include ("header.php");
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

/*table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
table, th, td {
    border: 1px solid black;
}*/
</style>
<title>
        ITSM Portal
        </title>
</head>
<body>
    <?php
    
    /*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");  */
    $ticket=$technician=$category="";
?>
<br>
    <form method='GET' action='view.php' autocomplete="off" >
        <button name='kit' class='but'>Filter</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text"  name="k" id="search" value="<?php echo $ticket;?>" placeholder="Ticket no">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT username FROM users ORDER BY username ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="k1" id="search" style="width:200px;height:25px;" value="<?php echo $technician;?>" >
    <option value="" disabled selected>--Select Technician--</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option>'.$row['username'].'</option>';
        }
    }else{
        echo '<option value="">Technician not available</option>';
    }
    ?>
</select>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

   <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT distinct category_name FROM category ORDER BY category_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="k2" id="search" style="width:200px;height:25px;" value="<?php echo $category;?>">
    <option value="" disabled selected>Select Category</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
    ?>
</select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFrom&nbsp
 <input type="date"  id="search"  style="width:200px;height:25px; " name="k3"   > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo&nbsp
 <input type="date"  id="search"  style="width:200px;height:25px; " name="k4"   > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT status FROM statuslist ORDER BY status ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  id="search" style="width:170px;height:25px; " name= "k5" value="<?php echo $status;?>" >
    <option value="" disabled selected>--Select Status--</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option>'.$row['status'].'</option>';
        }
    }else{
        echo '<option value="">Status not available</option>';
    }
    ?>
</select> 

</form>

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

$sql = "SELECT * FROM change1";
$result = $conn->query($sql);
echo "<br><br>";
if ($result->num_rows > 0) {
    //echo "<br><br>";

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
        echo "<tr><td style='font-size:15px;'>" . $row["ticketno"]. "</td><td class='s' style='font-size:15px;'>" . $row["status"]. "</td><td style='font-size:15px;'>" . $row["mode"]. "</td><td class='p' style='font-size:15px;'>" . $row["priority"]. "</td><td style='font-size:15px;'>" . $row["location"]. "</td><td style='font-size:15px;'>" . $row["name"]. "</td><td style='font-size:15px;'>" . $row["time1"]. "</td><td style='font-size:15px;'>" . $row["site"]. "</td><td class='t' style='font-size:15px;'>" . $row["technician"]. "</td><td class='type' style='font-size:15px;'>" . $row["type"]. "</td><td style='font-size:15px;'>" . $row["category"]. "</td><td style='font-size:15px;'>$sub</td><td style='font-size:15px;'>" . $row["item"]. "</td><td style='font-size:15px;'>" . $row["email"]. "</td><td style='font-size:15px;'>" . $row["subject"]. "</td><td style='font-size:15px;'><b>" . $row["des"]. "</b></td>";
       // echo "<td><a name='$sno' href=img.php>Click Here</a></td>";
        echo "<td><form method='GET' action='img.php' >";
        $sno=$row['sno'];
        //$_SESSION['varname'] = $sno;
        echo "<button name='ok' class='but' value='$sno'>Click here</button></form></td>";

        //$_SESSION['varname'] = $_GET['$sno'];
        echo "<td style='font-size:15px;'>" . $row["resolution"]. "</td><td style='font-size:15px;'>" . $row["reason"]. "</td>";
        echo "<td><form method='GET' action='edit.php' ><button name='o' class='but' value='$sno'>Edit</button></form></td>";
        echo "<td><form method='GET' action='pdf.php' ><button name='generate_pdf' class='but' value='$sno'>Print</button></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 
<?php
/*
$mail1=$_SESSION['mail'];
    
    #$name=$_POST['username'];
    
    
    include("class.phpmailer.php");
    include("class.smtp.php");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // specify main and backup server
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // set the port to use
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "caraevangeline10@gmail.com"; // your SMTP username or your gmail username
    $mail->Password = "jesuschrist25"; // your SMTP password or your gmail password
    $from ="caraevangeline10@gmail.com" ; // Reply to this email
    $to=$mail1; // Recipients email ID
     // Recipient's name
    
    
    $mail->From = $from;
    $mail->FromName = "Qube Cinema Technologies"; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to,$mail1);
    $mail->AddReplyTo($from,"New Request");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "New Request";
    $mail->Body =  " 
    <form method='POST' action='view1.php' ><button name='k' class='btn btn-success' value='$sno'>View</button></form>";   
     if(!$mail->Send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "<script type='text/javascript'>alert('Your request will be processed')</script>";
    }*/
?>

</body>
</html>