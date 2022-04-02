<div class="contentHeader"><?= $firstCategoryProduct[0]['category'] ?></div>
<div class="productsWrap">
    <?php foreach ($firstCategoryProduct as $item) : ?>
        <div class="productUnit <?= $item['corner'] ?>">
            <a href="surfhouse/buy/?id=<?= $item['id'] ?>" class="productUnitBuy">buy</a>
            <a target="_blank" href="oneProduct/?id=<?= $item['id'] ?>"><img title="<?= $item['name'] ?>" class="productImg" src="<?= $item['address'] ?>" alt="<?= $item['name'] ?>"></a>
            <div class="productName">
                <?= $item['name'] ?>
            </div>
            <div class="productPriceWrap">
                <div class="actualPrice">
                    &euro; <?= $item['actualPrice'] ?>
                </div>
                <?php if ($item['oldPrice']) : ?>
                    <div class="oldPrice">
                        &euro; <?= $item['oldPrice'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="contentHeader"><?= $secondCategoryProduct[0]['category'] ?></div>
<div class="productsWrap">
    <?php foreach ($secondCategoryProduct as $item) : ?>
        <div class="productUnit <?= $item['corner'] ?>">
            <a href="surfhouse/buy/?id=<?= $item['id'] ?>" class="productUnitBuy">buy</a>
            <a target="_blank" href="oneProduct/?id=<?= $item['id'] ?>"><img title="<?= $item['name'] ?>" class="productImg" src="<?= $item['address'] ?>" alt="<?= $item['name'] ?>"></a>
            <div class="productName">
                <?= $item['name'] ?>
            </div>
            <div class="productPriceWrap">
                <div class="actualPrice">
                    &euro; <?= $item['actualPrice'] ?>
                </div>
                <?php if ($item['oldPrice']) : ?>
                    <div class="oldPrice">
                        &euro; <?= $item['oldPrice'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="contentHeader"><?= $thirdCategoryProduct[0]['category'] ?></div>
<div class="productsWrap">
    <?php foreach ($thirdCategoryProduct as $item) : ?>
        <div class="productUnit <?= $item['corner'] ?>">
            <a href="surfhouse/buy/?id=<?= $item['id'] ?>" class="productUnitBuy">buy</a>
            <a target="_blank" href="oneProduct/?id=<?= $item['id'] ?>"><img title="<?= $item['name'] ?>" class="productImg" src="<?= $item['address'] ?>" alt="<?= $item['name'] ?>"></a>
            <div class="productName">
                <?= $item['name'] ?>
            </div>
            <div class="productPriceWrap">
                <div class="actualPrice">
                    &euro; <?= $item['actualPrice'] ?>
                </div>
                <?php if ($item['oldPrice']) : ?>
                    <div class="oldPrice">
                        &euro; <?= $item['oldPrice'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
