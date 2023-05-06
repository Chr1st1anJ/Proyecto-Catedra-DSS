<?php
// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $accion = $_POST["accion_personal"];

    // Validar que se hayan proporcionado todos los datos necesarios
    if (empty($nombre) || empty($accion)) {
        echo "Por favor proporciona el nombre y la acción del empleado.";
    } else {
        // Conectarse a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "banco";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Verificar si la conexión fue exitosa
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        // Insertar el empleado en la base de datos
        $sql = "INSERT INTO empleados (nombre, accion_personal, estado_aprobacion) VALUES ('$nombre', '$accion', 'en espera')";

        if (mysqli_query($conn, $sql)) {
            echo "Empleado ingresado correctamente.";
        } else {
            echo "Error al ingresar el empleado: " . mysqli_error($conn);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    }
}
?>
