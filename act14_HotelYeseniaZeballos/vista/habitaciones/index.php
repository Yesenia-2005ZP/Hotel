
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Habitaciones</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor">

    <div class="encabezado">
        <h1>Gestión de Habitaciones</h1>

        <a href="index.php?accion=nuevo" class="btn btn-nuevo">
            + Nueva habitación
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Piso</th>
                <th>Tipo</th>
                <th>Precio por noche</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($habitaciones)): ?>
            <tr>
                <td colspan="7" class="sin-productos">
                    No hay habitaciones registradas.
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($habitaciones as $habitacion): ?>
                <tr>
                    <td><?= $habitacion->getId() ?></td>

                    <td>
                        <?= htmlspecialchars($habitacion->getNumero()) ?>
                    </td>

                    <td><?= $habitacion->getPiso() ?></td>

                    <td>
                        <?= htmlspecialchars($habitacion->getTipo()) ?>
                    </td>

                    <td>
                        Bs. <?= number_format(
                            (float) $habitacion->getPrecio(), 2
                        ) ?>
                    </td>

                    <td>
                        <?php if ($habitacion->getFoto() !== ""): ?>
                            <a href="<?= htmlspecialchars($habitacion->getFoto()) ?>"
                               target="_blank" rel="noopener noreferrer">
                                Ver foto
                            </a>
                        <?php else: ?>
                            Sin foto
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="index.php?accion=editar&id=<?= $habitacion->getId() ?>"
                           class="btn btn-editar">
                            Editar
                        </a>

                        <a href="index.php?accion=eliminar&id=<?= $habitacion->getId() ?>"
                           class="btn btn-eliminar"
                           onclick="return confirm('¿Está seguro de eliminar esta habitación?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
