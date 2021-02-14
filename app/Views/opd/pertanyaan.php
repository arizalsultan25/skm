
<?= $this->extend('opd/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pertanyaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testingg">Home</a></li>
                    <li class="breadcrumb-item active">Pertanyaan</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        Tambah Pertanyaan
                    </div>
                    <form action="/opd/pertanyaan/create" method="POST">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Referensi Unsur</label>
                                <select name="referensiunsur_id" class="custom-select">
                                    <option selected>Pilih Referensi Unsur</option>
                                    <?php foreach ($referensiunsur as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" placeholder="Tulis Pertanyaan">
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
                        Daftar Pertanyaan
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referensi Unsur</th>
                                    <th>Pertanyaan</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pertanyaan as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->pertanyaan ?></td>
                                        <td>
                                            <a href="/opd/pertanyaan/update/<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="/opd/pertanyaan/<?= $item->id ?>" class="d-inline" method="POST">
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