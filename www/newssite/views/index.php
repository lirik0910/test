<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php foreach ($news as $new):?>
    <a href="/newssite/new.php?id=<?php echo $new['id']; ?>"><?php echo $new['title']; ?></a>
    <p><?php echo $new['date'];  ?></p>
<?php endforeach; ?>
<br>
<br>
<a href="/newssite/addnew.php">Добавить новость</a>
</body>
</html>
