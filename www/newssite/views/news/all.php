<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
<?php foreach ($items as $item):?>
    <a href="/newssite/index.php?ctrl=News&act=One&id=<?php echo $item->id ; ?>"><?php echo $item->title; ?></a>
    <p><?php echo $item->date;  ?></p>
<?php endforeach; ?>
<br>
<br>
<a href="/newssite/index.php?ctrl=Admin&act=AddNews">Добавить новость</a>
<a href="/newssite/index.php?ctrl=News&act=Find">Найти новость</a>
<br>
<br>
<a href="/newssite/index.php?ctrl=Admin&act=CheckLogFile">Посмотреть логи ошибок</a>
<a href="/newssite/index.php?ctrl=Admin&act=SendMail">Отправить письмо</a>
</body>
</html>
