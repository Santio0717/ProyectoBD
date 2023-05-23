<?php
require_once "../model/procesar.php";
class consulta2{
    private $connection;

    public function __construct(){
        $this->connection = controladorBD::connect();
    }

    public function consulta_2(){
        return $this->connection->query('select * from c_asociados limit 10;');
    }
  }
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
      <th>ID</th>
        <th>id de empleado</th>
        <th>id del curso </th>
        <th>calificacion</th>
        <th>progreso</th>
        <th>fecha de finalizacion</th>
        <th>total de horas</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $res = new consulta2;
        $fila = $res-> consulta_2();
        if ($fila -> num_rows > 0) {
          try{
          while ($f = $fila->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $f["ID"] . "</td>";
            echo "<td>" . $f["Empleados_ID"] . "</td>";
            echo "<td>" . $f["Curso_ID"] . "</td>";
            echo "<td>" . $f["cCur_Calificacion"] . "</td>";
            echo "<td>" . $f["cCur_EstadoProgreso"] . "</td>";
            echo "<td>" . $f["cCur_FechaFin"] . "</td>";
            echo "<td>" . $f["cCur_HorasTotale"] . "</td>";
            echo "</tr>";
          }
        }catch(ErrorException){
          echo "<tr>";
          echo "<td>" . "no se obtuvo el dato" . "</td>";
          echo "</tr>";
        }
        } else {
          echo "<tr><td colspan='3'>No se encontraron datos</td></tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>