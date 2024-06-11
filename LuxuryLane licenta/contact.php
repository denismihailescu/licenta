<!DOCTYPE html> 
<html lang="ro"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Contact</title> 
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
</head>
<body>
<?php include 'header.php'; ?>
    <main> 
    
    </main>
    <section class="apply-now"> 
        <h2>Contact</h2> 
        <p>Contactează-ne pentru a evalua corect autovehiculul tău!</p> 
        <br>
        <form action="upload_contact.php" method="post" enctype="multipart/form-data"> 
            <label for="nume">Nume:</label>
            <input type="text" name="nume" id="nume"><br>
            <label for="prenume">Prenume:</label>
            <input type="text" name="prenume" id="prenume"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br>
            <label for="poz">Încarcă o poză cu mașina ta!</label>
            <input type="file" name="poz" id="poz"><br>
            <input type="submit" value="Trimite"> 
        </form>
        <br><br><br>
    </section>
    <footer> 
        <div class="footer-container">
            <div class="footer-logo">LUXURYLANE</div> 
           
           
        </div>
    </footer>
</body>
</html>
