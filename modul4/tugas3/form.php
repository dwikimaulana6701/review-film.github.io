<?php
    session_start();
    // input value readiness variables
    $nama = $nim = $email = $tglahir = $gender = $hobi = $desc = false;
    // input value error variables
    $namaErr = $nimErr = $emailErr = $tglahirErr = $genderErr = $hobiErr = $descErr = "";
    // error format
    $_error = "is required";
    // checked checkbox variables
    $check_hobi1 = $check_hobi2 = $check_hobi3 = "";
    // checked checkbox format
    $_check = "checked";

    // input value validation statements
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nama"])) $namaErr = "Nama " . $_error;
        else $nama = true;

        if(empty($_POST["NIM"])) $nimErr = "NIM " . $_error;
        else {
            if(!preg_match("/^[0-9]*$/",$_POST["NIM"])){
                $nimErr = "NIM must integer number";
            }else $nim = true;
        }

        if(empty($_POST["email"])) $emailErr = "Email  " . $_error;
        else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }else $email = true;
        }

        if(empty($_POST["dateBirth"])) $tglahirErr = "Tanggal lahir  " . $_error;
        else $tglahir = true;

        if(empty($_POST["gender"])) $genderErr = "Jenis-kelamin  " . $_error;
        else {
            $gender = test_input($_POST["gender"]);
            $gender = true;
        }

        if(empty($_POST["hobi"])) $hobiErr = "Hobi  " . $_error;
        else {
            foreach($_POST["hobi"] as $h){
                if(!empty($h) && $h == "Badminton")$check_hobi1 = $_check;
                if(!empty($h) && $h == "Vollyball")$check_hobi2 = $_check;
                if(!empty($h) && $h == "Football")$check_hobi3 = $_check;
            }
            $hobi = true;
        }

        if(empty($_POST["deskripsi"])) $descErr = "Deskripsi  " . $_error;
        else $desc = true;
    }

    // all input expression for result page and redirect to it
    if($nama && $nim && $email && $tglahir && $gender && $hobi && $desc){
        $_SESSION["nama"] = $_POST["nama"];
        $_SESSION["NIM"] = $_POST["NIM"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["dateBirth"] = $_POST["dateBirth"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["hobi"] = $_POST["hobi"];
        $_SESSION["deskripsi"] = $_POST["deskripsi"];
        header("Location: hasil.php");
        exit();
    }

    // checked for radio answer value
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas 3</title>
</head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Roboto Mono", monospace;
        }
        body{
            color: black;
            font-weight: bold;
            position: fixed;
            margin-top: 60px;
            margin-left: 50px;
            width: 100%;
            text-align: left;
            font-size: 18px;
            height: 100vh;
            background-color: cornflowerblue;
            background-image: url(https://wallpaperaccess.com/full/2249568.jpg);

        }

        form #nama, #NIM, #email, #dateBirth{
            width: 500px;
            height: 35px;
        }

        button:hover{
            background-color: red;
        }

        .error{
            color: red;
            font-size: 13px;
        }
        
    </style>
<body>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

		<label>Nama : </label><br>
		<input type="text" required id="nama" name="nama" 
            value=<?= isset($_POST["nama"]) ? $_POST["nama"] : ""; ?>>
        <span class="error">*<?= $namaErr; ?></span>
        <br><br>

        <label>NIM : </label><br>
		<input type="text" required id="NIM" name="NIM" 
            value=<?= isset($_POST["NIM"]) ? $_POST["NIM"] : ""; ?>>
        <span class="error">*<?= $nimErr; ?></span>
        <br><br>

		<label>Masukkan Email : </label><br>
		<input type="text" required id="email" name="email"
            value=<?= isset($_POST["email"]) ? $_POST["email"] : "";?>>
        <span class="error">*<?= $emailErr; ?></span>
        <br><br>

        <label>Tanggal Lahir : </label><br>
		<input type="date" required id="dateBirth" name="dateBirth"
            value=<?= isset($_POST["dateBirth"]) ? $_POST["dateBirth"] : ""; ?>>
        <span class="error">*<?= $tglahirErr; ?></span>
        <br><br>

        <label>Jenis Kelamin : </label><br>
        <br>
        <input type="radio" id="Laki-laki" name="gender" value="Laki-laki" 
            <?php if(isset($gender) && $gender=="Laki-laki") echo "checked"; 
            ?> >Laki-laki
        <input type="radio" id="Perempuan" name="gender" value="Perempuan"
            <?php if(isset($gender) && $gender=="Perempuan") echo "checked"; 
            ?> >Perempuan
        <span class="error">*<?= $genderErr; ?></span>
        <br><br>

        <label>Hobi : </label><br>
        <br>
        <input type="checkbox" id="hobi1" name="hobi[]" value="Badminton " <?= $check_hobi1?>>Badminton
        <input type="checkbox" id="hobi2" name="hobi[]" value="Vollyball " <?= $check_hobi2?>>Vollyball
        <input type="checkbox" id="hobi3" name="hobi[]" value="Football " <?= $check_hobi3?>>Football
        <span class="error">*<?= $hobiErr; ?></span>
        <br><br>

        <label>Deskripsi : </label><br>
        <br>
        <textarea id="deskripsi" required name="deskripsi" rows="4" cols="65"><?= isset($_POST["deskripsi"]) ? $_POST["deskripsi"] : ""; ?></textarea>
        <span class="error">*<?= $descErr; ?></span>
        <br><br>

		<button type="submit" name="submit">Submit</button>
	</form>
</body>
</html>