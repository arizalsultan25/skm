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
                    <li class="breadcrumb-item active">Akun OPD-update</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Update Akun OPD
                    </div>
                    <form action="/admin/akunopd/update/<?php echo $akunopd->id; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="akunopd_id" value="<?php echo $akunopd->id; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Unit Layanan</label>
                                <select name="unitlayanan_id" class="custom-select">
                                    <?php foreach ($unitlayanan as $item) : ?>
                                        <option value="<?= $item->id ?>" <?php echo ($item->id == $layanan->unit_id) ? 'selected' : '' ?>><?= $item->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php if ($validation->hasError('unitlayanan_id')) {
                                        echo $validation->getError('unitlayanan_id');
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kode Unik</label>
                                <input type="text" name="kode" value="<?php echo (old('kode')) ? old('kode') : $akunopd->kode ?>" class="form-control <?php echo ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?php if ($validation->hasError('kode')) {
                                        echo $validation->getError('kode');
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>