<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "job_applications";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cv = $_FILES['cv']['name'];
    $cv_temp = $_FILES['cv']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($cv);

    // Subir archivo
    if (move_uploaded_file($cv_temp, $target_file)) {
        // Preparar y bindear
        $stmt = $conn->prepare("INSERT INTO applications (nombre, email, celular, cv) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $celular, $target_file);

        if ($stmt->execute()) {
            echo "Nueva solicitud guardada exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al subir el archivo.";
    }
}

$conn->close();
