<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Notepad</title>
</head>
<body>
<?php
$error = '';
if (isset($_POST['note']) && isset($_POST['filename'])) {
    $note = $_POST['note'];
    $filename = $_POST['filename'];
    if (!empty($filename)) {
        if (!isset($_POST['original_filename']) || $_POST['original_filename'] !== $filename . '.txt') {
            if (file_exists($filename . '.txt')) {
                $error = 'Ya existe una nota con ese nombre. Por favor elige otro nombre.';
            } else {
                if (isset($_POST['original_filename'])) {
                    rename($_POST['original_filename'], $filename . '.txt');
                }
                file_put_contents($filename . '.txt', $note);
            }
        } else {
            file_put_contents($filename . '.txt', $note);
        }
    } else {
        $error = 'Debes especificar un nombre para la nota.';
    }
}

if (isset($_GET['delete'])) {
    if (file_exists($_GET['delete'])) {
        unlink($_GET['delete']);
    }
}

$notes = glob('*.txt');

$selected_note = '';
$selected_filename = '';
if (isset($_GET['edit'])) {
    if (file_exists($_GET['edit'])) {
        $selected_note = file_get_contents($_GET['edit']);
        $selected_filename = basename($_GET['edit'], '.txt');
    }
}
?>

<?php if (!empty($error)): ?>
<p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="post">
    <input type="hidden" name="original_filename" value="<?php echo htmlspecialchars($selected_filename); ?>.txt">
    <label for="filename">Nombre del archivo:</label>
    <input class="form-control" style="width:auto;" type="text" id="filename" name="filename"  value="<?php echo htmlspecialchars($selected_filename); ?>"><br><br>
    <label for="note">Nota:</label><br>
    <div class="col-7">
    <textarea id="note" name="note" class="form-control w-75" rows="10" > <?php echo htmlspecialchars($selected_note); ?></textarea><br><br>
    </div>
    <input type="submit" class="btn btn-primary" value="Guardar">
</form>

<h2>Notas guardadas</h2>
     <div class="card-group">
<?php foreach ($notes as $note): ?>
  <div class="col-sm-3">
    <div class="card" style="width: 19em;">
      <div class="card-body" style="width: 19em;">
      <h5 class="card-title"><?php echo htmlspecialchars(basename($note, '.txt')); ?></h5>
        <a href="?edit=<?php echo urlencode($note); ?>" class="btn btn-secondary">Editar</a> 
        <a href="?delete=<?php echo urlencode($note); ?>" class="btn btn-secondary" onclick="return confirm('¿Estás seguro de que quieres eliminar esta nota?');">Eliminar</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
</body>
</html>
