<?php
    var_dump($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $isbn = rand(100,999);

    $sql = "INSERT INTO `tytuly`(`id_tytul`, `tytul`, `isbn`) VALUES (NULL, '".$_POST['tytul']."', $isbn)";

    echo("<li>".$sql);

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:http://localhost/korona/library-karol-galanski-master/");
    
?>