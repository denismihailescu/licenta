<?php

$server = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "luxury"; 

$conn = new mysqli($server, $user, $pass, $db); 

if ($conn->connect_error) { 
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error); 
}

if (!is_dir('anunturi')) { 
    mkdir('anunturi'); 
}

$sql = "SELECT * FROM anunturi"; 
$result = $conn->query($sql); 

if ($result && $result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) { 
        $id = $row["id"]; 
        $file_name = "anunturi/autovehicul$id-luxurylane.php"; 
        $brand = $row["brand"]; 
        $name = $row["name"]; 
        $price = $row["price"]; 
        $duration = $row["duration"]; 
        $description = $row["description"]; 
        $email = $row["email"]; 
        $phone = $row["phone"]; 
        $image = $row["image"]; 

        $content = <<<HTML
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertă - $brand</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header> 
<nav class="navbar"> 
    <a href="../index.php"> <div class="logo">LUXURY</span>LANE</div> </a> 
    <ul class="nav-links"> 
        <li><a href="../index.php">Acasa</a></li> 
        <li><a href="../anunturi.php">Anunturi</a></li> 
        <li><a href="../contact.html">Contact</a></li>
        <li><a href="../despre.html">Despre</a></li>  
    </ul>
    <div class="nav-icons"> 
        <a href="../upload.php"><i class="fas fa-upload"></i> ADAUGĂ UN ANUNT</a> 
    </div>
</nav>
</header>
<main>
<section class="anunt">
    <div class="anunt-image">
        <img src="../$image" alt="$brand">
    </div>
    <div class="anunt-details">
        <h1>$brand</h1>
        <p><strong>Model:</strong> $name</p>
        <p><strong>Pret:</strong> $price EUR</p>
        <p><strong>Perioadă:</strong> $duration luni</p>
        <p><strong>Descriere:</strong> $description</p>
        <p><strong>Contact:</strong> Email: $email<br> Telefon: $phone</p>
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
HTML;

        if (file_put_contents($file_name, $content) !== false) { 
            echo "Pagina pentru oferta cu ID-ul $id a fost generată cu succes.<br>"; 
        } else {
            echo "Eroare la generarea paginii pentru oferta cu ID-ul $id.<br>"; 
        }
    }
} else {
    echo "Nu există anunturi disponibile sau interogarea bazei de date a eșuat."; 
}

$conn->close(); 
?>
