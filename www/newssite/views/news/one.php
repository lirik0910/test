<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<?php //if(isset($items)){
    //var_dump($items); die;
    //foreach ($this->data['data'] as $item):?>
    <h1> <?php echo $items->title ; ?> </h1>
    <p> <?php echo $items->date; ?> </p>
    <p> <?php echo $items->descript; ?> </p>
    <?php //endforeach; ?>
<?php// } else{
    //echo 'Новость не найдена!';
//} ?>
</body>
</html>