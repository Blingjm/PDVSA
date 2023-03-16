<?php

include_once('conexion.php');

if(isset($_POST['btn']) && $_POST['btn'] == "Registrar"){

    $nombre   = $_POST['nombre'];
    $psi = $_POST['psi'];
    $zona   = $_POST['zona'];

    $query = "INSERT INTO pozo (nombre, zona) VALUES ('$nombre', '$zona')";

    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    
    if($rs == true){

        $query2 = "SELECT MAX(ID) FROM pozo";

        $rs2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $id = 0;
        if ($row = mysqli_fetch_row($rs2)) {
            $id = trim($row[0]);
        }
            
            $query3 = "INSERT INTO registro (psi, ID_pozo) VALUES ('$psi', '$id')";

            $rs3 = mysqli_query($conn, $query3) or die  (mysqli_error($conn));
        
            mysqli_close($conn);
        
            if($rs3 == true){
                header('Location: ../index.php');
            }
            else {
                echo 'Error al final';
            }

    }
    else{
        echo 'Error en el inicio';
    }

    }

    if(isset($_POST['btn3']) && $_POST['btn3'] == "Generar"){
        echo 'Hola';

        $val = 1;

        $desde = $_POST['fechaEntrada'];
        $hasta = $_POST['fechaSalida'];

        session_start();

        if (!isset($_SESSION['fdesde'])){
            $_SESSION['fdesde'] = '';
        }

        if (!isset($_SESSION['fhasta'])){
            $_SESSION['fhasta'] = '';
        }

        $_SESSION['fdesde'] = $desde;
        $_SESSION['fhasta'] = $hasta;
        
        if($val == 1){
            header('Location: ../grafica.php');
        }
        

    }

?>