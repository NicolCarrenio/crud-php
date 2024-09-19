<?php
    require_once "Conexion.php";

    $conexionDam = new Conexion();
    $conexion = $conexionDam->conectar();
    
    $sql = $conexion->prepare("
        SELECT * FROM TiposDocumentos
    ");
    $sql->execute();
    $tiposDocumentos = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="validar.php" method="post">
    
    <label for="">Tipos de Documentos</label>
    <select name="tipoDocumento" id="tipoDocumento">
        <option value="0">Seleccione un tipo de documento</option>
    <?php
        foreach ($tiposDocumentos as $tipoDocumento) {
    ?>
            <option value="<?=$tipoDocumento['codigo']?>"><?=$tipoDocumento['glosa']?></option>
    <?php
        }
    ?>
    </select>

    <button type="submit">Validar</button>
</form>

<script src="validador.js"></script>
</body>
</html>