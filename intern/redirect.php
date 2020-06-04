<?php
session_start();
include ("header.php");
include("class.phpmailer.php");
include("class.smtp.php");
/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");  */
 //$sno = $_POST['o'];
//$sno = $_POST['ok'];
      $description1="";
$description=$_GET['description'];
$description1=$_GET['description1'];
$error=0;
$descriptionerr="";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"dc_activity1");
$sno = $_SESSION['varname'];
$technician=$_SESSION['technician'];
$ticketno=$_SESSION['ticket'];
$status=$_SESSION['stat'];
$mode=$_SESSION['mod'];
$priority=$_SESSION['prior'];
$location=$_SESSION['loc'];
$name=$_SESSION['nam'];
$time=$_SESSION['tim'];
$site=$_SESSION['sit'];
$type=$_SESSION['typ'];
$category=$_SESSION['cate'];
$subcategory=$_SESSION['subcate'];
$item=$_SESSION['it'];
$email=$_SESSION['ema'];
$subject=$_SESSION['subj'];
$description=$_SESSION['des'];
$resolution=$_SESSION['res'];
$reason=$_SESSION['rea'];
 date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
if($description1!="")
$d=$description."\r\n".$technician.'['.$date.']:'.$description1;
else
 $d=$description."\r\n".$technician.'['.$date.']:'.$description1;

if(isset($_GET['priority1']))
{
  $priority1=$_GET['priority1'];
}
else
$priority1=$priority;

if(isset($_GET['status1']))
{
  $status1=$_GET['status1'];
  $date1 = date('Y-m-d');
 $query = "INSERT INTO status values ('$ticketno','$date1','$status1')";
if(mysqli_query($link,$query)){}
  else
  {
    die ("failed to query database 4".mysqli_error($link)); 
  }



}
else
$status1=$status;

if(isset($_GET['technician1'])){
$technician1=$_GET['technician1'];

 $query = "SELECT mail from users where username='$technician1'";
$info = mysqli_query($link,$query);
while ($row = mysqli_fetch_array($info)){

    $mail1 = $row['mail'];
   // $_SESSION['mail']=$mail;
    }






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
       <td>'.$status1.'</td></tr>
       <tr><td><h4>Mode</h4></td>
       <td>'.$mode.'</td></tr>
       <tr><td><h4>Priority</h4></td>
       <td>'.$priority1.'</td></tr>
       <tr><td><h4>Location</h4></td>
       <td>'.$location.'</td></tr>
       <tr><td><h4>Name</h4></td>
       <td>'.$name.'</td></tr>
       <tr><td><h4>Site</h4></td>
       <td>'.$site.'</td></tr>
       <tr><td><h4>Technician</h4></td>
       <td>'.$technician1.'</td></tr>
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
       <td>'.$d.'</td></tr>
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
        echo "<script type='text/javascript'>alert('Directed to $technician1')</script>";
    }






}
else
$technician1="";
//date_default_timezone_set('Asia/Calcutta');
//$date = date('Y-m-d');
//$incidenttime = date('H:i:s');
//$incidenttime=NOW();

if($_SERVER["REQUEST_METHOD"] == "GET") {
 date_default_timezone_set('Asia/Calcutta');
    $date = date('Y-m-d H:i:s');

  
 
 

if($description1!="")
$d=$description."\r\n".$technician.'['.$date.']:'.$description1;
else
 $d=$description."\r\n".$technician.'['.$date.']:'.$description1;

if($technician1=="")
{
 

  $query = "UPDATE change1 SET description = '$d',priority= '$priority1',status= '$status1' WHERE sno='$sno'";
}
else

$query = "UPDATE change1 SET technician = '$technician1', description='$d',priority= '$priority1',status= '$status1' WHERE sno='$sno'";


if(mysqli_query($link,$query)) 
{ echo "<script type='text/javascript'>alert('Changes are saved successfully')</script>";

     echo "<script>setTimeout(\"location.href = 'database1.php';\",1500);</script>";
}


else{   die ("failed to query database 4".mysqli_error($link));}

mysqli_close($link);


 }
      function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>