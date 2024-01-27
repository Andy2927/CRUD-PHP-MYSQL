<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disney</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
</head>
<body>

    <?php
    
      $conexion = mysqli_connect("db", "root", "test", "disney");
      

      if(!isset($_POST["accion"])) {
        $_POST["accion"] = "";
      }

      if($_POST["accion"] == "eliminarPersonaje") {
        $borra = "DELETE FROM personaje WHERE id_Personaje=\"$_POST[id_Personaje]\"";
        mysqli_query($conexion, $borra);
      }

      if($_POST["accion"] == "insertarPersonaje") {
        $inserta = "INSERT INTO personaje VALUES (\"$_POST[id_Personaje]\", \"$_POST[nombre]\", \"$_POST[pelicula]\", \"$_POST[actorDoblaje]\")";
        mysqli_query($conexion, $inserta);
       }

       if($_POST["accion"] == "modificarPersonaje") {
        $modifica = "UPDATE personaje SET id_Personaje=\"$_POST[id_Personaje]\", nombre=\"$_POST[nombre]\", pelicula=\"$_POST[pelicula]\", actorDoblaje=\"$_POST[actorDoblaje]\" WHERE
        id_Personaje=\"$_POST[id_PersonajeAntiguo]\"";
        mysqli_query($conexion, $modifica);
       }

       //---------------------------------------------------------------------------------

      if($_POST["accion"] == "eliminarPelicula") {
        $borra = "DELETE FROM pelicula WHERE id_Pelicula=\"$_POST[id_Pelicula]\"";
        mysqli_query($conexion, $borra);
      }

      if($_POST["accion"] == "insertarPelicula") {
        var_dump($_POST);
        $inserta = "INSERT INTO pelicula VALUES (\"$_POST[id_Pelicula]\", \"$_POST[nombre]\", \"$_POST[año]\", \"$_POST[puntuacion]\")";
        mysqli_query($conexion, $inserta);
       }

       if($_POST["accion"] == "modificarPelicula") {
        $modifica = "UPDATE pelicula SET id_Pelicula=\"$_POST[id_Pelicula]\", nombre=\"$_POST[nombre]\", año=\"$_POST[año]\", puntuacion=\"$_POST[puntuacion]\" WHERE
        id_Pelicula=\"$_POST[id_PeliculaAntiguo]\"";
        mysqli_query($conexion, $modifica);
       }

      $consultaPersonaje = mysqli_query($conexion, "SELECT * FROM personaje");

      $consultaPelicula = mysqli_query($conexion, "SELECT * FROM pelicula");
    ?>

    <br>
    <div class="container">

      <div class="card">
        <h1 class="text-center">Personajes Disney</h1>

          <table class="table table-striped">
            <tr>
              <th>id_Personaje</th>
              <th>Nombre</th>
              <th>Película</th>
              <th>Actor de doblaje</th>
            </tr>

            <?php
              while ($registro = mysqli_fetch_array($consultaPersonaje)) {
            ?>
                <tr>
                  <td><?= $registro['id_Personaje'] ?></td>
                  <td><?= $registro['nombre'] ?></td>
                  <td><?= $registro['pelicula'] ?></td>
                  <td><?= $registro['actorDoblaje'] ?></td>
                  <td>
                    <form action="index.php" method="post">
                      <input type="hidden" name="accion" value="eliminarPersonaje">
                      <input type="hidden" name="id_Personaje" value="<?= $registro['id_Personaje'] ?>">
                      <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                        Eliminar
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="modifica-personaje.php" method="post">
                      <input type="hidden" name="id_Personaje" value="<?= $registro['id_Personaje'] ?>">
                      <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                      <input type="hidden" name="pelicula" value="<?= $registro['pelicula'] ?>">
                      <input type="hidden" name="actorDoblaje" value="<?= $registro['actorDoblaje'] ?>">
                      <button type="submit" class="btn btn-primary">
                        <i class="bi bi-pencil"></i>
                        Modificar
                      </button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            ?>
            <form action="index.php" method="post">
              <input type="hidden" name="accion" value="insertarPersonaje">
              <tr>
                <td><input type="text" name="id_Personaje" size="10" require></td>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="pelicula"></td>
                <td><input type="text" name="actorDoblaje" size="10"></td>
                <td>
                  <button type="submit" class="btn btn-success">
                    <i class="bi bi-floppy"></i>
                    Añadir
                  </button>
                </td>
                <td></td>
              </tr>
            </form>
          </table>
      </div> 
      
      <div class="card mt-5">
        <h1 class="text-center">Películas Disney</h1>

          <table class="table table-striped">
            <tr>
              <th>id_Pelicula</th>
              <th>Nombre</th>
              <th>Año</th>
              <th>Puntuación</th>
            </tr>

            <?php
              while ($registro = mysqli_fetch_array($consultaPelicula)) {
            ?>
                <tr>
                  <td><?= $registro['id_Pelicula'] ?></td>
                  <td><?= $registro['nombre'] ?></td>
                  <td><?= $registro['año'] ?></td>
                  <td><?= $registro['puntuacion'] ?></td>
                  <td>
                    <form action="index.php" method="post">
                      <input type="hidden" name="accion" value="eliminarPelicula">
                      <input type="hidden" name="id_Pelicula" value="<?= $registro['id_Pelicula'] ?>">
                      <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                        Eliminar
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="modifica-pelicula.php" method="post">
                      <input type="hidden" name="id_Pelicula" value="<?= $registro['id_Pelicula'] ?>">
                      <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                      <input type="hidden" name="año" value="<?= $registro['año'] ?>">
                      <input type="hidden" name="puntuacion" value="<?= $registro['puntuacion'] ?>">
                      <button type="submit" class="btn btn-primary">
                        <i class="bi bi-pencil"></i>
                        Modificar
                      </button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            ?>
            <form action="index.php" method="post">
              <input type="hidden" name="accion" value="insertarPelicula">
              <tr>
                <td><input type="text" name="id_Pelicula" size="10" require></td>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="año"></td>
                <td><input type="text" name="puntuacion" size="10"></td>
                <td>
                  <button type="submit" class="btn btn-success">
                    <i class="bi bi-floppy"></i>
                    Añadir
                  </button>
                </td>
                <td></td>
              </tr>
            </form>
          </table>
      </div>
    </div>
      <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
