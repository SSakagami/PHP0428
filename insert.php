<?php
// 1. POSTデータ取得
  $mname = $_POST["master_name"];

  $name = $_POST["name"];
  $date = $_POST["date"];
  $title = $_POST["title"];
  $cont = $_POST["content"];
  $eval = $_POST["evaluation"];
  $dep = $_POST["client_dep"];
  $cname = $_POST["client_name"];

// 2. DB接続します
  require_once('funcs.php');
  $pdo=db_conn();

// ３．SQL文を用意(データ登録：INSERT)
  $stmt = $pdo->prepare(
    "INSERT INTO gs_CU_table(no,name,date,title,cont,eval,dep,cname)
    VALUES( NULL, :name, :date, :title, :cont, :eval,:dep,:cname)"
  );



// 4. バインド変数を用意
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':date', date("Y-m-d", strtotime($date)), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':cont', $cont, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':eval', $eval, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':dep', $dep, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':cname', $cname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
  $status = $stmt->execute();

// 6．データ登録処理後
  if($status==false){
    sql_error($stmt);
  }else{
    // header('Location: index.php');
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
        <div class="write1">書き込みが完了しました！</div>
        <p class="write1"><a href="index.php">戻る</a></p>
    </div>
</body>

</html> 
