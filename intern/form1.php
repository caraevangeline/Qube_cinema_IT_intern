 <!DOCTYPE HTML>  
<html>
<head>
  <?php
include "header1.php";
if(!isset($_SESSION['login_user'])) 
      {header("Location: main.php"); 
      exit();} 
      ?>
<style>

#rcorners2 {
    border-radius: 4px;
    border: 1px solid #A9A9A9;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px;
     
}
#category {
    border-radius: 4px;
    border: 1px solid  #A9A9A9;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px; 
    
}
#type {
    border-radius: 4px;
    border:1px solid #A9A9A9;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px;  
   
}
#subcategory {
    border-radius: 4px;
    border: 1px solid #A9A9A9;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px;    
    
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

.error {color: #FF0000;}
</style>
<title>
    ITSM Portal
    </title>
    <!-- <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery.min.js" rel="stylesheet"> -->
</head>
<body>  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#type').on('change',function(){
        var typeID = $(this).val();
        if(typeID){
            $.ajax({
                type:'POST',
                url:'ex.php',
                data:'type_id='+typeID,
                success:function(html){
                    $('#category').html(html);
                    $('#subcategory').html('<option value="">Select Category first</option>'); 
                }
            }); 
        }else{
            $('#category').html('<option value="">Select type first</option>');
            $('#subcategory').html('<option value="">Select Category first</option>'); 
        }
    });
    
    $('#category').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:'POST',
                url:'ex.php',
                data:'category_id='+categoryID,
                success:function(html){
                    $('#subcategory').html(html);
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select Category first</option>'); 
        }
    });
});
</script>









<?php
//session_start();
//ob_start();

/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");*/ 
include("class.phpmailer.php");
    include("class.smtp.php");
    include("PHPMailerAutoload.php");
    $des="";
$statuserr=$modeerr=$priorityerr=$locationerr=$nameerr=$siteerr=$technicianerr=$categoryerr=$subcategoryerr=$itemerr=$emailerr=$subjecterr=$descriptionerr=$fileerr=$resolutionerr=$ticketno=$reason=$typeerr=$timeerr="";
$error=0;
$status=$mode=$priority=$location=$name=$site=$technician=$category=$subcategory=$item=$email=$subject=$description=$file=$resolution=$reasonerr=$type=$time="";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity1");







if($_SERVER["REQUEST_METHOD"] == "POST") {

    

  
 
 
if (empty($_POST["status"]))
  {
    $statuserr = "Status is required";

  }
  else
    $status = test_input($_POST["status"]);
  


if (empty($_POST["mode"]))
  {
    $modeerr = "Mode is required";

  }
  else
    $mode = test_input($_POST["mode"]);
 
if (empty($_POST["priority"]))
  {
    $priorityerr = "Priority is required";

  }
  else
    $priority = test_input($_POST["priority"]);

if (empty($_POST["location"]))
  {
    $locationerr = "Location is required";

  }
  else
    $location = test_input($_POST["location"]);

  

  if (empty($_POST["name"]))
  {
    $nameerr = "Name is required";

  }
  else
    $name = test_input($_POST["name"]);

  if (empty($_POST["time"]))
  {
    $timeerr = "Time is required";

  }
  else
    $time = test_input($_POST["time"]);

  
  
  if (empty($_POST["site"]))
  {
    $siteerr = "Site is required";

  }
  else
    $site = test_input($_POST["site"]);

 if (empty($_POST["technician"]))
  {
    $technicianerr = "Technician is required";

  }
  else
    $technician = test_input($_POST["technician"]);
  if (empty($_POST["type"]))
  {
    $typeerr = "Type is required";

  }
  else
    $type = test_input($_POST["type"]);

  if (empty($_POST["category"]))
  {
    $categoryerr = "Category is required";

  }
  else
    $category = test_input($_POST["category"]);


  if (empty($_POST["subcategory"]))
  {
    $subcategoryerr = "Sub category is required";

  }
  else
    $subcategory = test_input($_POST["subcategory"]);

  if (empty($_POST["item"]))
  {
    $itemerr = "Item is required";

  }
  else
    $item = test_input($_POST["item"]);

if (empty($_POST["email"]))
  {
    $emailerr = "E-Mail is required";

  }
  else
    $email = test_input($_POST["email"]);

  if (empty($_POST["subject"]))
  {
    $subjecterr = "Subject is required";

  }
  else
    $subject = test_input($_POST["subject"]);

  if (empty($_POST["description"]))
  {
    $descriptionerr = "Description is required";

  }
  else
    $description = test_input($_POST["description"]);

  // if (empty($_POST["file"]))
  // {
  //   $fileerr = "File is required";

  // }
  // else
  //   $file = test_input($_POST["file"]);

  if (empty($_POST["resolution"]))
  {
    $resolutionerr = "Resolution is required";

  }
  else
    $resolution = test_input($_POST["resolution"]);
  if (empty($_POST["reason"]))
  {
    $reasonerr = "Reason is required";

  }
  else
    $reason = test_input($_POST["reason"]);

$check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['file']['tmp_name'];
        $file = addslashes(file_get_contents($image));}


