<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jawaban</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testing">Home</a></li>
                    <li class="breadcrumb-item active">Jawaban</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/admin/jawaban/update/<?= $jawaban->id ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $jawaban->id ?>">
                        <div class="card-header bg-primary">
                            Update Jawaban
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <select name="ref_id" class="custom-select">
                                    <option selected>Pilih Pertanyaan</option>
                                    <?php foreach ($pertanyaan as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $jawaban->pertanyaan_id) ? 'selected' : '' ?>><?= $item->pertanyaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jawaban</label>
                                <input type="text" class="form-control" name="jawaban" value="<?= $jawaban->jawaban ?>" placeholder="Tulis Jawaban">
                            </div>
                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number" class="form-control" name="nilai" value="<?= $jawaban->nilai ?>" placeholder="Tulis Bobot">
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