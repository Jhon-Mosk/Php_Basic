<h2>Каталог</h2>

<div>
    <?php foreach ($catalog as $item) : ?>
        <div>
            <?= $item['name'] ?><br>
            Цена: <?= $item['price'] ?><br>
            <img width="200" src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
            <button>Купить</button>
            <hr>
        </div>
    <?php endforeach; ?>

</div>
