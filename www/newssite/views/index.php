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
    <?php echo $new['title']; ?>
<?php endforeach; ?>
</body>
</html>
