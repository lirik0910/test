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
    <h1> <?php echo $data->title ; ?> </h1>
    <p> <?php echo $data->date; ?> </p>
    <p> <?php echo $data->descript; ?> </p>
    <?php //endforeach; ?>
<?php// } else{
    //echo 'Новость не найдена!';
//} ?>
</body>
</html>