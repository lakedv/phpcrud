<?php   
    session_start();
        //usuario
        $id = "";
        $nombre = "";
        $apellido = "";
        $edad = "";
        //noticia
        $titulo = "";
        $texto = "";
        $fecha = "";
        $escritor = "";
        $edit_state = false;


$db = mysqli_connect('localhost','admin', '1234', 'crud');

    if(isset($_POST['save'])){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        
        $query = "INSERT INTO users (nombre, apellido, edad) VALUES('$nombre', '$apellido', '$edad')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Usuario agregado correctamente";
        header('location: index.php');
    
    }

    if(isset($_POST['upload'])){
        
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $fecha = $_POST['fecha'];
        $escritor = $_POST['escritor'];

        
        $query = "INSERT INTO news (titulo, texto, fecha, escritor) VALUES('$titulo', '$texto', '$fecha', '$escritor')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Noticia Agregada";
        header('location: index.php');
    
    }

    //update
    if(isset($_POST['edit'])) {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];

        mysqli_query($db, "UPDATE users SET nombre='$nombre', apellido='$apellido', edad='$edad' WHERE id=$id");
        $_SESSION['msg'] = "Usuario editado correctamente";
        header('location: index.php');
    }
    if(isset($_POST['modif'])) {

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $fecha = $_POST['fecha'];
        $escritor = $_POST['escritor'];

        mysqli_query($db, "UPDATE news SET titulo='$titulo', texto='$texto', fecha='$fecha', escritor='$escritor' WHERE id=$id");
        $_SESSION['msg'] = "Noticia Actualizada.";
        header('location: index.php');
    }

    //delete
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE id=$id");
        $_SESSION['msg'] = "Usuario eliminado";
        header('location: index.php');
    }
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM news WHERE id=$id");
        $_SESSION['msg'] = "Noticia Eliminada";
        header('location: index.php');
    }

    //getter
    $results = mysqli_query($db, "SELECT * FROM users");
    $noticias = mysqli_query($db, "SELECT * FROM news");

?>