<?php
require "../includes/db.php";
$data=$_POST;
if(isset($data['do_login'])) {
    $errors = array();
    $user = R::findOne('admin', 'login=?', array($data['login']));
    if ($user) {
        if (password_verify($data['password'], $user->password)
        ) {
            $_SESSION['logged_user']=$user;
            header('Location:speaker_panel.php');
        } else {
            $errors[] = 'Пароль неверный';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден';
    }
    if (!empty($errors)) {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в администраторскую панель</title>
</head>
<body>
<div class="title">
    <img src="../images/DKU_LOGO_DE%20(1).png" width="80" height="100">
    DKU Talks Панель администратора
</div>
<div class="sidebar">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): header("Location:group_panel.php")?>
        <a href="speaker_panel.php">Форма для добавления спикера</a>
        <a href="article_panel.php">Форма для добавления статьи</a>
        <a href="event_panel.php">Форма для добавления события</a>
        <a href="speaker_article_panel.php">Форма для создания встречи</a>
    <?php else:?>
        <a  href="signup.php">Регистрация</a>
        <a href="login.php"  class="active">Вход</a>
    <?php endif ?>
</div>
<div class="gallery-upload" style="margin-top: -50%">
    <h2>Вход</h2>
<form  action="login.php" method="POST">
    <div class="gallery-group">
        <p><strong>Логин</strong>
    <input type="text" name="login" value="<?php echo @$data['login'];?>">
        </p>
    </div>
    <div class="gallery-group">
        <p><strong>Пароль</strong>
    <input type="password" name="password" value="<?php echo @$data['password'];?>">
        </p>
    </div>
    <button type="submit" name="do_login" class="btn btn-primary">Вход</button>
</form>
</div>
</body>
</html>