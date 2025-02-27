<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hasil tugas 3</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Roboto Mono", monospace;
        }
        body{
            position: fixed;
            width: 100%;
            text-align: left;
            font-size: 18px;
            height: 100vh;
            background-color: cadetblue;
            margin-top: 60px;
            margin-left: 50px;
            
        }
        h1{
            margin-left: 100px;
        }
        #formHasil{
            border: 10px double blue;
            border-radius: 10px;
            height: 33%;
            width: 50%;
            padding: 10px;
        }
        a{
            background-color: blanchedalmond;
            color: red;
            opacity: 0.6;
            text-align: center;
            border-radius: 10px;
            padding: 10px 10px;
            text-decoration: none;
            margin-top: 10px;
            margin-left: 150px;
        }
        a:hover{
            background-color: black;
        }
    </style>
</head>
<body>
    <h1>Tampilan Form</h1><br>
    <form id="formHasil" >
        Nama : <?= $_SESSION["nama"]?><br>
        NIM : <?= $_SESSION["NIM"]?><br>
        email : <?= $_SESSION["email"]?><br>
        Tanggal Lahir : <?= $_SESSION["dateBirth"]?><br>
        Jenis Kelamin : <?= $_SESSION["gender"]?><br>
        Hobi : <?php foreach($_SESSION["hobi"] as $hobi) : ?><?= $hobi; ?><?php endforeach;?><br>
        Deskripsi : <?= $_SESSION["deskripsi"]?><br><br>
        <a href="form.php">back</a><br>
    </form>
</body>
</html>