<?php 
//index.php
include "header.php";
/*if(!isset($_SESSION['login_user'])) 
      header("Location: main.php");  */
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "dc_activity1");
$query = "SELECT technician, count(*) as 'Count' from incident group by technician order by Count desc";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ technician:'".$row["technician"]."', Count:".$row["Count"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

$query = "SELECT technician, count(*) as 'Count' from change1 group by technician order by Count desc";
$result = mysqli_query($connect, $query);
$chart_data1 = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data1 .= "{ technician:'".$row["technician"]."', Count:".$row["Count"]."}, ";
}
$chart_data1 = substr($chart_data1, 0, -2);




?>


<!DOCTYPE html>
<html>
 <head>
  <title>ITSM Portal </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="float:left; width:50%;height:60%;">
   <h5><b>Requests by Technician- Incident</b></h5>
    
   <br /><br />
   <div id="chart" ></div>
  </div>
  <div class="container" style="float:left; width:50%; height:60%;">
   <h5><b>Requests by Technician- Change</b></h5>
    
   <br /><br />
   <div id="chart1" ></div>
  </div><br><br>
<div class="container" style="float:left; width:50%;height:50%;">
   <h5><b>Requests by Priority- Incident</b></h5>
    
   <br /><br />
   <div id="piechart" ></div>
  </div>
<div class="container" style="float:left; width:50%;height:50%;">
   <h5><b>Requests by Priority- Change</b></h5>
    
   <br /><br />
   <div id="piechart1" ></div>
  </div>
 </body>
</html>

<script>
  var $arrColors = ['#4346A0', '#26B99A',  'red', '#356C12','#4D4C59','#DE7B11'];
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
// barGap:2,
//barsize:12;
  barSizeRatio:0.3,
 xkey:'technician',
 ykeys:['Count'],
 labels:['Count'],
 barColors: function (row, series, type) {
        return $arrColors[row.x];
    }, 
    //xLabelAngle: 45,
    xLabelMargin: 10,
 hideHover:'auto',
 stacked:true
 }).on('click', function(i, row) {       
         //window.alert("X-Axis: "+ row.technician);
           //alert("Y-Axix: "+row.Count); 
           //$_SESSION['tech']=row.technician;
/*$.redirect(http://qubeitsm.realimage.co.in/admin.php,
{
  tech:"hello";
});
     */      //alert(direct1.php);
           window.location.href='direct1.php?technician='+row.technician;
           //header("admin.php");
                 //echo "<script>setTimeout(\"location.href = 'direct1.php';\",1500);ript>";
    
    });

Morris.Bar({
 element : 'chart1',
 data:[<?php echo $chart_data1; ?>],
// barGap:2,
//barsize:12;
  barSizeRatio:0.2,
 xkey:'technician',
 ykeys:['Count'],
 labels:['Count'],
 barColors: function (row, series, type) {
        return $arrColors[row.x];
    }, 
 hideHover:'auto',
 stacked:true
 }).on('click', function(i, row) {       
          window.location.href='direct.php?technician='+row.technician;
               
    });
</script>







<?php
$dbhandle = new mysqli('localhost','root','','dc_activity1');
echo $dbhandle->connect_error; 
$query=" SELECT priority,count(*) as  'Count' from incident group by priority";
$res = $dbhandle->query($query);
?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['priority', 'Count'],
          
          <?php
          while ($row=$res->fetch_assoc())
          {
            echo "['".$row['priority']."',".$row['Count']."],";
          }
          ?>
        ]);

        var options = {
          
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if(selectedItem) {
            var topping = data.getValue(selectedItem.row,0);
            //alert('The user selected '+ topping);
            window.location.href='piedirect1.php?priority='+topping;
          }
        }
        google.visualization.events.addListener(chart,'select',selectHandler);
        chart.draw(data, options);

        
      }

    </script>




<?php
$dbhandle = new mysqli('localhost','root','','dc_activity1');
echo $dbhandle->connect_error; 
$query=" SELECT priority,count(*) as  'Count' from change1 group by priority";
$res = $dbhandle->query($query);
?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['priority', 'Count'],
          
          <?php
          while ($row=$res->fetch_assoc())
          {
            echo "['".$row['priority']."',".$row['Count']."],";
          }
          ?>
        ]);

        var options = {
          
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
         function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if(selectedItem) {
            var topping = data.getValue(selectedItem.row,0);
            //alert('The user selected '+ topping);
            window.location.href='piedirect.php?priority='+topping;
          }
        }
        google.visualization.events.addListener(chart,'select',selectHandler);
        chart.draw(data, options);
      }
    </script>






