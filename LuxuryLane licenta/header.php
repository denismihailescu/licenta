<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Lane</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header> 
        <nav class="navbar"> 
            <a href="index.php"> 
                <div class="logo">LUXURY<span>LANE</span></div> 
            </a> 
            <ul class="nav-links"> 
                <li><a href="index.php">Acasa</a></li> 
                <li><a href="anunturi.php">Anunturi</a></li> 
                
                <li><a href="despre.php">Despre</a></li>  
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-icons">
                <?php if(isset($_SESSION['username'])): ?>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <a href="upload.php"><i class="fas fa-upload"></i> ADAUGĂ UN ANUNT</a>
                <?php else: ?>
                    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
