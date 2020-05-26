<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="cont">
        <div class="head">
            <h1>Karol Galański</h1>
        </div>
        <div class="sidebar">
            <h1>>Tu będzie insert i delete<</h1>
        </div>
        <div class="main">

        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                $conn = new mysqli($servername, $username, $password, $dbname);


                $result1 = $conn->query("SELECT id_ksiazki, imie, nazwisko, tytul, isbn FROM ksiazki, autorzy, tytuly WHERE ksiazki.id_autor=autorzy.id_autor AND ksiazki.id_tytul=tytuly.id_tytul");

                echo("<table class='tabelka'");
                echo("<tr>
                <th>ID Książki</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Tytuł</th>
                <th>ISBN</th>
                </tr>");

                while($row=$result1->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['id_ksiazki']."</td>");
                    echo("<td>".$row['imie']."</td>");
                    echo("<td>".$row['nazwisko']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['isbn']."</td>");
                    echo("</tr>");
                }
                echo("</table>");
            ?>


        </div>
    </div>
</body>
</html>