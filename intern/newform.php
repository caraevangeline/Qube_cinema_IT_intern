 <!DOCTYPE HTML>  
<html>
<head>
  
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
    background-color:black;
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
    
   
</script>









<?php


$formno=$date=$assetno=$hostname=$location=$department=$requestor=$requestord=$approval=$approvald=$itapproval=$itapprovald=$username=$usernamed=$employeecode=$machine=$assettype=$make=$model=$serialno=$hdd=$ram=$proc=$os=$adaptor=$monitor=$monitorsnno=$inchs=$exthdd=$usbdrive=$datacard=$imei=$rsn=$mobileno=$zipfile=$msoffice=$adobe=$skype=$teamviewer=$pdfcreator=$antivirus=$ubuntuupdate=$extraaccessories=$comment=$receivedasset=$make1=$model1=$serialno1=$hdd1=$ram1=$proc1=$os1=$adaptor1=$monitor1=$monitorsnno1=$inchs1=$exthdd1=$usbdrive1=$receiveddate1="";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"form");







if($_SERVER["REQUEST_METHOD"] == "POST") {

$formno=$_POST['formno'];
$date=$_POST['date'];
$assetno=$_POST['assetno'];
$hostname=$_POST['hostname'];
$location=$_POST['location'];
$department=$_POST['department'];
$requestor=$_POST['requestor'];
$requestord=$_POST['requestord'];
$approval=$_POST['approval'];
$approvald=$_POST['approvald'];
$itapproval=$_POST['itapproval'];
$itapprovald=$_POST['itapprovald'];
$username=$_POST['username'];
$usernamed=$_POST['usernamed'];
$employeecode=$_POST['employeecode'];
$machine=$_POST['machine'];
$assettype=$_POST['assettype'];
$make=$_POST['make'];
$model=$_POST['model'];
$serialno=$_POST['serialno'];
$hdd=$_POST['hdd'];
$ram=$_POST['ram'];
$proc=$_POST['proc'];
$os=$_POST['os'];
$adaptor=$_POST['adaptor'];
$monitor=$_POST['monitor'];
$monitorsnno=$_POST['monitorsnno'];
$inchs=$_POST['inchs'];
$exthdd=$_POST['exthdd'];
$usbdrive=$_POST['usbdrive'];
$datacard=$_POST['datacard'];
$imei=$_POST['imei'];
$rsn=$_POST['rsn'];
$mobileno=$_POST['mobileno'];
$zipfile=$_POST['zipfile'];
$msoffice=$_POST['msoffice'];
$adobe=$_POST['adobe'];
$skype=$_POST['skype'];
$teamviewer=$_POST['teamviewer'];
$pdfcreator=$_POST['pdfcreator'];
$antivirus=$_POST['antivirus'];
$ubuntuupdate=$_POST['ubuntuupdate'];
$extraaccessories=$_POST['extraaccessories'];
$comment=$_POST['comment'];
$receivedasset=$_POST['receivedasset'];
$make1=$_POST['make1'];
$model1=$_POST['model1'];
$serialno1=$_POST['serialno1'];
$hdd1=$_POST['hdd1'];
$ram1=$_POST['ram1'];
$proc1=$_POST['proc1'];
$os1=$_POST['os1'];
$adaptor1=$_POST['adaptor1'];
$monitor1=$_POST['monitor1'];
$monitorsnno1=$_POST['monitorsnno1'];
$inchs1=$_POST['inchs1'];
$exthdd1=$_POST['exthdd1'];
$usbdrive1=$_POST['usbdrive1'];
$receiveddate1=$_POST['receiveddate1'];
/*$query = "INSERT into random (no) select floor(rand()*999999) as 'n' from dual where 'n' not in (select no from random)";
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
  date_default_timezone_set('Asia/Kolkata');*/

$query = "INSERT INTO form (formno,date,assetno,hostname,location,department,requestor,requestord,approval,approvald,itapproval,itapprovald,username,usernamed,employeecode,machine,assettype,make,model,serialno,hdd,ram,proc,os,adaptor,monitor,monitorsnno,inchs,exthdd,usbdrive,datacard,imei,rsn,mobileno,zipfile,msoffice,adobe,skype,teamviewer,pdfcreator,antivirus,ubuntuupdate,extraaccessories,comment,receivedasset,make1,model1,serialno1,hdd1,ram1,proc1,os1,adaptor1,monitor1,monitorsnno1,inchs1,exthdd1,usbdrive1,receiveddate) VALUES ('$formno','$date','$assetno','$hostname','$location','$department','$requestor','$requestord','$approval','$approvald','$itapproval','$itapprovald','$username','$usernamed','$employeecode','$machine','$assettype','$make','$model','$serialno','$hdd','$ram','$proc','$os','$adaptor','$monitor','$monitorsnno','$inchs','$exthdd','$usbdrive','$datacard','$imei','$rsn','$mobileno','$zipfile','$msoffice','$adobe','$skype','$teamviewer','$pdfcreator','$antivirus','$ubuntuupdate','$extraaccessories','$comment','$receivedasset','$make1','$model1','$serialno1','$hdd1','$ram1','$proc1','$os1','$adaptor1','$monitor1','$monitorsnno1','$inchs1','$exthdd1','$usbdrive1','$receiveddate1')";

if(mysqli_query($link,$query)) 
{
    
  /* $sub=$subcategory;
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
*/
 




       echo "<script type='text/javascript'>alert('Successful submission')</script>";
      //echo "<script>setTimeout(\"location.href = 'http://localhost/intern/mail.php';\",1500);</script>";
}


else{   die ("failed to query database 4".mysqli_error($link));}

mysqli_close($link);


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
        
         <div class="col-sm-16 well" style="background-color: white;">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="off">
             <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            User Asset Form</h1><br>
                  <fieldset>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspForm No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" style="width: 250px;" name="formno" value="<?php echo $formno;?>" >
                            
                           
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Date&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="date" id="rcorners2" style="width: 250px;" name="date" value="<?php echo $date;?>">
                              
                                   
                            <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAsset No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
                            <input type="text" id="rcorners2" style="width: 250px;" name="assetno" value="<?php echo $assetno;?>">
                             
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Hostname&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="text" id="rcorners2" style="width: 250px;" name="hostname" value="<?php echo $hostname;?>">
                             
                            <br>
                           
                            <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLocation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="text" id="rcorners2" style="width:250px; " name="location" value="<?php echo $location;?>">
                            <br>
                           
                            <br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDepartment&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                            <input type="text"  id="rcorners2"  style="width:250px; " name="department" value="<?php echo $department;?>">
                
                            <br>
                            <br>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRequestor&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="text"  id="rcorners2"  style="width:250px; " name="requestor" value="<?php echo $requestor;?>">
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Designation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text"  id="rcorners2"  style="width:250px; " name="requestord" value="<?php echo $requestord;?>">
                           <br>
                            <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApproval&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="text"  id="rcorners2"  style="width:250px; " name="approval" value="<?php echo $approval;?>">
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Designation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text"  id="rcorners2"  style="width:250px; "   name="approvald" value="<?php echo $approvald;?>">
                           <br>
                            <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIT Approval&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="text"  id="rcorners2"  style="width:250px; " name="itapproval" value="<?php echo $itapproval;?>">
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Designation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text"  id="rcorners2"  style="width:250px; "   name="itapprovald" value="<?php echo $itapprovald;?>">
                           <br>
                            <br>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUser Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             <input type="text"  id="rcorners2"  style="width:250px; " name="username" value="<?php echo $username;?>">
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Designation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text"  id="rcorners2"  style="width:250px; " name="usernamed" value="<?php echo $usernamed;?>">
                           <br>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEmployee Code&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                           <input type="text"  id="rcorners2"  style="width:250px; " name="employeecode" value="<?php echo $employeecode;?>">

                            <br><br>
                            <fieldset><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Machine&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:250px; " name="machine" value="<?php echo $machine;?>">
                            <br>
                            <br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Asset Type&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:250px; " name="assettype" value="<?php echo $assettype;?>">
                            <br>
                            <br>
Configuration :&nbsp&nbsp&nbsp&nbspMake&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="make" value="<?php echo $make;?>">&nbsp&nbspModel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="model" value="<?php echo $model;?>">
                              &nbsp&nbspSerial No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="serialno" value="<?php echo $serialno;?>">
                               &nbsp&nbspHDD&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="hdd" value="<?php echo $hdd;?>">
                              &nbsp&nbspRAM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="ram" value="<?php echo $ram;?>">
                                &nbsp&nbspPROC&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="proc" value="<?php echo $proc;?>">
                                &nbsp&nbspOS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="os" value="<?php echo $os;?>">
                               <br>
                               <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               Adaptor&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="adaptor" value="<?php echo $adaptor;?>">&nbsp&nbspMonitor&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="monitor" value="<?php echo $monitor;?>">
                              &nbsp&nbspMonitor Sn-No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="monitorsnno" value="<?php echo $monitorsnno;?>">
                               &nbsp&nbspInchs&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="inchs" value="<?php echo $inchs;?>">
                              &nbsp&nbspExt-Hdd&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="exthdd" value="<?php echo $exthdd;?>">
                                &nbsp&nbspUSB Drive&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="usbdrive" value="<?php echo $usbdrive;?>">
                                
                               <br>
                               <br>


                          </fieldset>
<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Data Card&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text"  id="rcorners2"  style="width:200px; " name="datacard" value="<?php echo $datacard;?>">&nbsp&nbsp
IMEI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text"  id="rcorners2"  style="width:200px; " name="imei" value="<?php echo $imei;?>">&nbsp&nbsp
RSN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text"  id="rcorners2"  style="width:200px; " name="rsn" value="<?php echo $rsn;?>">&nbsp&nbsp
MobileNo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text"  id="rcorners2"  style="width:200px; " name="mobileno" value="<?php echo $mobileno;?>">&nbsp&nbsp
<br><br>
Default-App-Windows::&nbsp&nbsp&nbsp&nbspZipFile&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="zipfile" value="<?php echo $zipfile;?>">&nbsp&nbspMS Office&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="msoffice" value="<?php echo $msoffice;?>">
                              &nbsp&nbspAdobe&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="adobe" value="<?php echo $adobe;?>">
                               &nbsp&nbspSkype&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="skype" value="<?php echo $skype;?>">
                              &nbsp&nbspTeam Viewer&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="teamviewer" value="<?php echo $teamviewer;?>">
                                &nbsp&nbspPDF Creator&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="pdfcreator" value="<?php echo $pdfcreator;?>">
                             <br><br>   


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Anti-Virus&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:250px; " name="antivirus" value="<?php echo $antivirus;?>">
                            <br><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Ubuntu Update&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:250px; " name="ubuntuupdate" value="<?php echo $ubuntuupdate;?>">
                            <br><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Extra Accessories&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:250px; " name="extraaccessories" value="<?php echo $extraaccessories;?>">
                            <br><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Comments&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:750px;height:200px; " name="comment" value="<?php echo $comment;?>">
                            <br>

                            <br>

                            <fieldset><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              Received Asset&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <input type="text"  id="rcorners2"  style="width:250px; " name="receivedasset" value="<?php echo $receivedasset;?>">
                              <br><br>
                             Configuration :&nbsp&nbsp&nbsp&nbspMake&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="make1" value="<?php echo $make1;?>">&nbsp&nbspModel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="model1" value="<?php echo $model1;?>">
                              &nbsp&nbspSerial No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="serialno1" value="<?php echo $serialno1;?>">
                               &nbsp&nbspHDD&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="hdd1" value="<?php echo $hdd1;?>">
                              &nbsp&nbspRAM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; "name="ram1" value="<?php echo $ram1;?>">
                                &nbsp&nbspPROC&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="proc1" value="<?php echo $proc1;?>">
                                &nbsp&nbspOS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="os1" value="<?php echo $os1;?>">
                               <br>
                               <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               Adaptor&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="adaptor1" value="<?php echo $adaptor1;?>">&nbsp&nbspMonitor&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="monitor1" value="<?php echo $monitor1;?>">
                              &nbsp&nbspMonitor Sn-No&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="monitorsnno1" value="<?php echo $monitorsnno1;?>">
                               &nbsp&nbspInchs&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="inchs1" value="<?php echo $inchs1;?>">
                              &nbsp&nbspExt-Hdd&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="exthdd1" value="<?php echo $exthdd1;?>">
                                &nbsp&nbspUSB Drive&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <input type="text"  id="rcorners2"  style="width:100px; " name="usbdrive1" value="<?php echo $usbdrive1;?>">
                                
                               <br>
                               <br>


                          </fieldset><br>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              Received Date&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <input type="date"  id="rcorners2"  style="width:250px; " name="receiveddate1" value="<?php echo $receiveddate1;?>">



          
          
          


                  
          <div class="row">
            <div class="col-sm-12 text-center"><br><br>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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