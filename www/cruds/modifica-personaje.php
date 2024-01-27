<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disney Modifica personaje</title>
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
        $id_Personaje = $_POST["id_Personaje"];
        $nombre = $_POST["nombre"];
        $pelicula = $_POST["pelicula"];
        $actorDoblaje = $_POST["actorDoblaje"];
    ?>
    <br>
    <div class="container">

      <div class="card">
        <h1 class="text-center">Disney Modifica personaje</h1>

            <form action="index.php" method="post">
                <input type="hidden" name="accion" value="modificarPersonaje">
                <input type="hidden" name="id_PersonajeAntiguo" value="<?= $id_Personaje ?>">
                <div class="mb-3 aire">
                    <label for="id_Personaje" class="form-label">id_Personaje</label>
                    <input type="text"
                    class="form-control"
                    id="id_Personaje" name="id_Personaje"
                    value="<?= $id_Personaje ?>"
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
                    <label for="pelicula" class="form-label">Película</label>
                    <input type="text"
                    class="form-control"
                    id="pelicula" name="pelicula"
                    value="<?= $pelicula ?>"
                    size="10">
                </div>

                <div class="mb-3 aire">
                    <label for="actorDoblaje" class="form-label">Actor de doblaje</label>
                    <input type="text"
                    class="form-control"
                    id="actorDoblaje" name="actorDoblaje"
                    value="<?= $actorDoblaje ?>"
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