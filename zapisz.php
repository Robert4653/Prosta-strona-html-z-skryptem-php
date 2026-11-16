<?php
$baza = mysqli_connect("localhost", "root", "", "szkola");

if (!$baza) {
    die("Nie udalo sie polaczyc z baza.");
}

mysqli_query($baza, "CREATE TABLE IF NOT EXISTS wpisy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tresc VARCHAR(255)
)");

mysqli_query($baza, "INSERT INTO wpisy (tresc) VALUES ('Klikniecie przycisku')");

$wynik = mysqli_query($baza, "SELECT id, tresc FROM wpisy ORDER BY id DESC");

echo "<h1>Wpisy z bazy</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Tresc</th></tr>";

while ($wiersz = mysqli_fetch_array($wynik)) {
    echo "<tr>";
    echo "<td>" . $wiersz["id"] . "</td>";
    echo "<td>" . $wiersz["tresc"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br><a href='index.html'>Powrot</a>";

mysqli_close($baza);
?>
