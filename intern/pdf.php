<?php  
session_start();
/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php"); */ 
 $sno=$_GET['generate_pdf'];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dc_activity1");  
      $sql = "SELECT ticketno,status,mode,priority,location,name,site,technician,type,category,subcategory,item,email,subject,description,resolution,reason FROM change1 where sno='$sno'";  
      $result = mysqli_query($conn, $sql);  
      $row = mysqli_fetch_array($result) ;
      $sub=$row['subcategory'];
        if($row['category']=="Server")
        {
            $ex=$row['subcategory'].'.'.'realimage.co.in';
        $ip = gethostbyname($ex);
        $sub=$row['subcategory'].'-'.$ip;
        //echo $ip;
        //$row['subcategory']=$row['subctaegory'].'-'.$ip;

}
    
     
 if(isset($_GET["generate_pdf"]))  
 {  
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
       <td>'.$row["ticketno"].'</td></tr>
       <tr><td><h4>Status</h4></td>
       <td>'.$row["status"].'</td></tr>
       <tr><td><h4>Mode</h4></td>
       <td>'.$row["mode"].'</td></tr>
       <tr><td><h4>Priority</h4></td>
       <td>'.$row["priority"].'</td></tr>
       <tr><td><h4>Location</h4></td>
       <td>'.$row["location"].'</td></tr>
       <tr><td><h4>Name</h4></td>
       <td>'.$row["name"].'</td></tr>
       <tr><td><h4>Site</h4></td>
       <td>'.$row["site"].'</td></tr>
       <tr><td><h4>Technician</h4></td>
       <td>'.$row["technician"].'</td></tr>
       <tr><td><h4>Type</h4></td>
       <td>'.$row["type"].'</td></tr>
       <tr><td><h4>Category</h4></td>
       <td>'.$row["category"].'</td></tr>
       <tr><td><h4>Subcategory</h4></td>
       <td>'.$sub.'</td></tr>
       <tr><td><h4>Item</h4></td>
       <td>'.$row["item"].'</td></tr>
       <tr><td><h4>E-Mail</h4></td>
       <td>'.$row["email"].'</td></tr>
       <tr><td><h4>Subject</h4></td>
       <td>'.$row["subject"].'</td></tr>
       <tr><td><h4>Description</h4></td>
       <td>'.$row["description"].'</td></tr>
       <tr><td><h4>Reason</h4></td>
       <td>'.$row["reason"].'</td></tr>
       <tr><td><h4>Resolution</h4></td>
       <td>'.$row["resolution"].'</td></tr>
      
      ';  
      //$content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 