<div class="contentHeader">
    <div>в Корзине на сумму: <?= $total ?> &euro;</div>
    <?php if ($total != 0) : ?>
        <a href="cart/?message=checkout" class="buy">buy now</a>
    <?php endif; ?>
</div>
<div class="productsWrap productsWrap__oneProduct">
    <?php foreach ($cart as $item) : ?>
        <div class="productUnit <?= $item['corner'] ?>">
            <a href="cart/del/?id=<?= $item['id'] ?>&uniqId=<?= $item['uniqId'] ?>" class="productUnitBuy">del</a>
            <img title="<?= $item['name'] ?>" class="productImg" src="<?= $item['address'] ?>" alt="<?= $item['name'] ?>">
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
