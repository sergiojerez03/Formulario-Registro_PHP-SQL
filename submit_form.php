<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergioJerez";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$documento = $_POST['documento'];
$tipo_documento = $_POST['tipo_documento'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$departamento = $_POST['departamento'];
$municipio = $_POST['municipio'];
$direccion = $_POST['direccion'];
$observacion = $_POST['observacion'];

// Manejo del archivo subido
$archivo_nombre = $_FILES['archivo']['name'];
$archivo_tmp = $_FILES['archivo']['tmp_name'];
$archivo_ruta = "uploads/" . basename($archivo_nombre);

// Crear la carpeta de uploads si no existe en este casa ya existe
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Mover el archivo a la carpeta de uploads
if (move_uploaded_file($archivo_tmp, $archivo_ruta)) {
    $archivo_subido = true;
} else {
    $archivo_subido = false;
}

// Insertar datos en la base de datos
$sql = "INSERT INTO registros (nombre, apellido, correo, documento, tipo_documento, fecha_nacimiento, genero, telefono, departamento, municipio, direccion, observacion, archivo_nombre, archivo_ruta)
VALUES ('$nombre', '$apellido', '$correo', '$documento', '$tipo_documento', '$fecha_nacimiento', '$genero', '$telefono', '$departamento', '$municipio', '$direccion', '$observacion', '$archivo_nombre', '$archivo_ruta')";

if ($conn->query($sql) === TRUE) {
    $id = $conn->insert_id;
    header("Location: form.php?id=$id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
