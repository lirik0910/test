<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php  ?>
<br>
<div class="addform">
    <form action="/newssite/index.php?ctrl=Admin&act=AddNews" method="post">
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