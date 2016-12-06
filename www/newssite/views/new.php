<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php if(isset($new)){
    foreach ($new as $onenew):?>
    <h1> <?php echo $onenew['title']; ?> </h1>
    <p> <?php echo $onenew['date']; ?> </p>
    <p> <?php echo $onenew['descript']; ?> </p>
    <?php endforeach; ?>
<?php } else{
    echo 'Новость не найдена!';
} ?>
</body>
</html>