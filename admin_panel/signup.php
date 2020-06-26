<?php
require "../includes/db.php";
$data=$_POST;
if(isset($data['do_signup']))
{
    $errors=array();
    if(trim($data['login'])==''){
        $errors[]='Enter login';
    }
    if($data['password']==''){
        $errors[]='Enter password';
    }
    if($data['password2']!=$data['password']){
        $errors[]='This password is false';
    }
    if(R::count('users',"login=?",array($data['login']))>0){
        $errors[]='User with this login  has yet';
    }
    if(empty($errors)){
        $user=R::dispense('admin');
        $user->login=$data['login'];
        $user->password=password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
      header('Location:login.php');
    }
    else{
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }

}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация в администраторской панели</title>
</head>
<body>
<div class="title">
    <img src="../images/DKU_LOGO_DE%20(1).png" width="80" height="100">
    DKU Talks Панель администратора
</div>
<div class="sidebar">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
    <a  href="gallery_panel.php">Форма для заполнения галереи</a>
    <a href="speaker_panel.php">Форма для добавления спикера</a>
    <a href="article_panel.php">Форма для добавления статьи</a>
    <a href="event_panel.php">Форма для добавления события</a>
    <a href="speaker_article_panel.php">Форма для создания встречи</a>
    <?php else: ?>
    <a  class="active" href="signup.php">Регистрация</a>
    <a href="login.php">Вход</a>
    <?php endif ?>
</div>
<div class="gallery-upload">
    <h2>Форма регистрации</h2>
<form action="signup.php" method="post">
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
        <div class="gallery-group">
    <p><strong>Потверждение пароля</strong>
        <input type="password" name="password2" value="<?php echo @$data['password2'];?>">
    </p>
        </div>
        <button type="submit" name="do_signup" class="btn btn-primary">Зарегистрироваться</button>
</form>
</div>
</body>
</html>