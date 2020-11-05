<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Unit Layanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Unit Layanan</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Tambah Unit Layanan
                    </div>
                    <form action="/admin/unitlayanan/create" method="POST">
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama OPD</label>
                                <input type="text" placeholder="Nama Unit Layanan" name="nama" value="<?php echo old('nama'); ?>" class="form-control <?php echo ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Unit Layanan
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama OPD</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($units as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama; ?></td>
                                        <td>
                                            <a href="/admin/unitlayanan/update/<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="/admin/unitlayanan/<?= $item->id ?>" class="d-inline" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>