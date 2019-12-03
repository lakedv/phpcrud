<?php include('server.php');

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $edit_state = true;

    $rec = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $id = $record['id'];
    $nombre = $record['nombre'];
    $apellido = $record['apellido'];
    $edad = $record['edad'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <a href="addnews.php">Agregar Noticia</a>
    <a href="index.php">Regresar</a>
</head>
<body>
<form name="form" method="post" action="server.php">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="input-group">
            <label>Apellido</label>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>">
        </div>
        <div class="input-group">
            <label>Edad</label>
            <input type="text" name="edad" value="<?php echo $edad; ?>">
        </div>
        <div class="input-group">

            <?php if ($edit_state == false) : ?>
                <button type="submit" name="save" class="btn">Guardar</button>
            <?php else : ?>
                <button type="submit" name="edit" class="btn">Actualizar</button>
            <?php endif ?>

        </div>
    </form>
</body>
</html>