<?php
//1.DB接続
require_once('funcs.php');
$pdo=db_conn();

//2.対象のNoを取得
$no=$_GET['no']; 


//3．データ取得
$stmt = $pdo->prepare('SELECT * FROM gs_CU_table WHERE no=:no'); 
$stmt->bindValue(':no',$no,PDO::PARAM_INT);
$status = $stmt -> execute();

//4．データ表示
if($status == false){
    sql_error($stmt);
}else{
    $result = $stmt->fetch();
}

$boxname=['孫悟空','孫悟飯','孫悟天','ベジータ','トランクス',
			'ピッコロ','ヤムチャ','クリリン','天津飯','チャオズ',
			'亀仙人','牛魔王','ブゥ','ビーデル','パン'];
$boxdep=['電力DX推進室','MCRE','国内水','欧州電力サービス','オフグリッド'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <script src="./js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="./css/sample.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Shippori+Antique&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="headerfont">MC CheerUP Form</h1>
    
    <div class="center1">
      <div ><img class="imgzone" src="./img/<?=$result['name']?>.jpeg" alt=""></div>
    </div>

    <form method="post" action="update.php">
      <div class="center">
      <table class="center tableborder">
        <tr>
          <th class="tableborder1">氏名：</th>
          <td class="tableborder2">
            <p><select class="box" name="name">
                <option value="<?=$result['name']?>"><?=$boxname[$result['name']-1]?></option>
            </select></p>
          </td>
        </tr>
        <tr>
          <th class="tableborder1">依頼先：</th>
          <td class="tableborder2">
            <p><select class="parent box"  name="client_dep" id="">
                <option value="<?=$result['dep']?>" selected='selected'><?=$boxdep[$result['dep']-1]?></option>
                <option value="1">電力DX推進室</option>
                <option value="2">MCリテールエナジー</option>
                <option value="3">国内水事業チーム</option>
                <option value="4">欧州電力サービスチーム</option>
                <option value="5">オフグリッドチーム</option>
            </select></p>
          </td>
        </tr>        
        <tr>
          <th class="tableborder1">依頼先氏名：</th>
          <td class="tableborder2">
            <p><select class="children box" name="client_name">
                <option value="<?=$result['cname']?>" selected='selected'><?=$boxname[$result['cname']-1]?></option>
                <option value="1" data-val="1">孫悟空さん</option>
                <option value="2" data-val="1">孫悟飯さん</option>
                <option value="3" data-val="1">孫悟天さん</option>
                <option value="4" data-val="2">ベジータさん</option>
                <option value="5" data-val="2">トランクスさん</option>
                <option value="6" data-val="3">ピッコロさん</option>
                <option value="7" data-val="3">ヤムチャさん</option>
                <option value="8" data-val="3">クリリンさん</option>
                <option value="9" data-val="4">天津飯さん</option>
                <option value="10" data-val="4">チャオズさん</option>
                <option value="11" data-val="4">亀仙人さん</option>
                <option value="12" data-val="5">牛魔王さん</option>
                <option value="13" data-val="5">ブゥさん</option>
                <option value="14" data-val="5">ビーデルさん</option>
                <option value="15" data-val="5">パンさん</option>
            </select></p>
          </td>
        </tr>        
        <tr>
          <th class="tableborder1"> お願いした日付：</th>
          <td class="tableborder2"><p><input class="box" type="date" name="date" size="20" value="<?=$result['date']?>"></p></td>
        </tr>        
        <tr>
          <th class="tableborder1">お願いした件名：</th>
          <td class="tableborder2"><p><input class="box" type="text" name="title" size="20" value="<?=$result['title']?>"></p></td>
        </tr> 
        <tr>
          <th class="tableborder1">お願いした内容：</th>
          <td class="tableborder2"><p><textarea  name="content" id="" cols="40" rows="3" value="<?=$result['cont']?>"><?=$result['cont']?></textarea></p></td>
        </tr>         
        <tr>
          <th class="tableborder1">評価：</th>
          <td class="tableborder2"><p>
          <select class="box"  name="evaluation" id="" >
                <option value="<?=$result['eval']?>" selected><?=$result['eval']?></option>
                <option value="1">1.話を聞けた/聞かせてくれた</option>
                <option value="2">2.参考になった</option>
                <option value="3">3.刺激となるアイデアがあった</option>
                <option value="4">4.今後も意見交換を継続したい</option>
                <option value="5">5.ビジネスとして積極的に推進したい</option>
            </select>
          </p></td>
        </tr>        
      </table>
      <p> <input type="hidden" name="no" value="<?=$result['no']?>"> </p>
      <p class="center1"><input class="buttonbox" type="submit" value="更新"></p>
      </div>
    </form>

    <ul>
    <li><a href="index.php">ホーム</a></li>
  </ul>
</body>


<script>
    var $children = $('.children');
    var original = $children.html();

    $('.parent').change(function() {
    var val1 = $(this).val();
    $children.html(original).find('option').each(function() {
    var val2 = $(this).data('val');
    if (val1 != val2) {
      $(this).not(':first-child').remove();
    }
  });

  if ($(this).val() == "") {
    $children.attr('disabled', 'disabled');
  } else {
    $children.removeAttr('disabled');
  }

});
</script>

</html>
