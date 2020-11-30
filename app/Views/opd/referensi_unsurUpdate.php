<?= $this->extend('opd/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Referensi Unsur</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Referensi Unsur</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/opd/referensi-unsur/update/<?= $ref->id ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_referensi" value="<?php echo $ref->id; ?>">
                        <!-- <input type="hidden" name="_method" value="GET"> -->
                        <div class="card-header bg-warning">
                            Update Referensi Unsur
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama Unsur</label>
                                <input type="text" name="nama" value="<?php echo (old('nama')) ? old('nama') : $ref->nama ?>" class="form-control <?php echo ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('nama'); ?>
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