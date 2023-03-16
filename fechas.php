<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDVSA - Grafica</title>

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
        <h1 class="display-4 fw-bold lh-1">PDVSA</h1><br>
        <p>Seleccione el rango de fechas para generar la grafica comparativa</p>
    <form action="php/operaciones.php" method="post" >
        <div class="row g-3">
            <div class="col-md">
            <div class="form-floating">
                <input type="date" class="form-control" id="fechaEntrada" name="fechaEntrada" required min="2022-11-23" max="2024-11-23" onkeydown="return false">
                <label>Desde:</label>
            </div>

            </div>
            <div class="col-md">
                <div class="form-floating">
                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida" required min="2022-11-24" max="2024-11-24" onkeydown="return false">
                <label>Hasta:</label>
                </div>
            </div>

            <input type="submit" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" id="buscar" name="btn3" value="Generar">

        </div>
    </form>

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

