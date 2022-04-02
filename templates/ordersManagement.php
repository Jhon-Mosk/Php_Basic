<div class="contentHeader">
    <div><a class="orders__button" href="/ordersManagement">Заказы</a></div>
</div>
<div class="contentHeader">
    <div><a class="orders__button" href="/ordersManagement/inAwait">Ждут обработки</a></div>
</div>
<div class="contentHeader">
    <div><a class="orders__button" href="/ordersManagement/inProcess">В процессе обработки</a></div>
</div>
<div class="contentHeader">
    <div><a class="orders__button" href="/ordersManagement/inFinish">Завершённые</a></div>
</div>
<div class="contentHeader">
    <div><a class="orders__button" href="/ordersManagement/inDelete">Отменённые</a></div>
</div>
<div class="productsWrap__oneProduct orders__wrap">
    <?php foreach ($orders as $order) : ?>
        <div class="contentHeader contentHeader_margin contentHeader_direction">
            <div>Дата заказа: <?= $order[0]['date'] ?></div>
            <div>Статус заказа: <?= $status[$order[0]['status']] ?></div>
            <div>Телефон клиента: <?= $order[0]['phone'] ?></div>
            <div>Логин клиента: <?= $order[0]['login'] ?></div>
            <div>
                <?php if ($order[0]['status'] === 'await') : ?>
                    <a class="orders__button" href="/ordersManagement/process/?sess=<?= $order[0]['session_id'] ?>">Взять в обработку</a>
                <?php elseif ($order[0]['status'] === 'process') : ?>
                    <a class="orders__button" href="/ordersManagement/finish/?sess=<?= $order[0]['session_id'] ?>">Завершить</a>
                    <a class="orders__button" href="/ordersManagement/delete/?sess=<?= $order[0]['session_id'] ?>">Отменить</a>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </div>
        <?php foreach ($order as $item) : ?>
            <div class="productUnit__orders <?= $item['corner'] ?>">
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
    <?php endforeach; ?>
</div>
