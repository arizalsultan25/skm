<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Domain Survei</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Domain-Survei-Update</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Update Domain Survei
                    </div>
                    <form action="/admin/domainsurvei/update/<?= $domainsurvei->id; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_domainsurvei" value="<?= $domainsurvei->id; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Domain</label>
                                <select name="website_id" class="custom-select">
                                    <?php foreach ($WebsiteAll as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $domainsurvei->website_id) ? 'selected' : '' ?>><?= $item->domain; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php if ($validation->hasError('website_id')) {
                                        echo $validation->getError('website_id');
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Layanan</label>
                                <select name="layanan_id" class="custom-select">
                                    <?php foreach ($LayananAll as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $domainsurvei->layanan_id) ? 'selected' : '' ?>><?= $item->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php if ($validation->hasError('layanan_id')) {
                                        echo $validation->getError('layanan_id');
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