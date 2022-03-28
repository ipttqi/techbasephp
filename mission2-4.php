<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
      <form method="post" action="m2-04.php">
        <input type="text" name="comment" value = "コメント">
        <input type="submit" value="送信" onclick="test()">
      </form>
<?php 
$str = $_POST['comment'];
$filename="m2-04.txt";
$fp = fopen($filename,"a");
if(empty($str)){  
        echo "";
    }elseif($str=="完成！"){
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo "おめでとう！\n";
    }else{
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo $str."を受け付けました\n";
    }
    
if(file_exists($filename)){ //exists ファイルの存在を確認
    $files = file($filename,FILE_IGNORE_NEW_LINES);
    //行単位のテキストファイルを配列として読み込む
    foreach($files as $file){
        echo $file."<br>";
    }
}
?>
</body>
</html>