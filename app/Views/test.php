<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <td>id</td>
            <td>Nama dinas</td>
            <td>Aksi</td>
        </thead>
        <tbody>
        <?php
        foreach($opd as $data){
        ?>
            <tr>
                <td><?= $data['id_opd'] ?></td>
                <td><?= $data['nama_opd'] ?></td>
                <td><a href="<?= base_url('home/deleteopd/'.$data['opd_id']) ?>">Delete</a></td>
            </tr>
        <?php }
    ?>
        </tbody>
    </table>
</body>
</html>