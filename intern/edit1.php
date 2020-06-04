<!DOCTYPE HTML>  
<html>
<head>
<style>
#rcorners2 {
    border-radius: 4px;
    border: 1px solid #0080ff;
    /*padding: 20px;*/ 
    width: 160px;
    height: 30px;    
}
.error {color: #FF0000;}
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
    width:115px;
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
session_start();
/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");  */

    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'dc_activity1';
    //$sno = $_SESSION['varname'];
    $sno = $_GET['o'];
    $_SESSION['varname'] = $sno;
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    $description=$technician1="";
    //Get image data from database
    $result = $db->query("SELECT * FROM incident where sno = '$sno' ");
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo "<form method='GET' action='redirect1.php' autocomplete='off'>";
        $_SESSION['technician']=$row['technician'];
        $_SESSION['ticket']=$row['ticketno'];
           $_SESSION['stat']=$row['status'];
        $_SESSION['mod']=$row['mode'];
        $_SESSION['prior']=$row['priority'];
        $_SESSION['loc']=$row['location'];
        $_SESSION['nam']=$row['name'];
        $_SESSION['tim']=$row['time1'];
        $_SESSION['sit']=$row['site'];
        $_SESSION['typ']=$row['type'];
        $_SESSION['cate']=$row['category'];
        $_SESSION['subcate']=$row['subcategory'];
        $_SESSION['it']=$row['item'];
        $_SESSION['ema']=$row['email'];
        $_SESSION['subj']=$row['subject'];
        $_SESSION['des']=$row['description'];
        $_SESSION['res']=$row['resolution'];
        $_SESSION['rea']=$row['reason'];
        echo "<label>Description</label>&nbsp&nbsp&nbsp";
        //echo '<input type="text" name="description" style="height:50px ; width:900px" value="'.$row['description'].'"><br/>';

        echo "<br><br>";
        echo "<textarea rows='10' cols='120' name='description' readonly>";
        echo $row['description'];
        echo "</textarea>";
        echo "<br><br>";
        echo '<input type="text" name="description1" id="rcorners2" style="height:200px ; width:900px"><br/>';
        //Render image
       // header("Content-type: image/jpg"); 
       // echo $imgData['file']; 
        
        echo "<br>";
        echo "Assign to Technician:&nbsp&nbsp&nbsp&nbsp&nbsp"; 

include 'dbConfig.php';
$query = $db->query("SELECT username FROM users ORDER BY username ASC");
$rowCount = $query->num_rows;
        echo '<select  name="technician1" id="rcorners2" style="width:250px; " ><option value="" disabled selected>--Select Technician--</option>';
       if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option>'.$row['username'].'</option>';
        }
    }else{
        echo '<option value="">Technician not available</option>';
    }echo '</select>';
          echo '<br/>';
                            echo "<br>";
      





      









       echo "Priority:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                        "; 
include 'dbConfig.php';
$query1 = $db->query("SELECT name FROM prioritylist ORDER BY name ASC");
$rowCount1 = $query1->num_rows;
echo '<select  name="priority1" id="rcorners2" style="width:250px; " ><option value="" disabled selected>--Select Priority--</option>';
    if($rowCount1 > 0){
        while($row1 = $query1->fetch_assoc()){ 
            echo '<option>'.$row1['name'].'</option>';
        }
    }else{
        echo '<option value="">Priority not available</option>';
    }
   
echo '</select>';   
        echo '<br/>';
                            echo "<br>";
        

        








        echo "Status: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                           "; 
        
include 'dbConfig.php';
$query2 = $db->query("SELECT status FROM statuslist ORDER BY status ASC");
$rowCount2 = $query2->num_rows;

echo '<select  name="status1" id="rcorners2" style="width:250px;"><option value="" disabled selected>--Select Status--</option>';
    if($rowCount2 > 0){
        while($row2 = $query2->fetch_assoc()){ 
            echo '<option>'.$row2['status'].'</option>';
        }
    }else{
        echo '<option value="">Status not available</option>';
    }
echo '</select><br/>';

    }

?>
<br>
<br>
<div class="row">
                        <div class="col-sm-12 text-center">
                            <input type="submit" id="btn" class="but" value="Apply Changes">
                            <button type="reset" class="but">Reset</button>
                        </div>
                    </div><!--row19 ends-->
                </form>

</body>
</html>