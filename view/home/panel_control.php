<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login");

// Verificar la conexión
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Procesar el formulario de agendar cita
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $tratamiento = $_POST["tratamiento"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $comentarios = $_POST["comentarios"];
    
    // Insertar los datos en la base de datos (debes realizar la inserción según tu estructura de tabla)
    $query = "INSERT INTO citas (nombre, tratamiento, fecha, hora, comentarios) VALUES ('$nombre', '$tratamiento', '$fecha', '$hora', '$comentarios')";
    
    if (mysqli_query($conexion, $query)) {
        echo "La cita se ha agendado correctamente.";
    } else {
        echo "Error al agendar la cita: " . mysqli_error($conexion);
    }
}

// Consultar las citas desde la base de datos
$query = "SELECT * FROM citas";
$resultado = mysqli_query($conexion, $query);

// Crear un array de eventos para FullCalendar
$eventos = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $evento = array(
        'title' => $fila['tratamiento'],
        'start' => $fila['fecha'] . 'T' . $fila['hora'],
        'description' => $fila['comentarios']
    );
    array_push($eventos, $evento);
}

// Convertir el array de eventos a formato JSON
$eventos_json = json_encode($eventos);

mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="agenda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<a href="/Login/view/home/login.php" class="salida">
    <i class="fa-solid fa-person-walking-arrow-right" style="width: 40px; height: 40px;"></i>
</a>

   
    <br>
    <div class="container">
       
        <h1>Novateeth</h1>
        <form action="#" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Paciente:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="tratamiento">Tipo de Tratamiento:</label>
                <select id="tratamiento" name="tratamiento" required>
                    <option value="brackets">Brackets</option>
                    <option value="ortodoncia">Control de Ortodoncia</option>
                    <option value="diseno-sonrisa">Diseño de Sonrisa</option>
                    <option value="protesis">Prótesis Dental</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de la Cita:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora de la Cita:</label>
                <input type="time" id="hora" name="hora" required>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea id="comentarios" name="comentarios" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Agendar Cita</button>
            </div>
        </form>
    </div>
   
    
    <script src="/asset/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
</body>
</html>