<?php
    var_dump($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL , '".$_POST['imie']."', '".$_POST['nazwisko']."') ";

    echo("<li>".$sql);

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:http://localhost/korona/library-karol-galanski-master/");
    
?>
