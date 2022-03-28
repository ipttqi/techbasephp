<!DOCTYPE html>
<html>
<head lang="ja">
<meta charset="utf-8" />
</head>
<body>
<form action="" method="post">
    <input type="number" name="num" placeholder="数字を入力してください" >
    <input type="submit" value="送信">
</form>
<?php 
$num = $_POST["num"];
$filename="m1-27.txt";
$fp = fopen($filename, "a");
if(!empty($num)){
fwrite($fp, $num.PHP_EOL);
fclose($fp);
echo "書き込み成功<br>";
}

if(file_exists($filename)){ //exists ファイルの存在を確認
    $files = file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    //行単位のテキストファイルを配列として読み込む
    foreach($files as $file){
        $line = (int)$file;
    if($line%3==0 && $line%5==0){
        echo "Fizzbuzz";
    }elseif($line%3==0){
        echo "Fizz";
    }elseif($line%5==0){
        echo "Buzz";
    }else{
        echo $line;
    }
    echo "<br>";
    }
}
?>
</body>
</html>