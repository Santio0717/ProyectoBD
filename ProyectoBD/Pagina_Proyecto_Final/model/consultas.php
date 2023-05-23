<?php
require_once "../model/procesar.php";
class consultas{
    private $connection;

    public function __construct(){
        $this->connection = controladorBD::connect();
    }

    public function consulta_1(){
        return $this->connection->query('select * from empleado limit 10;');
    }

    public function consulta_2(){
        return $this->connection->query('select * from c_asociados limit 10;');
    }

    public function consulta_3Y4($paisCons3y4){
        return $this->connection->query("select cA.ID, count(e.E_ID) AS totalEmp FROM 
                            c_asociados cA JOIN empleado e ON cA.ID = e.E_ID JOIN pais p ON 
                            e.E_ID = p.P_ID WHERE p.P_ID = '{$paisCons3y4}' GROUP BY cA.ID ORDER BY 
                            totalEmp desc limit 5;");
    }

    public function consulta_5Y6(){
        return $this->connection->query(
            "select c.C_ID, COUNT(e.E_ID) AS total_empleados FROM cursos c JOIN empleados
             e ON c.Empleados_ID = e.E_ID JOIN sedes s ON e.Sede_ID = s.Sede_ID WHERE s.Pais 
             = 'Colombia' AND c.Modalidad = 'Virtual'GROUP BY c.Curso_ID ORDER BY total_empleados 
             DESC LIMIT 10;");
    }

    public function consulta_8_11(){
        return $this->connection->query('select * from empleado limit 10;');
    }

    public function consulta_12Y13(){
        return $this->connection->query('select * from empleado limit 10;');
    }

    public function consulta_14_17(){
        return $this->connection->query('select * from empleado limit 10;');
    }
}