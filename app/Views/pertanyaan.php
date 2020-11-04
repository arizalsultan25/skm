Pertanyaan
<ul>
    <li>Nama Survei : <?= $survei->nama; ?></li>
    <li>Dibuat : <?= $survei->start; ?></li>
    <li>Berakhir : <?= $survei->end; ?></li>
</ul>
<p>Pertanyaan</p>
<form action="" method="POST">
    <ol>
        <?php foreach ($pertanyaan as $item) : ?>
            <li><?= $item->pertanyaan; ?></li>
            <?php foreach ($jawaban as $item2) : ?>
                <?php if ($item->ref_pertanyaan == $item2->ref_jawaban) { ?>
                    <input type="radio" name="jawaban<?= $item->id_pertanyaan; ?>"><?= $item2->jawaban; ?><br />
                <?php } ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ol>
</form>
<button>Submit</button>