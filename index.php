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

            <div class="inserty">
                <h1>Dodaj Autora:</h1>
                <form action="insert-autor.php" method="post" class="insert">
                    <input type="text" name="imie" placeholder="Imie">
                    <input type="text" name="nazwisko" placeholder="Nazwisko">
                    <input type="submit" value="Dodaj">
                </form>
                <h1>Dodaj Tytuł:</h1>
                <form action="insert-tytul.php" method="post" class="insert">
                    <input type="text" name="tytul" placeholder="Tytuł">
                    <input type="submit" value="Dodaj">
                </form>
                <h2>Wybierz autora i Tytuł:</h2>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "library";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $result2 = $conn->query("SELECT * FROM autorzy");

                    echo("<form action='insert-ksiazka.php' method='POST'  class='insert'>");
                    echo("<select name='wybrany-autor'>");
                    while($row=$result2->fetch_assoc() ){
                        echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                    }
                    echo("</select>");

                    $result3 = $conn->query("SELECT * FROM tytuly");

                    echo("<select name='wybrany-tytul'>");
                    while($row=$result3->fetch_assoc() ){
                        echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                    }
                    echo("</select>");

                    echo("<input type='submit' value='Dodaj'>");
                    echo("</form>");
                ?>
            </div>

            <div class="delety">
            <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $result2 = $conn->query("SELECT * FROM autorzy");
                
                echo("<h1>Usuń autora:</h1>");
                echo("<form action='delete-autor.php' method='POST'  class='delete'>");
                echo("<select name='id_autor'>");
                while($row=$result2->fetch_assoc() ){
                    echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                }
                echo("</select>");

                echo("<input type='submit' value='Usuń'>");
                echo("</form>");

                $result3 = $conn->query("SELECT * FROM tytuly");
                
                echo("<h1>Usuń tytuł:</h1>");
                echo("<form action='delete-tytul.php' method='POST'  class='delete'>");
                echo("<select name='id_tytul'>");
                while($row=$result3->fetch_assoc() ){
                    echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");

                echo("<input type='submit' value='Usuń'>");
                echo("</form>");

            ?>
            </div>
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
                <th>DEL</th>
                </tr>");

                while($row=$result1->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['id_ksiazki']."</td>");
                    echo("<td>".$row['imie']."</td>");
                    echo("<td>".$row['nazwisko']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['isbn']."</td>");
                    echo("<td>
                            <form action='delete-ksiazki.php' method='post'>
                                <input type='hidden' name='id' value='".$row['id_ksiazki']."'>
                                <input type='submit' value='usun'>
                            </form>
                        </td>");
                    echo("</tr>");
                }
                echo("</table>");
            ?>


        </div>
    </div>
</body>
</html>