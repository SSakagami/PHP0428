<?php
//1.対象のNoを取得
$no=$_GET['no']; 

//2.DB接続
require_once('funcs.php');
$pdo=db_conn();

//3.削除SQLを作成
$stmt = $pdo->prepare('DELETE FROM gs_CU_table WHERE no=:no'); 
$stmt->bindValue(':no',$no,PDO::PARAM_INT);
$status = $stmt -> execute();

//４．データ削除処理後
if($status == false){
    sql_error($stmt);
}else{
    redirect('select.php');
}





