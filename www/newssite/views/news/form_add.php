<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php if (!empty($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}  ?>
<br>
<div class="addform">
    <form action="/newssite/index.php?ctrl=News&act=Add" method="post">
        <label for="title">Название</label>
        <input type="text" name="title">
        <label for="descript">Новость</label>
        <input type="text" name="descript">
        <input type="date" name="date">
        <input type="submit" value="Добавить новость">
        <br>
        <a href="/newssite/index.php">Назад</a>
    </form>
</div>
</body>
</html>