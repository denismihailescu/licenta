<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunturi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<h1 style="text-align:center;">Anunturi</h1>
<section class="luxurys">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "luxury";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$sql = "SELECT * FROM anunturi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<a href='/anunturi/autovehicul" . $row["id"] . "-luxurylane.php' class='luxury'>";
        echo "<div class='luxury-item'>";
        echo "<img src='" . $row["poza"] . "' alt='" . $row["nume_marca"] . "' class='luxury-img'>";
        echo "<div class='luxury-details'>";
        echo "<h2>" . $row["nume_marca"] . "</h2>";
        echo "<p>Model: " . $row["model"] . "<br>Pret: " . $row["pret"] . " EUR<br>Perioadă: " . $row["perioada"] . " luni</p>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
    }
} else {
    echo "Nu există anunturi disponibile.";
}

$conn->close();
?>
</section>
<footer> 
    <div class="footer-container">
        <div class="footer-logo">LUXURYLANE</div> 
    </div>
</footer>
</body>
</html>
