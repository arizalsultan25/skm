<?= $this->extend('opd/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Unsur Survei</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testingg">Home</a></li>
                    <li class="breadcrumb-item active">Unsur-Survei</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/opd/unsursurvei/update/<?= $surveiunsur->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $surveiunsur->id ?>">
                        <?= csrf_field(); ?>
                        <div class="card-header bg-primary">
                            Update Unsur Survei
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Referensi Unsur</label>
                                <select name="referensiunsur_id" class="custom-select">
                                    <option selected>Pilih Survei</option>
                                    <?php foreach ($referensiunsur as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $surveiunsur->ref_id) ? 'selected' : '' ?>><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unsur</label>
                                <select name="survei_id" class="custom-select">
                                    <option selected>Pilih Nama Unsur</option>
                                    <?php foreach ($survei as $item) : ?>
                                        <option value="<?= $item->id ?>" <?= ($item->id == $item->survei_id) ? 'selected' : '' ?>><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
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