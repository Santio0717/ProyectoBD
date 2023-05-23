<?php
require_once "../model/procesar.php";

class consulta1 {
    private $connection;

    public function __construct(){
        $this->connection = controladorBD::connect();
    }

    public function consulta_1(){
        return $this->connection->query('SELECT * FROM empleados LIMIT 10;');
    }
}

$res = new consulta1;
$fila = $res->consulta_1();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla generada desde una base de datos</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>genero</th>
            <th>asctivo</th>
            <th>grupo personal</th>
            <th>nombre del trabajo</th>
            <th>usuario</th>
            <th>compañia</th>
            <th>area</th>
            <th>supervisor</th>
            <th>curso</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($fila !== false && $fila->num_rows > 0) {
            while ($f = $fila->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $f["E_ID"] . "</td>";
                echo "<td>" . $f["E_PrimerNombre"] . "</td>";
                echo "<td>" . $f["E_PrimerApellido"] . "</td>";
                echo "<td>" . $f["E_Genero"] . "</td>";
                echo "<td>" . $f["E_Activo"] . "</td>";
                echo "<td>" . $f["E_GrupoPersonal"] . "</td>";
                echo "<td>" . $f["E_NombreTrabajo"] . "</td>";
                echo "<td>" . $f["Usuario_ID"] . "</td>";
                echo "<td>" . $f["Compania_ID"] . "</td>";
                echo "<td>" . $f["Area_ID"] . "</td>";
                echo "<td>" . $f["Supervisor_ID"] . "</td>";
                echo "<td>" . $f["Curso_ID"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12'>No se encontraron datos</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
