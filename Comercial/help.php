<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<img alt='105x105' class='img-responsive' src='data:image/jpg;charset=utf8;base64,<?php   ?>'/>
    <img src='data:image/jpeg;base64,<?php echo base64_encode("")?>'> alt="">
    echo "<img alt='105x105' class='img-responsive' src='data:image/jpg;charset=utf8;base64,".$imagen."'/;<br />";
</body>
</html>
<?php

 "<img alt='105x105' class='img-responsive' src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($photo); ?>'/>";
?>