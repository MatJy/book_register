<?php
include "kirjat.php";
$id = $_GET['id'];



$kirjat = new Kirja();
$kirja = $kirjat->haeYksi($id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nimi = $_POST['nimi'];
    $kirjailija = $_POST['kirjailija'];
    $genre = $_POST['genre'];
    $julkaisuvuosi = $_POST['julkaisuvuosi'];
    $kuvaus = $_POST['kuvaus'];

    $kirjat->muokkaa($nimi, $kirjailija, $genre, $julkaisuvuosi, $kuvaus, $id);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muokkaa kirjaa</title>
</head>

<body>
    <h1>Muokkaa kirjan tietoja</h1>
    <form method="post">

        <label for="nimi">Kirjan nimi:</label>
        <input type="text" name="nimi" value="<?php echo $kirja['nimi']; ?>" required>
        <br><br>

        <label for="kirjailija">Kirjailija:</label>
        <input type="text" name="kirjailija" value="<?php echo $kirja['kirjailija']; ?>" required>
        <br><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo $kirja['genre']; ?>" required>
        <br><br>


        <label for="julkaisuvuosi">Julkaisuvuosi:</label>
        <input type="number" name="julkaisuvuosi" value="<?php echo $kirja['julkaisuvuosi']; ?>" required>
        <br><br>

        <label for="kuvaus">Kuvaus:</label>
        <textarea name="kuvaus" rows="6" cols="30"><?php echo $kirja['kuvaus']; ?></textarea>
        <br><br>

        <button type="submit">Muokkaa</button>
    </form>
</body>

</html>