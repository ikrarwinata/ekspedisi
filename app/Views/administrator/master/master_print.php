<!doctype html>
<html>

<head>
    <title><?php echo ($Page->title); ?></title>
    <base href="<?php echo base_url() ?>">
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .word-table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            padding: 3px 5px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2><?php echo ($Page->title); ?></h2>
        </div>
    </div>
    <hr>
    <div class="col-lg-12 text-center">
        <h3><?php echo ($Page->subtitle[0]); ?></h3>
    </div>
    <?php echo (dayToString() . ", " . date("d") . " " . monthToString() . " " . date("Y")); ?>
    <hr>
    <table class="word-table" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>
                Resi
            </th>
                <th>
                Id_olshop
            </th>
                <th>
                Foto
            </th>
                <th>
                Harga
            </th>
                <th>
                Status
            </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) : ?>
                <tr>
                    <td><?php echo ($value->resi) ?></td>
                    <td><?php echo ($value->id_olshop) ?></td>
                    <td class="text-center">
                            <?php if (isset($value->foto) && $value->foto != NULL): ?>
                            <a href="<?php echo (base_url($value->foto)) ?>" class="btn btn-sm btn-default">File</a>
                        <?php endif ?>
                    </td>
                    <td class="text-center"><?php echo ( $value->harga) ?></td>
                    <td><?php echo ($value->status) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<script type="text/javascript">
    window.print();
    timerInterval = setInterval(() => {
        clearInterval(timerInterval);
        window.close();
    }, 3500);
</script>
</html>