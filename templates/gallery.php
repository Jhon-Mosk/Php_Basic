<?php foreach ($thumbnails as $item) : ?>
    <a target="_blank" class="photo" href="<?= "http://localhost/oneImage/?id={$item['id']}" ?>">
        <img src="<?= $item['address'] ?>" width="150" height="100" alt="<?= $item['name'] ?>">
    </a>
    <br>
<?php endforeach; ?>
