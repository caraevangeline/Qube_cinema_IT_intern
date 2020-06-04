<html><head>Multi-button form</head>
<body>




<?php
function count_digit($number) {
  return strlen($number);
}

//function call
$num = 783653546436;
$number_of_digits = count_digit($num); //this is call :)
echo $number_of_digits;
echo str_pad($number_of_digits,20,".",STR_PAD_LEFT);
?>
</body>
</html>