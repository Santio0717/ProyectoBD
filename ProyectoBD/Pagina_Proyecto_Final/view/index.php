<?php
$resp = "";
require_once "../model/procesar.php";
class consultas{
    private $connection;

    public function __construct(){
        $this->connection = controladorBD::connect();
    }
    public function consulta_3Y4($paisCons3y4){
        return $this->connection->query("select cA.ID, count(e.E_ID) AS totalEmp FROM 
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

    public function consulta_12Y13(){
        return $this->connection->query('select * from empleado limit 10;');
    }

    public function consulta_14_17($codP){
        return $this->connection->query("select avg(cA.cCur_Calificacion) as promedio from empleado 
        e join c_asociados cA on e.E_ID = cA.Empleado_ID join pais p on e.E_ID = p.P_ID where 
        p.Pais_ID = '{$codP}';");
    }
}
?>
<!DOCTYPE html>
<html |lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página HTML con PHP</title>
    <link rel="stylesheet" type="text/css" href="../style/index.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="main-content">
            <h1>CONSULTAS BASE DE DATOS</h1>
            <div class="links">
                <h3>Hipervínculos:</h3>
                <ul>
                    <li><a href="./pagina_consulta1.php">mostrar 10 empleados</a></li>
                    <li><a href="./pagina_consulta2.php">mostrar historico 10 cursos</a></li>
                    <li><a href="./pagina_consulta3.php">mostrar los 10 mejores empleados</a></li>
                </ul>
            </div>
            <h3>Campos de selección:</h3>
            <div class="select-fields">
                <form method="post" action="./pagina_consultas4.php">
                    <label for="opcion1">consultas 3 y 4:</label>
                    <select id="opcion1" name="consultas_3_4">
                        <option value="panama">panamá</option>
                        <option value="costa rica">costa Rica</option>
                    </select>
            <br>

                    <label for="opcion2">consulta 5 y 6:</label>
                    <select id="opcion2" name="consultas_5_6">
                        <option value="virtual">virtual</option>
                        <option value="presencial">presencial</option>
                    </select>
                    <br>

                    <label for="opcion3">consulta de 8 a 11:</label>
                    <select id="opcion3" name="consultas_8_11">
                        <option value="ingles">ingles</option>
                        <option value="espanol">español</option>
                        <option value="holandes">holandes</option>
                        <option value="frances">frances</option>
                    </select>
                    <br>

                    <label for="opcion4">consulta 12 a 13:</label>
                    <select id="opcion4" name="consultas_12_13">
                        <option value="ingles">no aprobado</option>
                        <option value="espanol">aprobado</option>>
                    </select>
                    <br>

                 
                    <button type="submit" name="submit">ejecuta la consulta seleccionada</button>
                </form>
            </div>
        </div>
    <br>
    <div class="footer">

    </div>
</body>

</html>