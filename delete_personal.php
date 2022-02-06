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
        <div class="write1">削除が完了しました！</div>
        <p class="write1"><a href="index.php">戻る</a></p>
    </div>
</body>

</html> 


