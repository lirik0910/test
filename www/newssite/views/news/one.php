<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php if(isset($one)){
    //foreach ($one as $onenew):?>
    <h1> <?php echo $one->title; ?> </h1>
    <p> <?php echo $one->date; ?> </p>
    <p> <?php echo $one->descript; ?> </p>
    <?php //endforeach; ?>
<?php } else{
    echo 'Новость не найдена!';
} ?>
</body>
</html>