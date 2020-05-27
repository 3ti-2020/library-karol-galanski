<?php

    var_dump($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `ksiazki`(`id_ksiazki`, `id_autor`, `id_tytul`) VALUES (NULL , '".$_POST['wybrany-autor']."', '".$_POST['wybrany-tytul']."')";

    echo("<li>".$sql);

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:http://localhost/korona/library-karol-galanski-master/");
    


?>