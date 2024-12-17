<?php
include "kirjat.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nimi = $_POST['nimi'];
    $kirjailija = $_POST['kirjailija'];
    $genre = $_POST['genre'];
    $julkaisuvuosi = $_POST['julkaisuvuosi'];
    $kuvaus = $_POST['kuvaus'];

    $kirjat = new Kirja($nimi, $kirjailija, $genre, $julkaisuvuosi, $kuvaus);
    $kirjat->lisaa();

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lisää kirja</title>
</head>

<body>
    <h1>Lisää uusi kirja</h1>
    <form method="post">
        <label>Nimi:</label><br>
        <input type="text" name="nimi" required><br>
        <label>Kirjailija:</label><br>
        <input type="text" name="kirjailija" required><br>
        <label>Genre:</label><br>
        <input type="text" name="genre" required><br>
        <label>Julkaisuvuosi:</label><br>
        <input type="number" name="julkaisuvuosi" required><br>
        <label>Kuvaus:</label><br>
        <textarea name="kuvaus"></textarea><br>
        <button type="submit">Lisää</button>
    </form>
</body>

</html>