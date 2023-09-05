<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda de Citas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <link href='ruta/a/tu/fullcalendar.css' rel='stylesheet' />
    <script src='ruta/a/tu/fullcalendar.js'></script>
    <script src='ruta/a/tu/jquery.min.js'></script>
    <style>
        #calendar {
            max-width: 800px;
            margin: 0 auto;
        }
        #citas-tablero {
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        #citas-tablero th, #citas-tablero td {
            padding: 10px;
            text-align: left;
        }
        #citas-tablero th {
            background-color: #f2f2f2;
        }
        #citas-tablero tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Agenda de Citas</h1>

    <div id='calendar'></div>

    <h2>Detalle de Citas</h2>
    <table id="citas-tablero">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tratamiento</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Comentarios</th>
        </tr>

        <?php
        // Conectar a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "login");

        // Verificar la conexión
        if (!$conexion) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }

        // Consultar las citas desde la base de datos
        $query = "SELECT id, nombre, tratamiento, fecha, hora, comentarios FROM citas";
        $resultado = mysqli_query($conexion, $query);

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $tratamiento = $fila['tratamiento'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
            $comentarios = $fila['comentarios'];

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nombre . "</td>";
            echo "<td>" . $tratamiento . "</td>";
            echo "<td>" . $fecha . "</td>";
            echo "<td>" . $hora . "</td>";
            echo "<td>" . $comentarios . "</td>";
            echo "</tr>";
        }

        mysqli_close($conexion);
        ?>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                defaultView: 'dayGridMonth',
                events: [
                    <?php
                    // Conectar a la base de datos
                    $conexion = mysqli_connect("localhost", "root", "", "login");

                    // Verificar la conexión
                    if (!$conexion) {
                        die("La conexión a la base de datos falló: " . mysqli_connect_error());
                    }

                    // Consultar las citas desde la base de datos
                    $query = "SELECT id, nombre, tratamiento, fecha, hora, comentarios FROM citas";
                    $resultado = mysqli_query($conexion, $query);

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $id = $fila['id'];
                        $nombre = $fila['nombre'];
                        $tratamiento = $fila['tratamiento'];
                        $fecha = $fila['fecha'];
                        $hora = $fila['hora'];
                        $comentarios = $fila['comentarios'];

                        echo "{";
                        echo "id: '$id',";
                        echo "title: '$nombre - $tratamiento',";
                        echo "start: '$fecha $hora',";
                        echo "description: '$comentarios'";
                        echo "},";

                    }

                    mysqli_close($conexion);
                    ?>
                ],
                eventClick: function(info) {
                    alert("Nombre: " + info.event.title + "\nComentarios: " + info.event.extendedProps.description);
                }
            });

            calendar.render();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Vista por mes (puedes cambiarla)
                events: [
                    {
                        title: 'Evento 1',
                        start: '2023-09-01', // Fecha de inicio del evento
                        end: '2023-09-03'    // Fecha de finalización del evento (opcional)
                    },
                    {
                        title: 'Evento 2',
                        start: '2023-09-10',
                    },
                    // Agrega más eventos aquí
                ],
            });
            calendar.render();
        });
    </script>
</body>
</html>