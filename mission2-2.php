<?php 
$str = $_POST['comment']."を受け付けました";
$filename="m2-02.txt";
$fp = fopen($filename,"w");
if(empty($_POST['comment'])){  
            false;
    }elseif($_POST['comment']=="完成！"){
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo "おめでとう！";
    }else{
    fwrite($fp, $str.PHP_EOL);
    fclose($fp);
    echo $str;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
      <form method="post" action="m2-02.php">
        <input type="text" name="comment" value = "コメント">
        <input type="submit" value="送信" onclick="test()">
      </form>
</body>
</html>