<form action="/newssite/index.php?ctrl=News&act=Find" method="post">
        <label for="column">Название поля</label>
        <select name="column">
            <?php foreach($this->cols as $col):
    if($col !== 'date'){ ?>
        <option><?php echo $col; ?></option>
    <?php } else {
        continue;
    }?>
<?php endforeach; ?>
</select>
<label for="value">Значение</label>
<input type="text" name="value">
<input type="date" name="date">
<input type="submit" value="Найти">
<br>
<a href="/newssite/index.php">Назад</a>
</form>