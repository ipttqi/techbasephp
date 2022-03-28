<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
      <form method="post" action="m2-03.php">
        <input type="text" name="comment" value = "コメント">
        <input type="submit" value="送信" onclick="test()">
      </form>
      <?php 
$str = $_POST['comment']."を受け付けました";
$filename="m2-03.txt";
$fp = fopen($filename,"a");
if(empty($_POST['comment'])){  
            false;
    }elseif($_POST['comment']=="完成！"){
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo "おめでとう！\n";
    }else{
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo $str."\n";
    }
?>
</body>
</html>