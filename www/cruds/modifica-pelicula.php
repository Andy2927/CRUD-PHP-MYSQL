<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disney Modifica Película</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
  <style>

    .aire{
        padding: 20px;
    }

    a{
        text-decoration: none;
        color: white;
    }

  </style>
</head>
<body>
    <?php
        $id_Pelicula = $_POST["id_Pelicula"];
        $nombre = $_POST["nombre"];
        $año = $_POST["año"];
        $puntuacion = $_POST["puntuacion"];
    ?>
    <br>
    <div class="container">

      <div class="card">
        <h1 class="text-center">Disney Modifica película</h1>

            <form action="index.php" method="post">
                <input type="hidden" name="accion" value="modificarPelicula">
                <input type="hidden" name="id_PeliculaAntiguo" value="<?= $id_Pelicula ?>">
                <div class="mb-3 aire">
                    <label for="id_Pelicula" class="form-label">id_Pelicula</label>
                    <input type="text"
                    class="form-control"
                    id="id_Pelicula" name="id_Pelicula"
                    value="<?= $id_Pelicula ?>"
                    size="10">
                </div>
                
                <div class="mb-3 aire">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    class="form-control"
                    id="nombre" name="nombre"
                    value="<?= $nombre ?>"
                    size="10">
                </div>

                <div class="mb-3 aire">
                    <label for="año" class="form-label">Año</label>
                    <input type="text"
                    class="form-control"
                    id="año" name="año"
                    value="<?= $año ?>"
                    size="10">
                </div>

                <div class="mb-3 aire">
                    <label for="puntuacion" class="form-label">Puntuación</label>
                    <input type="text"
                    class="form-control"
                    id="puntuacion" name="puntuacion"
                    value="<?= $puntuacion ?>"
                    size="10">
                </div>

                <button type="submit" class="btn btn-success">Aceptar</button>
                
                <button type="submit" class="btn btn-danger">
                    <a href="index.php">Cancelar</a>
                </button>
            </form>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>