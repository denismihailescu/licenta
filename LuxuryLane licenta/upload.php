


<?php include 'header.php'; ?>

<?php

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă oferta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main>
    
            
            <br> 
            <form action="proces_anunturi.php" method="POST" enctype="multipart/form-data"> 
            <h2>Adaugă o noua masina</h2> 
                <div class="form-group"> 
                    <label for="nume_marca">Nume Marca:</label> 
                    <input type="text" id="nume_marca" name="nume_marca" required> 
                </div>
                <div class="form-group"> 
                    <label for="model">Model:</label> 
                    <input type="text" id="model" name="model" required> 
                </div>
                <div class="form-group"> 
                    <label for="pret">Pret (EUR):</label> 
                    <input type="text" id="pret" name="pret" required> 
                </div>
                <div class="form-group"> 
                    <label for="perioada">Perioada leasingului in luni:</label> 
                    <input type="text" id="perioada" name="perioada" required> 
                </div>
                <div class="form-group"> 
                    <label for="descriere">Descrierea anuntului</label> 
                    <textarea id="descriere" name="descriere" rows="4" required></textarea> 
                </div>
                <div class="form-group"> 
                    <label for="email">Email Contact:</label> 
                    <input type="email" id="email" name="email" required> 
                </div>
                <div class="form-group"> 
                    <label for="telefon">Telefon Contact:</label> 
                    <input type="tel" id="telefon" name="telefon" pattern="[0-9]{10}" required> 
                    <small>Introduceți un număr de telefon format din 10 cifre.</small> 
                </div>
                <div class="form-group"> 
                    <label for="poza">Poza:</label> 
                    <input type="file" id="poza" name="poza" accept="image/*" required> 
                </div>
                <button type="submit">Adaugă oferta</button> 
            </form>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">LUXURYLANE</div>
        </div>
    </footer>
</body>
</html>

