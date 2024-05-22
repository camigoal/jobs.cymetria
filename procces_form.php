<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tienes un usuario diferente
$password = ""; // Añade tu contraseña aquí
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

    echo "<p>¡Gracias por su solicitud!</p> <br> Su solicitud se ha enviado correctamente.";

    // Procesar el archivo CV
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cv"]["name"]);
    move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file);

    $sql = "INSERT INTO applications (nombre, email, celular, cv) VALUES ('$nombre', '$email', '$celular', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "Solicitud enviada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
