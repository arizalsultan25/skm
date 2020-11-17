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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Jawaban</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/admin/jawaban/create" method="POST">
                        <?= csrf_field(); ?>
                        <div class="card-header bg-primary">
                            Tambah Jawaban
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Referensi Unsur</label>
                                <select name="ref_id" class="custom-select">
                                    <option selected>Pilih Referensi Unsur</option>
                                    <?php foreach ($refUnsur as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jawaban</label>
                                <input type="text" class="form-control" name="jawaban" placeholder="Tulis Jawaban">
                            </div>
                            <div class="form-group">
                                <label>Bobot</label>
                                <select name='agama' class="custom-select">
                                    <option selected>Pilih Bobot</option>
                                    <option value='islam'>1</option>
                                    <option value='kristen'>2</option>
                                    <option value='katholik'>3</option>
                                    <option value='kristen'>4</option>
                                </select>
                                <!-- <input type="number" class="form-control" name="bobot" placeholder="Tulis Bobot"> -->
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
                        Daftar Jawaban
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referensi Unsur</th>
                                    <th>Jawaban</th>
                                    <th>Bobot</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jawaban as $item) :
                                ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->jawaban ?></td>
                                        <td><?= $item->nilai ?></td>
                                        <td>
                                            <a href="/admin/jawaban/update/<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="/admin/jawaban/<?= $item->id ?>" class="d-inline" method="POST">
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