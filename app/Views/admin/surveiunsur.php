<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Unsur Survei</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/testing">Home</a></li>
                    <li class="breadcrumb-item active">Unsur Survei</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/admin/surveiunsur/create" method="POST">
                        <?= csrf_field(); ?>
                        <div class="card-header bg-primary">
                            Tambah Unsur Survei
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Survei</label>
                                <select name="referensiunsur_id" class="custom-select">
                                    <option selected>Pilih Survei</option>
                                    <?php foreach ($survei as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unsur</label>
                                <select name="survei_id" class="custom-select">
                                    <option selected>Pilih Nama Unsur</option>
                                    <?php foreach ($refUnsur as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                        Daftar Unsur Survei
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-sm table-striped table-bordered" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Unsur</th>
                                    <th>Nama Survei</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($surveiunsur as $item) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama_referensi ?></td>
                                        <td><?= $item->nama_survei ?></td>
                                        <td>
                                            <a href="/admin/surveiunsur/update/<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="/admin/surveiunsur/<?= $item->id ?>" class="d-inline" method="POST">
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