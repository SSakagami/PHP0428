<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();

?>





<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MC Cheer UP form</title>
    <script src="./js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="./css/sample.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="headerfont">MC CheerUP</h1>
    <form class="center" action="?" method="post" name="enter">
        <select class="box" name="master_name" id="" required>
            <option value="<?=$_SESSION['id']?>" selected='selected'><?=$_SESSION['name']?></option>
        </select>
        <div class="parts">
            <p class="parts"><input class="buttonbox" type="submit" formaction="read_personal.php" value="みんなからのCheerUP" id="confirm"></p>
            <p class="parts"><input class="buttonbox" type="submit" formaction="form.php" value="みんなをCheerUP" id="register"></p>
            <p class="parts"><input class="buttonbox" type="submit" formaction="select_personal.php" value="入力確認" id="confirm_input"></p>
        </div>
    </form>
    <div class="center">
        <a href="logout.php">ログアウト</a>
    </div>
</body>
</html>

<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
?>