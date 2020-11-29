<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page->title() ?></title>
</head>

<body>

    <header>
        <a class="logo" href="<?= $page->url() ?>" <?= $page->title() ?>></a>

        <nav class="menu">
            <?php foreach ($site->children() as $subpage) : ?>
                <a href="<?= $subpage->url() ?>"><?= $subpage->title() ?></a>
            <?php endforeach ?>
        </nav>
    </header>
    <h1><?= $page->title() ?></h1>
    <?= $page->text() ?>
</body>

</html>