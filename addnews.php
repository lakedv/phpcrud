<?php include('server.php');

if (isset($_GET['modif'])) {

    $id = $_GET['modif'];
    $edit_state = true;

    $rec = mysqli_query($db, "SELECT * FROM news WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $id = $record['id'];
    $titulo = $record['titulo'];
    $texto = $record['texto'];
    $fecha = $record['fecha'];
    $escritor = $record['escritor'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <a href="adduser.php">Agregar Escritor</a>
    <a href="index.php">Regresar</a>
</head>

<body>
    <form name="form" method="post" action="server.php">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?php echo $titulo; ?>">
        </div>
        <div class="input-group">
            <label>Noticia</label>
            <input type="textarea" name="texto" value="<?php echo $texto; ?>">
        </div>
        <div class="input-group">
            <label>Fecha</label>
            <input type="date" name="fecha" value="<?php echo $fecha; ?>">
        </div>
        <div class="input-group">
            <label>Escritor</label>
            <input type="text" name="escritor" value="<?php echo $escritor; ?>">
        </div>
        <div class="input-group">

            <?php if ($edit_state == false) : ?>
                <button type="submit" name="upload" class="btn">Guardar</button>
            <?php else : ?>
                <button type="submit" name="modif" class="btn">Actualizar</button>
            <?php endif ?>

        </div>
    </form>
</body>

</html>