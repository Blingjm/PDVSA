<?php
include_once('php/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDVSA - Histórico de registros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
    <link href="vista/index.css" rel="stylesheet">
  
  </head>

  <body>
    
<main>

  <div class="b-example-divider"></div>
  <div class="b-example-divider"></div>

  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Histórico de registros</h1><br>
        
        <div class="container">

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Fecha y hora</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Zona</th>
                    <th scope="col">PSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT pozo.fecha, pozo.nombre, pozo.zona, registro.psi FROM pozo JOIN registro ON pozo.ID = registro.ID_pozo";
                $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $total_rows = mysqli_num_rows($rs);
                if($total_rows > 0){
                    while($rows  = mysqli_fetch_array($rs)){
                        ?>
                        <tr>
                            <td><?php echo $rows['fecha']; ?></td>
                            <td><?php echo $rows['nombre']; ?></td>
                            <td><?php echo $rows['zona']; ?></td>
                            <td><?php echo $rows['psi']; ?></td>
                        </tr>
                <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="4">No hay Registros en la BD</td>
                    </tr>
            <?php 
                }
                ?>
            </tbody>
        </table>

    </div>
<br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <a class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="registro.php" role="button">Realizar un registro</a>
          <a class="btn btn-outline-secondary btn-lg px-4" href="fechas.php" role="button">Ver graficas</a>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="bootstrap-docs.png" alt="" width="720">
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>
  <div class="b-example-divider mb-0"></div>


</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>

</html>

