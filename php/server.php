<?php

    include "mysql.php";
    if(isset($_REQUEST['compu_filter'])){
        $tipo = $_POST['tipo'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $nombre = $_POST['nombre'];
        $and = false;

        $query1 = "SELECT * FROM compus WHERE";

        if($tipo == "" && $fecha1 == "" && $fecha2 == "" && $nombre = ""){
            $query1 = "SELECT * FROM compus";
        }else{
            if($tipo != "0"){
                $q_tipo = "";
                    if($and == true){
                        $q_tipo = " AND `tipo` LIKE '%$tipo%'";
                    }else{
                        $q_tipo = " `tipo` LIKE '%$tipo%'";
                        $and = true;
                    }
                    $query1 .= $q_tipo;
            }

            if($fecha1 != "" && $fecha2 != ""){
                $q_fecha = "";
                    if($and == true){
                        $q_fecha = " AND `fecha` BETWEEN '$fecha1' AND '$fecha2'";
                    }else{
                        $q_fecha = " `fecha` BETWEEN '$fecha1' AND '$fecha2'";
                        $and = true;
                    }
                    $query1 .= $q_fecha;
            }

            if($nombre != "") {
                $q_nombre = "";
            
                if ($and == true) {
                    $q_nombre = " AND `nombre` LIKE '%$nombre%'";
                }else{
                    $q_nombre = " `nombre` LIKE '%$nombre%'";
                    $and = true;
                }
                
                $query1 .= $q_nombre;
            }
            
        }

        $data = mysqli_query($conn, $query1);

        $i = 0;

        while($rows = mysqli_fetch_assoc($data)){
            $i++;

            echo "
                 <tr>
                     <td>$i</td>
                     <td>$rows[nombre]</td>
                     <td>$rows[tipo]</td>
                     <td>$rows[marca]</td>
                     <td>$rows[modelo]</td>
                     <td>$rows[cantidad]</td>
                     <td>$rows[estado]</td>
                     <td>$rows[fecha]</td>
                     <td></td>
                 </tr>
             ";
        }
        
    }
?>