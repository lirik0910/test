<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php  ?>
<br>
<div class="Find">
    <?php //foreach ($items as $item):?>
        <h1> <?php echo $items->title ; ?> </h1>
        <p> <?php echo $items->date; ?> </p>
        <p> <?php echo $items->descript; ?> </p>
    <?php //endforeach; ?>
</div>
</body>
</html>