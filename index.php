<?php include('server.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <a href="adduser.php">Agregar Escritor</a>
    <a href="addnews.php">Agregar Noticia</a>
</head>

<body>

    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                ?>
        </div>
    <?php endif ?>

    <table>
        <thread>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th colspan="2">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['edad']; ?></td>
                    <td>
                        <a class="edit_btn" href="adduser.php?edit=<?php echo $row['id']; ?>">Update</a>
                    </td>
                    <td>
                        <a onclick="return deleteUsuario()" class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>


    <?php while ($row = mysqli_fetch_array($noticias)) { ?>
        <td>
            <a class="edit_btn" href="addnews.php?modif=<?php echo $row['id']; ?>">Update</a>
        </td>
        <td>
            <a onclick="return deleteNoticia()" class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
        </td>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <h1 class="card-title"><?php echo $row['titulo']; ?></h1>
                        <h5>Fecha de Emision: <?php echo $row['fecha']; ?></h5>
                        <p><?php echo $row['texto']; ?><br>Escritor: <?php echo $row['escritor']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>


</body>
<script>
    function deleteUsuario() {
        if (confirm("Eliminar?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script>
    function deleteNoticia() {
        if (confirm("Eliminar?")) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>