<?php

$name=$_POST['name'];
$nim=$_POST['nim'];
$email=$_POST['email'];
$tglahir=$_POST['tglahir'];
$jenkel=$_POST['jenkel'];
$hoby=$_POST['hoby'];
$desc=$_POST['desc'];

echo "<h2>Your Input:</h2>";
    echo "Nama : ".$name;
    echo "<br>";
    echo "NIM : ".$nim;
    echo "<br>";
    echo "E-mail : ".$email;
    echo "<br>";
    echo "Tanggal Lahir : ".$tglahir;
    echo "<br>";
    echo "Jenis Kelamin : ".$jenkel;
    echo "<br>";
    echo "Hoby : ".$hoby;
    echo "<br>";
    echo "Deskripsi : ".$desc;
    echo "<br>";
?>