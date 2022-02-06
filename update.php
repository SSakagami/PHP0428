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

//2. DB接続
require_once('funcs.php');
$pdo=db_conn();

//３．データ更新SQL作成
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
    redirect('select.php');
}


