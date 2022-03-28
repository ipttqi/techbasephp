<?php 
$str = "0";
$filename="m1-24.txt";
$fp = fopen($filename, "w");
fwrite($fp, $str.PHP_EOL);
fclose($fp);
echo "書き込み成功";
?>
FILE_SKIP_EMPTY_LINES