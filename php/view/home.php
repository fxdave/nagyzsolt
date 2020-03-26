<? include("./view/common/menu.php") ?>
<h1>Hi <?= isset($_SESSION['user_email']) ? explode('@',$_SESSION['user_email'])[0] : "" ?>!</h1>