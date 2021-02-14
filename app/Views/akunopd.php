<?= $title; ?>
<ul>
    <?php foreach ($website as $item) : ?>
        <li><a href="/survei/<?= $item->survei_id ?>"><?= $item->nama ?></a></li>
    <?php endforeach; ?>
</ul>