//$engineer=$_SESSION["username"];
//echo $snoerr,$dateerr,$hostnameerr,$particularerr,$ipaddresserr,$locationerr,$incidenttimeerr,$incidentnoticeerr,$ticketnoerr,$bueffecterr,$engineererr,$observationerr,$acplanerr,$etaerr,$sttimeerr,$endtimeerr,$remarkserr,$fmeaerr,$autherr;
//echo "done";

//if($statuserr==""&&$modeerr==""&&$priorityerr==""&&$locationerr==""&&$nameerr==""&&$siteerr==""&&$technicianerr==""&&$categoryerr==""&&$subcategoryerr==""&&$itemerr==""&&$emailerr==""&&$subjecterr==""&&$descriptionerr==""&&$fileerr==""&&$resolutionerr==""&&$reasonerr==""&&$timeerr==""){
if($categoryerr==""&&$subcategoryerr==""){


$query = "INSERT into random (no) select floor(rand()*999999) as 'n' from dual where 'n' not in (select no from random)";
    if(mysqli_query($link,$query)) 
{ }


else{ die ("failed to query database 4".mysqli_error($link));  }

$query = "SELECT  no from random order by sno desc LIMIT 1";
$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $no = $row['no'];
    $no1 = str_pad($no,6,"0",STR_PAD_LEFT);
$sa = "CN";
    $ticketno = $sa . '-' . $no1;
}





$query = "SELECT mail from users where username='$technician'";


$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $mail1 = $row['mail'];
   // $_SESSION['mail']=$mail;
    }


$query= " SELECT type_name from type where type_id='$type'";
$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $type = $row['type_name'];
    }
  
$query= " SELECT category_name from category where category_id='$category'";
$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $category = $row['category_name'];
    }
  $query= " SELECT subcategory_name from subcategory where subcategory_id='$subcategory'";
$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $subcategory = $row['subcategory_name'];
    }
  date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$des=$description;
$description=$name.'['.$date.']:'.$description;

$date1 = date('Y-m-d');
       //echo "hello";
$ticketno1=$ticketno;
$status1=$status;

$query = "INSERT INTO change1(ticketno,status,mode,priority,location,name,time1,site,technician,type,category,subcategory,item,email,subject,description,des,file,resolution,reason) VALUES ('$ticketno','$status','$mode','$priority','$location','$name','$time','$site','$technician','$type','$category','$subcategory','$item','$email','$subject','$description','$des','$file','$resolution','$reason')";

$query1 ="INSERT INTO status(ticketno,date1,status) VALUES ('$ticketno1','$date1','$status1')";
if(mysqli_query($link,$query1)) {}
  else{
die ("failed to query database 4".mysqli_error($link));
  }
