<?php
include 'utilidades_texto.php';


$frases = [
    "La soda se esta calentando apurate",
    "Panama es una pais hermposo pero muy caluroso",
    "PHP es un lenguaje sencillo"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Texto</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px  black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Analisis de Texto</h1>
    <table>
        <thead>
            <tr>
                <th>Frase</th>
                <th>Numero de Palabras</th>
                <th>Numero de Vocales</th>
                <th>Palabras Invertidas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frases as $frase): ?>
            <tr>
                <td><?php echo htmlspecialchars($frase); ?></td>
                <td><?php echo contar_palabras($frase); ?></td>
                <td><?php echo contar_vocales($frase); ?></td>
                <td><?php echo invertir_palabras($frase); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
