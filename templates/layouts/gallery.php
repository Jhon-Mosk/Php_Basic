<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <?php foreach ($styles as $item) : ?>
        <link rel="stylesheet" href="<?= $item ?>">
    <?php endforeach; ?>
</head>

<body>
    <?= $menu ?>
    <h2 class="post_title">Галерея</h2>
    <div class="main">
        <div class="gallery">
            <?= $content ?>
        </div>
    </div>
    <?php if (is_string($message)) : ?>
        <div id="modal" class="modal modal__show">
            <div class="modal__backdrop" data-dismiss="modal">
                <div class="modal__content">
                    <div class="modal__header">
                        <div class="modal__body" data-modal="content"><?= $message ?></div>
                        <span class="modal__btn-close" onclick={handleClose()} data-dismiss="modal" title="Закрыть">×</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <p>Загрузить изображение:</p>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <input type="file" name="myFile">
        <input type="submit" value="Загрузить">
    </form>
    <script src="<?= $script ?>"></script>
</body>

</html>
