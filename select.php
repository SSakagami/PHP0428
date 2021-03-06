<?php
// 1. phpAdminサーバーにアクセス
require_once('funcs.php');
$pdo=db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_CU_table");
$status = $stmt->execute();

//３．データ表示
//3.1 配列用意 
$view = "";
$boxname=['孫悟空','孫悟飯','孫悟天','ベジータ','トランクス',
			'ピッコロ','ヤムチャ','クリリン','天津飯','チャオズ',
			'亀仙人','牛魔王','ブゥ','ビーデル','パン'];
$boxdep=['電力DX推進室','MCRE','国内水','欧州電力サービス','オフグリッド'];

// 3.2 結果表示
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .="<td class='tableborder3'><a href='detail.php?no=".$result['no']."'>".$boxname[$result['name']-1] ."</a></td>";
        $view .="<td class='tableborder3'>".$boxname[$result['cname']-1]."<br>【".$boxdep[$result['dep']-1]."】</td>";
        $view .="<td class='tableborder3'>".$result['date']."</td>";
        $view .="<td class='tableborder3'>".$result['title']."</td>";
        $view .="<td class='tableborder3'>".$result['cont']."</td>";
        $view .="<td class='tableborder3'><div class='evalstar'><img class='evalstar' src='./img/eval".$result['eval'].".jpeg' alt=''></div></td>";
        $view .="<td class='tableborder3'><a href='delete.php?no=".$result['no']."'>削除</a></td></tr>";
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>一覧表示</title>
    <link rel="stylesheet" href="./css/sample.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body id="main">
    <h1 class="headerfont">MC CheerUP Result</h1>
    <div class="center_read">
	    <div class="read1">CheerUP状況</div>
        <table class="tableborder">
            <tr class="tableborder3">
                <th class="tableborder3">評価者</th>
                <th class="tableborder3">評価された人 <br>【部署名】</th>
                <th class="tableborder3">日付</th>
                <th class="tableborder3">件名</th>
                <th class="tableborder3">内容</th>
                <th  class="tableborder3">CheerUPポイント</th>
            <th class="tableborder3">削除</th>

            </tr>
            <?= $view ?>
        </table>
	    <div><a href="logout.php">ログアウト</a></div>
    </div>


</body>

</html>
