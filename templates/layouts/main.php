<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <?php foreach ($styles as $item) : ?>
        <link rel="stylesheet" href="<?= $item ?>">
    <?php endforeach; ?>
    <script src=" <?= $header_script ?> "></script>
</head>

<body>

    <?= $menu ?>
    <?= $content ?>

    <script src="<?= $script ?>"></script>
</body>

</html>
