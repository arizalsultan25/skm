<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Akun OPD</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testing">Home</a></li>
                    <li class="breadcrumb-item active">Akun OPD</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <?php if (isset($_SESSION['pesan'])) { ?>
                <p class="text-danger mt-3"><?= $_SESSION['pesan'] ?></p>
            <?php } ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Tambah Akun OPD
                    </div>
                    <form action="/admin/akunopd/create" method="POST">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Unit Layanan</label>
                                <select name="unit_id" class="custom-select">
                                    <option selected>Pilih Unit Layanan</option>
                                    <?php foreach ($unitlayanan as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Unik</label>
                                <input type="text" placeholder="Kode Unik" name="kode" value="<?php echo old('kode'); ?>" class="form-control <?php echo ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('kode'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Akun OPD
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama OPD</th>
                                    <th>Kode Unik</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($akunopd as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->unitlayanan_nama  ?></td>
                                        <td><?= $item->kode ?></td>
                                        <td>
                                            <a href="/admin/akunopd/update/<?= $item->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="/admin/akunopd/<?= $item->id ?>" class="d-inline" method="POST">
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