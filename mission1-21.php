<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<form action="" method="post">
    <input type="number" name="num" >
    <input type="submit" >
</form>
<?php 
$num = $_POST["num"];
if($num%3==0 && $num%5==0){
    echo "Fizzbuzz";
}elseif($num%3==0){
    echo "Fizz";
}elseif($num%5==0){
    echo "Buzz";
}else{
    echo $num;
}
?>
</body>
</html>