<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<a href="/newssite/index.php">На главную</a>
<?php //if(isset($items)){
    //var_dump($items); die;
    //foreach ($this->data['data'] as $item):?>
    <h1> <?php echo $items->title ; ?> </h1>
    <p> <?php echo $items->date; ?> </p>
    <p> <?php echo $items->descript; ?> </p>
    <?php //endforeach; ?>
<a href="/newssite/index.php?ctrl=Admin&act=Update&id=<?php echo $items->id; ?>">Обновить новость</a>
<a href="/newssite/index.php?ctrl=Admin&act=Delete&id=<?php echo $items->id; ?>">Удалить новость</a>
</body>
</html>