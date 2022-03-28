<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
    <form method="post" action="">
        名前：<input type="text" name="name" value="名前">
        <input type="text" name="com" value="コメント">
        <input type="submit" value="送信">
    </form>
        <?PHP
            $name=$_POST["name"];
            $com= $_POST["com"];
            $time= date("Y年m月d日　H時間i分s秒");
            
            $fname="m3-01.txt";
            $fp=fopen($fname,"a");
            
            if(empty($name or $com)){
                echo "";
            }
            else{
                $number = count(file($fname))+1;
                fwrite($fp,$number."<>".$name."<>".$com."<>".$time.PHP_EOL);
                fclose($fp);
            }
            
            
        ?>
</body>
</html>