if(mysqli_query($link,$query)) 
{
     //echo "<script type='text/javascript'>alert('SUCCESS.......!!!!')</script>";
  //ob_clean();
//require('html2pdf.php');
   $sub=$subcategory;
        if($category=="Server")
        {
            $ex=$subcategory.'.'.'realimage.co.in';
        $ip = gethostbyname($ex);
        $sub=$subcategory.'-'.$ip;}
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Change Ticket");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  <img src="images/logo.png" alt="logo" width="120" height="30"><br><br>
      <table border="2" cellspacing="0" cellpadding="3"><tr><td><h4>Ticket no</h4></td>
       <td>'.$ticketno.'</td></tr>
       <tr><td><h4>Status</h4></td>
       <td>'.$status.'</td></tr>
       <tr><td><h4>Mode</h4></td>
       <td>'.$mode.'</td></tr>
       <tr><td><h4>Priority</h4></td>
       <td>'.$priority.'</td></tr>
       <tr><td><h4>Location</h4></td>
       <td>'.$location.'</td></tr>
       <tr><td><h4>Name</h4></td>
       <td>'.$name.'</td></tr>
       <tr><td><h4>Site</h4></td>
       <td>'.$site.'</td></tr>
       <tr><td><h4>Technician</h4></td>
       <td>'.$technician.'</td></tr>
       <tr><td><h4>Type</h4></td>
       <td>'.$type.'</td></tr>
       <tr><td><h4>Category</h4></td>
       <td>'.$category.'</td></tr>
       <tr><td><h4>Subcategory</h4></td>
       <td>'.$sub.'</td></tr>
       <tr><td><h4>Item</h4></td>
       <td>'.$item.'</td></tr>
       <tr><td><h4>E-Mail</h4></td>
       <td>'.$email.'</td></tr>
       <tr><td><h4>Subject</h4></td>
       <td>'.$subject.'</td></tr>
       <tr><td><h4>Description</h4></td>
       <td>'.$description.'</td></tr>
       <tr><td><h4>Reason</h4></td>
       <td>'.$reason.'</td></tr>
       <tr><td><h4>Resolution</h4></td>
       <td>'.$resolution.'</td></tr>
      
      ';  
      //$content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 
      //ob_end_clean(); 
      $obj_pdf->Output($_SERVER['DOCUMENT_ROOT'].'/'.'changerequest.pdf', 'F');







   

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







$parts= explode(',', $mail1);
$i=0;



$temp=$parts[0];

while($temp!=end($parts))
    {
    #$name=$_POST['username'];  
    $mail1=$parts[$i];  
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = $host2; // specify main and backup server
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // set the port to use
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = $username; // your SMTP username or your gmail username
    $mail->Password = $password; // your SMTP password or your gmail password
    $from =$username ; // Reply to this email
    $to=$mail1; // Recipients email ID
     // Recipient's name
    $path="changerequest.pdf";
    
    $mail->From = $from;
    $mail->FromName = $fromname; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to,$mail1);
    $mail->AddReplyTo($replyto,"New Request");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');
    $mail->Subject = "New Change Request";
    $mail->Body =  "You have got a new request:";   
     if(!$mail->Send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        //echo "<script type='text/javascript'>alert('Your request will be processed')</script>";
    }
$i=$i+1;
$temp=$parts[$i];
  }




 $mail1=end($parts);  
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = $host2; // specify main and backup server
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // set the port to use
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = $username; // your SMTP username or your gmail username
    $mail->Password = $password; // your SMTP password or your gmail password
    $from =$username ; // Reply to this email
    $to=$mail1; // Recipients email ID
     // Recipient's name
    $path="changerequest.pdf";
    
    $mail->From = $from;
    $mail->FromName = $fromname; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to,$mail1);
    $mail->AddReplyTo($replyto,"New Request");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');
    $mail->Subject = "New Change Request";
    $mail->Body =  "You have got a new request:";   
     if(!$mail->Send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "<script type='text/javascript'>alert('Your request will be processed')</script>";
    }


      echo "<script>setTimeout(\"location.href = 'dashboard1.php';\",1500);</script>";
      //echo "<script>setTimeout(\"location.href = 'http://localhost/intern/mail.php';\",1500);</script>";
}


else{   die ("failed to query database 4".mysqli_error($link));}

mysqli_close($link);

}
else{

    echo "<script type='text/javascript'>alert('ENTER ALL DETAILS')</script>";
     // echo "<script>setTimeout(\"location.href = 'http://localhost/se%20project/signup.php';\",1500);</script>";
}
 }
      function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


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
        
         <div class="col-sm-16 well" style="background-color: #e5f2ff;">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="off">
                  <fieldset>
                            <legend><h5>New Change Management</h5></legend>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStatus&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            
                            <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT status FROM statuslist ORDER BY status ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="status" id="rcorners2" style="width:250px; " value="<?php echo $status;?>" required>
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
                           
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Priority&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT name FROM prioritylist ORDER BY name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="priority" id="rcorners2" style="width:250px; " value="<?php echo $priority;?>" required>
    <option value="" disabled selected>--Select Priority--</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option>'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Priority not available</option>';
    }
    ?>
</select>        
                                   
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMode&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
                             <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT name FROM modelist ORDER BY name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="mode" id="rcorners2" style="width:250px; " value="<?php echo $mode;?>" required>
    <option value="" disabled selected>--Select Mode--</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option>'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Mode not available</option>';
    }
    ?>
