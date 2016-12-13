<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
<?php foreach ($data as $item):?>
    <a href="/newssite/index.php?ctrl=News&act=One&id=<?php echo $item->id ; ?>"><?php echo $item->title; ?></a>
    <p><?php echo $item->date;  ?></p>
<?php endforeach; ?>
<br>
<br>
<a href="/newssite/index.php?ctrl=Admin&act=AddNews">Добавить новость</a>
</body>
</html>
