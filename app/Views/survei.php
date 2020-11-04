<?= $title; ?>
<br />

<ul>
    <?php foreach ($survei as $item) : ?>
        <li><a href="/pertanyaan/<?= $item->id ?>"><?= $item->nama ?></a></li>
    <?php endforeach; ?>
</ul>