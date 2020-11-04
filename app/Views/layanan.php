<?= $title; ?>
<ul>
    <?php foreach ($website as $item) : ?>
        <li><a href="/survei/<?= $item->id_survei ?>"><?= $item->nama ?></a></li>
    <?php endforeach; ?>
</ul>