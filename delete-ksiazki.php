<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM `ksiazki` WHERE id_ksiazki=".$_POST['id']." "; 

    mysqli_query($conn, $sql);

    header("Location:http://localhost/korona/library-karol-galanski-master/");

?>