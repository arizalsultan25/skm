<?= $title; ?>
<ul>
    <?php foreach ($website as $item) : ?>
        <li><a href="/website/<?= $item->id ?>"><?= $item->domain ?></a></li>
    <?php endforeach; ?>
</ul>