<?= $title; ?>
<ul>
    <?php foreach ($website as $item) : ?>
        <li><a href="/layanan/<?= $item->id ?>"><?= $item->domain ?></a></li>
    <?php endforeach; ?>
</ul>