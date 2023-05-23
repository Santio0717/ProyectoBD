<?php
require_once "../model/procesar.php";
class consultas
{
  private $connection;

  public function __construct()
  {
    $this->connection = controladorBD::connect();
  }

  public function consulta_3Y4($paisCons3y4)
  {
    return $this->connection->query("select cA.ID, count(e.E_ID) AS totalEmp from 
                          c_asociados cA JOIN empleado e ON cA.ID = e.E_ID JOIN pais p ON 
                          e.E_ID = p.P_ID WHERE p.P_ID = '{$paisCons3y4}' GROUP BY cA.ID ORDER BY 
                          totalEmp desc limit 5;");
  }
  public function consulta_5Y6($modalidad){
    return $this->connection->query(
        "select c.C_ID, COUNT(e.E_ID) as total_empleados from cursos c join empleados
         e ON c.Empleados_ID = e.E_ID JOIN sedes s ON e.Sede_ID = s.Sede_ID WHERE s.Pais 
         = 'Colombia' AND c.Modalidad = '{$modalidad}'group by c.Curso_ID ORDER BY total_empleados 
         DESC LIMIT 10;");
    }
    public function consulta_8_11($idi){
      return $this->connection->query("select count(*) AS numero_cursos
          from curso where Curso_Idioma = '{$idi}'");
  }

  public function consulta_12Y13($aprob){
      return $this->connection->query("select count(*) as cantidadC_aprobados from empleado e join 
            c_asociados cA on e.E_ID = cA.Empleado_ID where cA.cCur_EstadoProgreso like '{$aprob} 
            (Pres)' or cc.CursoCursado_EstadoProgreso = '{$aprob} (Virtual)' ;");
  }

  public function consulta_14_17($codP){
      return $this->connection->query("select avg(cA.cCur_Calificacion) as promedio from empleado 
      e join c_asociados cA on e.E_ID = cA.Empleado_ID join pais p on e.E_ID = p.P_ID where 
      p.Pais_ID = '{$codP}';");
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

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>id de cursos</th>
        <th>cantidad de empleados</th>
      </tr>
    </thead>
    <tbody>
      <?php
    
      if (isset($_POST['consulta_3_4'])) {
        $res = new consultas;
        $fila = $res->consulta_3Y4($_POST['consultas_3_4']);
        if ($fila->num_rows > 0) {
          try {
            while ($f = $fila->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $f["ID"] . "</td>";
              echo "<td>" . $f["totalEmp"] . "</td>";
              echo "</tr>";
            }
          } catch (ErrorException) {
            echo "<tr>";
            echo "<td>" . "no se obtuvo el dato" . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No se encontraron datos</td></tr>";
        }
      }
      elseif(isset($_POST['consulta_5_6'])) {
        $res = new consultas;
        $fila = $res->consulta_5Y6($_POST['consultas_5_6']);
        try{
          while ($f = $fila->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $f["ID"] . "</td>";
            echo "<td>" . $f["Empleados_ID"] . "</td>";
            echo "<td>" . $f["Curso_ID"] . "</td>";
            echo "<td>" . $f["cCur_Calificacion"] . "</td>";
            echo "<td>" . $f["cCur_EstadoProgreso"] . "</td>";
            echo "<td>" . $f["cCur_FechaFin"] . "</td>";
            echo "<td>" . $f["cCur_HorasTotales"] . "</td>";
            echo "</tr>";
          }
        }catch(ErrorException){
          echo "<tr>";
          echo "<td>" . "no se obtuvo el dato" . "</td>";
          echo "</tr>";
        }
        }else if(isset($_POST['consulta_8_11'])) {
        $res = new consultas;
        $fila = $res->consulta_8_11($_POST['consultas_5_6']);
        try{
          while ($f = $fila->fetch_assoc()) {
            echo "<h1>".$f['numero_cursos']."</h1>";
          }
        }catch (ErrorException) {
          echo "<tr>";
          echo "<td>" . "no se obtuvo el dato" . "</td>";
          echo "</tr>";
        }
      }elseif(isset($_POST['consulta_12_13'])) {
        $res = new consultas;
        $fila = $res->consulta_12Y13($_POST['consultas_12_13']);
        try{
          while ($f = $fila->fetch_assoc()) {
            echo "<h1>".$f['numero_cursos']."</h1>";
          }
        }catch (ErrorException) {
          echo "<h1>" . "no se obtuvo el dato" . "</h1>";
        }
      }
      else{
        $res = new consultas;
        $fila = $res->consulta_14_17($_POST['consultas_14_17']);
        try{
          while ($f = $fila->fetch_assoc()) {
            echo "<h1>".$f['promedio']."</h1>";
          }
        }catch (ErrorException) {
          echo "<h1>" . "no se obtuvo el dato" . "</h1>";
        }
      }
      ?>
    </tbody>
  </table>
</body>

</html>