<?= $title; ?>
<br />

<ul>
    <?php foreach ($survei as $item) : ?>
        <li><a href="<?= base_url('survei/'.$item->opd . '/' .$item->slug) ?>"><?= $item->nama ?></a></li>
    <?php endforeach; ?>
</ul>


<?php 
    $questionModel =  model('App\Models\Pertanyaan');
    $pilihanModel = model('App\Models\Jawaban');

    $pertanyaan = $questionModel->getPertanyaanBySurvei($survei[0]->id);
    
?>

<h2>Pertanyaan : </h2>
    <ul>
        <?php foreach ($pertanyaan as $row){ ?>
            <li><?= $row->pertanyaan . ' - ' . $row->id ?></li>
                <ol start="a">
                <?php
                $pilihan = $pilihanModel->getJawabanByPertanyaan($row->id);
                foreach ($pilihan as $q){ ?>
                    <li><?= $q->jawaban . ' - ' . $q->nilai ?></li>
                <?php } ?>
                </ol>
        <?php } ?>
    </ul>