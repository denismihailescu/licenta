<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "luxury"; 

$conn = mysqli_connect($servername, $username, $password, $database); 

if (!$conn) { 
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error()); 
}

$nume = $_POST['nume'] ?? ''; 
$prenume = $_POST['prenume'] ?? ''; 
$email = $_POST['email'] ?? ''; 

if (isset($_FILES['poz']) && $_FILES['poz']['error'] === UPLOAD_ERR_OK) { 
    
    $upload_directory = 'incarcari/'; 
    
    $poz_name = $_FILES['poz']['name']; 
    
    $poz_path = $upload_directory . $poz_name; 
    
    if (move_uploaded_file($_FILES['poz']['tmp_name'], $poz_path)) { 
        
        $sql = "INSERT INTO contact (nume, prenume, email, poz) VALUES ('$nume', '$prenume', '$email', '$poz_path')"; 

        if (mysqli_query($conn, $sql)) { 
            echo "Aplicația a fost trimisă cu succes!"; 
        } else {
            echo "Eroare la trimiterea aplicației: " . mysqli_error($conn); 
        }
    } else {
        echo "Eroare la mutarea fișierului încărcat."; 
    }
} else {
    echo "Eroare la încărcarea fișierului."; 
}

mysqli_close($conn); 
?>
