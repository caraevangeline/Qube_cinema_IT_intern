<?php
date_default_timezone_set('Asia/Kolkata'); 

$dt2=date("Y-m-d H:i:s");
echo $dt2;
$string='jesus.loves.you';
list($part1, $part2) = explode('.', $string);
$parts= explode('.', $string);
echo $part1;
echo $parts[2];
echo end($parts);
$i=0;
$i=$i+1;
echo $i;

?>