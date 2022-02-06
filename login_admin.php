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

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form class="center" name="form1" action="login_admin_act.php" method="post">
    <h2 >ログインフォーム</h2>    
        <div>管理者用ID:<input type="text" name="lid" /></div>
        <div>PW:<input type="password" name="lpw" /></div> 
    <input type="submit" value="LOGIN" />
</form>

    <div class=center>
        <a href="select.php">管理画面</a>
    </div>
</body>

</html>