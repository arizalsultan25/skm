<?= $this->extend('opd/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Survei</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testingg">Home</a></li>
                    <li class="breadcrumb-item active">Survei</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        Update Survei
                    </div>
                    <form action="/opd/survei/update/<?= $surveiId->id ?>" method="POST">
                        <input type="hidden" name="survei_id" value="<?= $surveiId->id ?>">
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Survei</label>
                                <input type="text" name="nama" value="<?php echo (old('nama')) ? old('nama') : $surveiId->nama ?>" class="form-control <?php echo ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Layanan</label>
                                <select name="layanan_id" class="custom-select">
                                    <?php foreach ($layanan as $item) : ?>
                                        <option value="<?= $item->id; ?>" <?= ($item->id == $surveiId->layanan_id) ? 'selected' : '' ?>><?= $item->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mulai Survei</label>
                                <input type="datetime-local" value="<?php echo (new DateTime($surveiId->start))->format('Y-m-d\TH:i') ?>" name="start" class="form-control <?php echo ($validation->hasError('start')) ? 'is-invalid' : ''; ?>" REQUIRED>
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('start'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Batas Survei</label>
                                <input type="datetime-local" value="<?php echo (new DateTime($surveiId->end))->format('Y-m-d\TH:i') ?>" name="end" class="form-control <?php echo ($validation->hasError('end')) ? 'is-invalid' : ''; ?>" REQUIRED>
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('end'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Survei
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Survei</th>
                                    <th>Layanan</th>
                                    <th>Mulai Survei</th>
                                    <th>Batas Survei</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($survei as $item) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item->nama; ?></td>
                                        <td><?= $item->nama_layanan; ?></td>
                                        <td><?= $item->start; ?></td>
                                        <td><?= $item->end; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
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