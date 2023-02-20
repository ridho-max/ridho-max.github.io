<?php
require 'functions.php';

if(isset($_POST["register"]) ) {

    if(registrasi($_POST) > 0 ) {
        echo "<script>
            alert('user baru berhasil ditambahkan');
        </script>";
    }else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    
    <h1>Registrasi Dulu Bro</h1>

<form action="" method="post">

    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
        <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
        <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2">
        </li>
        <button type="submit" name="register">Registrasi!</button>
    </ul>


</form>

</body>
</html>