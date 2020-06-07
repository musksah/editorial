<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Empleado</title>
    <style>
        *{
            font-family: sans-serif,Arial, Helvetica;
        }
        h1,
        h2 {
            text-align: center;
        }

        table,
        thead,
        tr,
        th,
        td {
            border: 1px solid;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        thead {
            background-color: greenyellow;
        }
    </style>
</head>

<body>
    <h1>Reporte de Empleados por Sucursal</h1>
    <?php foreach ($empleados_list['data'] as $key_list => $list) : ?>
        <div class="table-report">
            <h2>Sucursal <?= $key_list ?></h2>
            <table class="egt">
                <thead>
                    <tr>
                        <?php foreach ($empleados_list['headers'] as $key_header => $val_header) : ?>
                            <th><?= $val_header ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $val_empleado) : ?>
                        <tr>
                            <?php foreach ($val_empleado as $key_empleado => $values) : ?>
                                <td><?= $values ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
</body>

</html>