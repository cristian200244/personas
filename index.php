<?php
include_once("conexion.php");


$query  = "SELECT * FROM personas";
$peronas = mysqli_query($con, $query);
$perona = mysqli_fetch_assoc($peronas);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Formulario De Inscripción</h1>
    <div class="main">
        <form action="save.php" method="post">
            <label for="">Primer Nombre</label><br>
            <input type="text" name="primer_nombre" id="primer_nombre"><br>
            <label for="">Segundo Nombre</label><br>
            <input type="text" name="segundo_nombre" id="segundo_nombre"><br>
            <label for="">Primer Apellido</label><br>
            <input type="text" name="primer_apellido" id="primer_apellido"><br>
            <label for="">Segundo Apellido</label><br>
            <input type="text" name="segundo_apellido" id="segundo_apellido"><br>
            <label for="">sexo</label><br>

            <select name="id_sexo" id="id_sexo"><br>
                <option value="">seleccione una opcion</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
            <br>
            <label for="">Ciudad</label><br>
            <select name="id_ciudad" id="id_ciudad">
            <option value="">seleccione una opcion</option>
                <option value="cali">cali</option>
                <option value="bogota">bogota</option>
            </select>
            <br>
            <label for="">Fecha De Nacimmiento</label><br>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimient"><br><br>
            <button type="submit">enviar</button>
        </form>
    </div>

    <table>
        <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Sexo</th>
            <th>Ciudad</th>
            <th>Fecha De Nacimiento</th>
            <th colspan="2">Opciones</th>
        </tr>
        <?php
        if (mysqli_num_rows($peronas) > 0) {
            $pos = 1;

            while ($persona = mysqli_fetch_assoc($peronas)) {

        ?>
                <tr>
                    <td><?php echo $pos; ?></td>
                    <td><?php echo $persona['primer_nombre']; ?></td>
                    <td><?php echo $persona['id_sexo']; ?></td>
                    <td><?php echo $persona['ciudad']; ?></td>
                    <td><?php echo $persona['fecha_nacimiento']; ?></td>


                    <td><button><a href="delete.php?id=<?php echo $persona['id']; ?>">Eliminar</a></button></td>
                    <td><button><a href="editar.php?id=<?php echo $persona['id']; ?>">Editar</a></button></td>

                </tr>
            <?php $pos++;
            }
        } else { ?>
            <tr>
                <td colspan=5>No Hay datos Disponibles</td>
            </tr>

            <?php ?>
    </table>
<?php } ?>
</div>


</table>
</body>

</html>