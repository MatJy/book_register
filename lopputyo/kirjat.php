<?php
$pdo = new PDO('mysql:host=localhost;dbname=kirjarekisteri', 'root', '');
class Kirja
{

    public $nimi, $kirjailija, $genre, $julkaisuvuosi, $kuvaus;

    // Luokalle ei ole pakko antaa mitään arvoja, arvot ovat null oletuksena.
    public function __construct($nimi = null, $kirjailija = null, $genre = null, $julkaisuvuosi = null, $kuvaus = null)
    {
        $this->nimi = $nimi;
        $this->kirjailija = $kirjailija;
        $this->genre = $genre;
        $this->julkaisuvuosi = $julkaisuvuosi;
        $this->kuvaus = $kuvaus;
    }
    // Tietojen lisääminen tietokantaan
    public function lisaa()
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO kirjat (nimi, kirjailija, genre, julkaisuvuosi, kuvaus) VALUES (?, ?, ?, ?, ?);");
        $stmt->execute([$this->nimi, $this->kirjailija, $this->genre, $this->julkaisuvuosi, $this->kuvaus]);
    }

    // Kirjan hakeminen tietokannasta
    public static function haeKaikki($haku = '')
    {
        global $pdo;
        // Jos hakusana on annettu, haetaan kirjat, joiden nimi sisältää hakusanan
        if (strlen($haku) > 0) {
            $stmt = $pdo->prepare("SELECT * FROM kirjat WHERE nimi LIKE ?;");
            $stmt->execute(['%' . $haku . '%']); // % käytetään wildcardina
        } else {
            $stmt = $pdo->query("SELECT * FROM kirjat;");
        }
        $kirjat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $kirjat;
    }

    // haetaan yksi kirja
    public static function haeYksi($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM kirjat WHERE id = ?;");
        $stmt->execute([$id]);
        $kirja = $stmt->fetch(PDO::FETCH_ASSOC);
        return $kirja;
    }

    // Kirjan poistaminen tietokannasta
    public static function poista($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM kirjat WHERE id = ?;");
        $stmt->execute([$id]);
    }

    // Kirjan muokkaaminen
    public static function muokkaa($nimi, $kirjailija, $genre, $julkaisuvuosi, $kuvaus, $id)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE kirjat SET nimi = ?, kirjailija = ?, genre = ?, julkaisuvuosi = ?, kuvaus = ? WHERE id = ?;");
        $stmt->execute([$nimi, $kirjailija, $genre, $julkaisuvuosi, $kuvaus, $id]);
    }
}
