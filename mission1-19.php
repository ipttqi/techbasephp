<?php
for ($i = 0 ; $i <= 99 ; $i = $i + 1 ) {
if($i%3==0 && $i%5==0){
    echo "Fizzbuzz";
}elseif($i%3==0){
    echo "Fizz";
}elseif($i%5==0){
    echo "Buzz";
}else{
    echo $i;
}
echo "<br>";
}
?>