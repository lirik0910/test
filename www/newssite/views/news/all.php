<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
<?php foreach ($news as $new):?>
    <a href="/newssite/index.php?ctrl=News&act=One&id=<?php echo $new->id ; ?>"><?php echo $new->title; ?></a>
    <p><?php echo $new->date;  ?></p>
<?php endforeach; ?>
<br>
<br>
<a href="/newssite/index.php?ctrl=News&act=Add">Добавить новость</a>
</body>
</html>
