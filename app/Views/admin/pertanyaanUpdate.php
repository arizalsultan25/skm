<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pertanyaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pertanyaan</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Ubah Pertanyaan
                    </div>
                    <form action="/admin/pertanyaan/update/<?= $pertanyaan->id ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $pertanyaan->id ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Referensi Unsur</label>
                                <select name="ref_id" class="custom-select">
                                    <option selected>Pilih Referensi Unsur</option>
                                    <?php foreach ($refUnsur as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $pertanyaan->ref_id) ? 'selected' : '' ?>><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" value="<?= $pertanyaan->pertanyaan ?>" placeholder="Tulis Pertanyaan">
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