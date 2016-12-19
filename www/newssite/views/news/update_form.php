<?php ?>
<form action="/newssite/index.php?ctrl=Admin&act=Update&id=<?php echo $_GET['id']; ?>" method="post">
<label for="title">Название</label>
<input type="text" name="title">
<label for="descript">Содержание</label>
<input type="text" name="descript">
<input type="submit" value="Изменить">
<br>
<a href="/newssite/index.php?ctrl=News&act=One&id=<?php echo $_GET['id']; ?>">Назад</a>
</form>
