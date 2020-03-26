<? include("./view/common/menu.php") ?>

<? if(isset($success) && $success == true) { ?>
    Well done!
<? } ?>


<? if(isset($success) && $success == false) { ?>
    Something went wrong. :(
<? } ?>

<form action="/index.php" method="post">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="pass">
    <input type="submit" name="registration" value="registration">
</form>