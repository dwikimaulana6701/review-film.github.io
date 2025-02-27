<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background: radial-gradient(circle at top left, white, grey);
    }
</style>
<body>
    <?php
        echo "Tugas 1 <br> <br>";
        $text = "Andi Belajar Pemrograman Web";
        echo $text . "<br>". "<br>";
        $pisah = explode(" ",$text);
        var_dump($pisah);
    ?>
</body>
</html>