<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission3-3</title>
</head>
<body>
    <?php
        //変数の定義
        if(!empty($_POST["name"])&&!empty($_POST["comment"])){
            $name=$_POST["name"];
            $comment=$_POST["comment"];
        }


        
        $time=date("Y/m/d H:i:s");
        if(!empty($_POST["delete_number"])){
            $delete_number=$_POST["delete_number"];
        }

        //txtへ保存
        $file_name="m3-03.txt";
    
        //送信フォームに記載がある場合
        if(!empty($comment)&&!empty($name)){ //name,commentなしによるtxtの表記崩れ対策
            
                //txt新規作成or展開
                $path=fopen($file_name,"a");
                //txt内の各行の数をカウント
                $columns=file($file_name,FILE_IGNORE_NEW_LINES);
                $post_num=count($columns);
                fwrite($path,($post_num+1)."<>".$name."<>".$comment."<>".$time."<>".PHP_EOL);
                fclose($path);
        }else{
            echo "";
        }
    
        //削除フォームに記載がある場合
        if(!empty($delete_number)){
            //txt各行の要素を取得($columns)
            $columns=file($file_name,FILE_IGNORE_NEW_LINES);
            $post_num=count($columns);

            //一旦txtを空にする
            $path=fopen($file_name,"w");
            
            fclose($path);

            $path=fopen($file_name,"a");
            $num=1;
            for($i=0;$i<$post_num;$i++){
                if($i+1==$delete_number){
                    echo "投稿が削除されました";
                }else{
                    $words=explode("<>",$columns[$i]);
                    fwrite($path,$num."<>".$words[1]."<>".$words[2]."<>".$words[3]."<>".PHP_EOL);
                    $num++;
                }
            }
            
            fclose($path);
        }
    
    ?>


    <form method="POST" action="">      
        名前:<input type="text" name="name" value="名前"><br>
        コメント:<input type="text" name="comment" value="コメント">
        <input type="submit" name="submit" value="送信">
    </form>
<hr>
    <form method="POST" action="">   
        
        削除する投稿番号:<input type="number" name="delete_number" value="1">
        <input type="submit" name="delete" value="削除">
    </form>
<hr>


    <?php
        //出力部分
        //txtが存在しないのにfileで読み取りするとエラーが起きるため，条件分岐
        if(file_exists($file_name)){
            $lines=file($file_name,FILE_IGNORE_NEW_LINES);
            //各行に対してループ
            foreach($lines as $line){
                $words=explode("<>",$line);
                //分割した各言葉に対してループ
                echo $words[0].$words[1].$words[2].$words[3]."<br>";
            }
        }
    ?>

</body>
</html>