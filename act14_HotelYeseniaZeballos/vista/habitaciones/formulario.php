
<?php
$editando = $habitacion->getId() !== null;
$accionFormulario = $editando ? "actualizar" : "guardar";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editando ? "Editar" : "Registrar" ?> habitación</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>

<div class="contenedor formulario">

    <h1>
        <?= $editando ? "Editar habitación" : "Registrar habitación" ?>
    </h1>

    <form method="POST" action="index.php?accion=<?= $accionFormulario ?>">

        <?php if ($editando): ?>
            <input type="hidden" name="id"
                   value="<?= $habitacion->getId() ?>">
        <?php endif; ?>

        <label for="numero">Número de habitación:</label>
        <input type="text"
               id="numero"
               name="numero"
               maxlength="20"
               required
               value="<?= htmlspecialchars($habitacion->getNumero()) ?>"
               placeholder="Ej. 101">

        <label for="piso">Piso:</label>
        <input type="number"
               id="piso"
               name="piso"
               min="1"
               step="1"
               required
               value="<?= htmlspecialchars((string) $habitacion->getPiso()) ?>">

        <label for="tipo">Tipo de habitación:</label>
        <select id="tipo" name="tipo" required>
            <?php
            $tipos = [
                "Simple",
                "Doble",
                "Matrimonial",
                "Triple",
                "Familiar",
                "Suite"
            ];

            foreach ($tipos as $tipo):
            ?>
                <option value="<?= $tipo ?>"
                    <?= $habitacion->getTipo() === $tipo ? "selected" : "" ?>>
                    <?= $tipo ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="precio">Precio por noche (Bs.):</label>
        <input type="number"
               id="precio"
               name="precio"
               min="0"
               step="0.01"
               required
               value="<?= htmlspecialchars((string) $habitacion->getPrecio()) ?>"
               placeholder="180.00">

        <label for="foto">Foto (ruta o URL):</label>
        <input type="text"
               id="foto"
               name="foto"
               maxlength="255"
               value="<?= htmlspecialchars($habitacion->getFoto()) ?>"
               placeholder="imagenes/habitacion101.jpg">

        <div class="acciones-formulario">
            <a href="index.php" class="btn btn-cancelar">
                Cancelar
            </a>

            <button type="submit" class="btn btn-guardar">
                <?= $editando ? "Actualizar habitación" : "Guardar habitación" ?>
            </button>
        </div>

    </form>

</div>

</body>
</html>
