<?php
//1. POSTデータ取得
$no= $_POST["no"];
$name = $_POST["name"];
$date = $_POST["date"];
$title = $_POST["title"];
$cont = $_POST["content"];
$eval = $_POST["evaluation"];
$dep = $_POST["client_dep"];
$cname = $_POST["client_name"];
$mname= $_POST["mname"];

//2. DB接続
require_once('funcs.php');
$pdo=db_conn();

//３．データ更新
$stmt = $pdo->prepare(
    "UPDATE gs_CU_table 
    SET name=:name, date=:date,title=:title, cont=:cont, eval=:eval, dep=:dep, cname=:cname 
    WHERE no=:no"
  );

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':date', $date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cont', $cont, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':eval', $eval, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':dep', $dep, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cname', $cname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':no', $no, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  
// 5. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status == false){
    sql_error($stmt);
}else{
    // redirect('select_personal.php');
}


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete</title>
    <script type="text/javascript"></script>
    <link rel="stylesheet" href="./css/sample.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Shippori+Antique&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="headerfont">MC CheerUP Form</h1>
    <div class="center_write">
        <div class="write1">更新が完了しました！</div>
        <p class="write1"><a href="index.php">戻る</a></p>
    </div>
</body>

</html> 