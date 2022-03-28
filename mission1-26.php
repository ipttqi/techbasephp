<?php 
$str = "みかん";
$filename="m1-24.txt";
$fp = fopen($filename, "a");
fwrite($fp, $str.PHP_EOL);
fclose($fp);
echo "書き込み成功<br>";
if(file_exists($filename)){ //exists ファイルの存在を確認
    $files = file($filename,FILE_IGNORE_NEW_LINES);
    //行単位のテキストファイルを配列として読み込む
    foreach($files as $file){
        echo $file."<br>";
    }
}
?>