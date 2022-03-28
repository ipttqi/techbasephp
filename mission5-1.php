<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="utf-8">
<title>mission5-1</title>
<h1>掲示板</h1>
</html>
<body>
 
 <?php
 //データベース接続
    $dsn = 'mysql:dbname=***;host=localhost';
    $user = '***';
    $password = '***';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
     
 $dt = date("Y-m-d H:i:s");
 $editNumber = '';
 $editName = '';
 $editComment = '';
 $editPassword = '';

 //テーブルの作成
 $sql="CREATE TABLE IF NOT EXISTS forum"
 ." ("
 ."id INT AUTO_INCREMENT PRIMARY KEY," 
 ."name char(32),"                      
 ."comment TEXT,"                      
 ."date datetime,"                      
 ."pass char(32)"                      
 .");";
$stmt = $pdo->query($sql);

//投稿フォーム
 if(!empty($_POST["name"]) && !empty($_POST["comment"]) and !empty($_POST["pass"]) and empty($_POST["num"])){
         {
             $sql = $pdo -> prepare("INSERT INTO forum (name, comment, date, pass) VALUES (:name, :comment, :date, :pass)");
             $sql -> bindParam(':name', $name, PDO::PARAM_STR);
             $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
             $sql -> bindParam(':date', $date, PDO::PARAM_STR);
             $sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
             $name = $_POST["name"];
             $comment = $_POST["comment"];
             $date = $dt;
             $pass = $_POST["pass"];
             $sql -> execute();
         }
 }

 //編集実行機能
 if(!empty($_POST["num"]))
 {
             $id = $_POST["num"];          
             $name = $_POST["name"];       
             $comment = $_POST["comment"]; 
             $pass = $_POST["pass"];       
             $sql = 'UPDATE forum SET name=:name,comment=:comment,pass=:pass WHERE id=:id';
             $stmt = $pdo->prepare($sql);
             $stmt->bindParam(':name', $name, PDO::PARAM_STR);
             $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
             $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
             $stmt->execute();

 }


//編集フォーム
 if(isset($_POST["edit"]))
 {
     if(!empty($_POST["edit_num"]))
     {
         if(!empty($_POST["edit_pass"]))
         {
             $id = $_POST["edit_num"];   
             $pass = $_POST["edit_pass"];
             
             $sql = 'SELECT * FROM forum WHERE id=:id AND pass=:pass';
             
             $stmt = $pdo->prepare($sql);
             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
             $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
             $stmt->execute();
             $results = $stmt->fetchAll();
             
             foreach($results as $result)
             {
                 $editNumber = $result['id']; 
                 $editName = $result['name']; 
                 $editComment = $result['comment'];
                 $editPassword = $result['pass'];
             }
         }
         
         else
         {
             echo "パスワードを入力してください.<br>";
         }
     }
     
     else
     {
         echo "編集する番号を入力してください.<br>";
     }
 }




 //削除フォーム
 if(isset($_POST["delete"]))
 {
     if(empty($_POST["del_num"]))
     {
         echo "番号を指定してください.<br>";
     }
     else if(empty($_POST["del_pass"]))
     {
         echo "パスワードを入力してください.<br>";
     }
     else if($POST['del_pass']==$result['del_pass'])
     {
         $del_id = $_POST["del_num"];
         $del_pass = $_POST["del_pass"];
         $sql = 'delete from forum WHERE id=:id AND pass=:pass';
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':id', $del_id, PDO::PARAM_INT);
         $stmt->bindParam(':pass', $del_pass, PDO::PARAM_STR);
         $stmt->execute();
     }
 }

?>

 <!-- 投稿 -->
 <form action="" method="post">
     [投稿]<br>
     <input type="hidden" name="num" value="<?php echo $editNumber; ?>">
     <input type="text" name="name" placeholder="名前" value="<?php echo $editName; ?>"><br>
     <input type="text" name="comment" placeholder="コメント" value="<?php echo $editComment; ?>"><br>
     <input type="password" name="pass" placeholder="パスワード" value="<?php echo $editPassword; ?>">
     <input type="submit" name="submit"><br>
 </form>


 <!-- 消去フォーム -->
 <form action="" method="POST">
     [削除]<br>
     <input type="number" name="del_num" placeholder="削除番号"><br>
     <input type="password" name="del_pass" placeholder="パスワード">
     <input type="submit" name="delete" value="削除">
 </form>

 <!-- 編集フォーム -->
 <form action="" method="POST">
     [編集]<br>
     <input type="number" name="edit_num" placeholder="編集番号"><br>
     <input type="password" name="edit_pass" placeholder="パスワード">
     <input type="submit" name="edit" value="編集">
 </form>
 <hr>

 <?php
   //入力したデータレコードを表示
 $show_sql = "SELECT * FROM forum";
 $show_stmt = $pdo->query($show_sql);
 $results = $show_stmt->fetchAll();
 foreach($results as $result){
     echo $result['id']. " 　投稿者：" . $result['name']. "  　 ".$result['date'].'<br>';
     echo "　　コメント：" .$result['comment'].'<br>';
     echo "<hr>";
 }
 ?>

 </body>
 </html>
