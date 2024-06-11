<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "luxury";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume_marca = $_POST["nume_marca"];
    $model = $_POST["model"];
    $pret = $_POST["pret"];
    $perioada = $_POST["perioada"];
    $descriere = $_POST["descriere"];
    $email_contact = $_POST["email"];
    $telefon_contact = $_POST["telefon"];
    $poza = $_FILES["poza"]["name"];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["poza"]["name"]);
    move_uploaded_file($_FILES["poza"]["tmp_name"], $target_file);
    $poza = $target_file;

    $sql = "INSERT INTO anunturi (nume_marca, model, pret, perioada, descriere, email_contact, telefon_contact, poza) VALUES ('$nume_marca', '$model', '$pret', '$perioada', '$descriere', '$email_contact', '$telefon_contact', '$poza')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $nume_fisier_oferta = "anunturi/autovehicul$last_id-luxurylane.php";

        $oferta_content = <<<EOT
        <!DOCTYPE html>
        <html lang="ro">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ofertă - $nume_marca</title>
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>
        <body>
        <header> 
        <nav class="navbar"> 
            <a href="index.php"> <div class="logo">LUXURY<span>LANE</span></div> </a> 
            <ul class="nav-links"> 
                <li><a href="../index.php">Acasa</a></li> 
                <li><a href="../anunturi.php">Anunturi</a></li> 
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="../despre.php">Despre</a></li>  
            </ul>
            <div class="nav-icons"> 
                <a href="../upload.php"><i class="fas fa-upload"></i> ADAUGĂ UN ANUNT</a> 
            </div>
        </nav>
        </header>
        <main>
        <section class="anunt">
            <div class="anunt-image">
                <img src="../$poza" alt="$nume_marca">
            </div>
            <div class="anunt-details">
                <h1>$nume_marca</h1>
                <p><strong>Model:</strong> $model</p>
                <p><strong>Pret:</strong> $pret EUR</p>
                <p><strong>Perioada leasing-ului:</strong> $perioada luni</p>
                <p><strong>Contact:</strong> Email: $email_contact<br> Telefon: $telefon_contact</p>
            </div>
            <div class="anunt-description">
                <h2>Descriere:</h2>
                <p>$descriere</p>
            </div>
        </section>
        </main>
        <footer> 
            <div class="footer-container">
                <div class="footer-logo">LUXURYLANE</div>
            </div>
        </footer>
        </body>
        </html>
        EOT;
        
        file_put_contents($nume_fisier_oferta, $oferta_content);

        header("Location: ../anunturi.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
