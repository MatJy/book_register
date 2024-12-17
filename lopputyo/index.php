<?php

include 'kirjat.php';

$haku = isset($_GET['haku']) ? $_GET['haku'] : ''; // Haetaan hakusana, jos se on annettu

// Luodaan Kirjat-olento
$kirjatObjekti = new Kirja();

// Haetaan kaikki kirjat
$kirjat = $kirjatObjekti->haeKaikki($haku);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Kirjarekisteri</title>
</head>

<body>
    <h1>Kirjarekisteri</h1>
    <a href="lisaa_kirja.php">Lisää uusi kirja</a>
    <br><br>
    <form method="get">
        <label for="haku">Hae kirjan nimellä:</label>
        <input type="text" name="haku" value="<?= $haku ?>">
        <button type="submit">Hae</button>
    </form>
    <br>
    <!-- Näytetään hakutulokset -->
    <?php if ($kirjat): ?>
        <table border="1">
            <tr>
                <th>Nimi</th>
                <th>Kirjailija</th>
                <th>Genre</th>
                <th>Julkaisuvuosi</th>
                <th>Toiminnot</th>
            </tr>

            <?php foreach ($kirjat as $kirja): ?>
                <tr>
                    <td><?= htmlspecialchars($kirja['nimi']) ?></td>
                    <td><?= htmlspecialchars($kirja['kirjailija']) ?></td>
                    <td><?= htmlspecialchars($kirja['genre']) ?></td>
                    <td><?= htmlspecialchars($kirja['julkaisuvuosi']) ?></td>
                    <td>
                        <a href="muokkaa_kirja.php?id=<?= $kirja['id'] ?>">Muokkaa</a>
                        <a href="poista_kirja.php?id=<?= $kirja['id'] ?>">Poista</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>

            <p>Ei löytynyt kirjoja, jotka vastaavat hakusanaa.</p>

        <?php endif; ?>
        </table>
</body>

</html>