</select>
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Location&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <select name="location" id="rcorners2"  style="width:250px; " value="<?php echo $location;?>" required>
                            <option disabled selected value="">--Select Location--</option>
                            <option>Chennai</option>
                            <option>Bangalore</option>
                            <option>Bareilly</option>
                            <option>Mumbai</option>
                            <option>Chennai</option>
                            <option>Mumbai</option>
                            <option>Hyderabad</option>
                            <option>Delhi</option>
                            <option>Cochin</option>
                            </select> 
                            
                            <br>
                            </fieldset>
                            <br>
                            <!-- <div class="col-sm-17 well">
                  <form method="POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
                            <legend><h5>Requestor Details</h5></legend>
                            <br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" name="name" style="width:250px; " value="<?php echo $name;?>" required>
                            
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime Informed&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                            <input type="datetime-local"  id="rcorners2"  style="width:250px; " name="time"  value="<?php echo $time;?>" required>
                
                            <hr>
                  <!-- </form>
                  </div> -->
                            <br>
                            
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSite&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <select name="site" id="rcorners2" style="width:250px; " value="<?php echo $site;?>" >
                            <option>Not Associated to any site</option>
                            <option>Andhra Pradesh</option>
                            <option>Bangalore</option>
                            <option>Banglore</option>
                            <option>Bareilly(Uttar Pradesh)</option>
                            <option>Bihar</option>
                            <option>Chennai</option>
                            <option>Mumbai</option>
                            <option>Hyderabad</option>
                            <option>Delhi</option>
                            <option>Cochin</option>
                            </select>
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Type&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


                            <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT * FROM type ORDER BY type_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select id="type" name="type" style="width:250px; " value="<?php echo $type;?>" required>
    <option value="" disabled selected>Select Type</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['type_id'].'">'.$row['type_name'].'</option>';
        }
    }else{
        echo '<option value="">Type not available</option>';
    }
    ?>
</select>



<!-- <select id="city">
    <option value="">Select state first</option>
</select> -->

                            
                             
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTechnician&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT username FROM users ORDER BY username ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select  name="technician" id="rcorners2" style="width:250px; " value="<?php echo $technician;?>" required>
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
</select>
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Category&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <select id="category" name="category" style="width:250px; " value="<?php echo $category;?>" required>
    <option value="" disabled selected>Select Type first</option>
</select>
 
                            <br>
                            <br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Subcategory&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<select id="subcategory" name="subcategory" style="width:250px; " value="<?php echo $subcategory;?>" required>
    <option value="" disabled selected>Select Category first</option>
</select>
 
                            <br>
                            <br>




                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Item&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <select name="item" id="rcorners2" style="width:250px; " value="<?php echo $item;?>" required>
                            <option disabled selected value="">--Select Item--</option>
                            <option>Hardware</option>
                            <option>Software</option>
                            <option>Firmware</option>
                            <option>OS-Windows</option>
                            <option>OS-Linux</option>
                            
                            </select>
                             
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            E-mail Id(s) to notify&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" name="email" style="width:250px; " value="<?php echo $email;?>" required>
                            
                            <br>
                            <br>

                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubject&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" class="form-textbox" name="subject" value="<?php echo $subject;?>" required>
                           
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDescription&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" class="form-textbox1" name="description" value="<?php echo $description;?>">
                            <br>
                            <br>
                            <br>
                            
                              Attachments :<input type="file"  id="rcorners2" style="width:250px; " name="file" value="<?php echo $file;?>">


<!-- accept="file_extension|audio/*|video/*|image/*|media_type" -->
                            <br>
                            <br>

                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspReason&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" class="form-textbox1" id="rcorners2" name="reason" value="<?php echo $reason;?>">
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResolution&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" class="form-textbox1" id="rcorners2" name="resolution" value="<?php echo $resolution;?>">
                            <br>
                            <br>


                            <br>




          
          
          


                  
          <div class="row">
            <div class="col-sm-12 text-center">
              <input type="submit" id="btn" class="but" value="Add Request">
              <button type="reset" class="but">Reset</button>
            </div>
          </div><!--row19 ends-->
          <div class="row">
            <div class="col-sm-12">
              <br>
            </div>
          </div><!--row20 ends-->
          </form>
        </div><!--col-sm-6 is getting closed-->
        
        <div class="col-sm-3">
        </div>
      </div>
      
    <!-- </div> -->
  </body>
</html>