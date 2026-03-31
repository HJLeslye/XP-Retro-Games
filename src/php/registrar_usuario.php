<?php
// Al inicio de registrar_usuario.php
error_log("Datos recibidos: " . print_r($_POST, true));

include("conexion.php");



$username = $_POST["username"] ?? '';
$email = $_POST["email"] ?? '';
$passwordRaw = $_POST["password"] ?? '';

if (empty($username) || empty($email) || empty($passwordRaw)) {
    echo "Faltan campos obligatorios.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Correo no válido.";
    exit();
}

$password = password_hash($passwordRaw, PASSWORD_DEFAULT);

$fechaRegistro = date("Y-m-d");
$horasJugadas = 0;
$descripcion = "Sin descripción";
$fechaNacimiento = "2000-01-01";
$idRegion = 1;
$idPais = 1;
$idGenero = 1;
$idLogros = 1;
$idRango = 1;

// Verificar duplicados
$check = $conn->prepare("SELECT 1 FROM usuarios WHERE Nombre_usuario = ? OR Correo = ?");
$check->bind_param("ss", $username, $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "El usuario o correo ya existe.";
    exit();
}

// Insertar nuevo usuario
$stmt = $conn->prepare("INSERT INTO usuarios (Nombre_usuario, Correo, Contraseña, Horas_jugadas, Fecha_registro, Descripcion, Fecha_nacimiento, Id_region, Id_pais, Id_genero, Id_logros, Id_rango)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssisssiiiii", $username, $email, $password, $horasJugadas, $fechaRegistro, $descripcion, $fechaNacimiento, $idRegion, $idPais, $idGenero, $idLogros, $idRango);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
