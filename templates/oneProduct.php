<div class="contentHeader"><?= $product['name'] ?></div>
<div class="productsWrap productsWrap__oneProduct">
    <div class="productUnit <?= $product['corner'] ?>">
        <img title="<?= $product['name'] ?>" class="productImg" src="<?= $product['address'] ?>" alt="<?= $product['name'] ?>">
        <div class="productName">
            <?= $product['name'] ?>
        </div>
        <div class="productPriceWrap">
            <div class="actualPrice">
                &euro; <?= $product['actualPrice'] ?>
            </div>
            <?php if ($product['oldPrice']) : ?>
                <div class="oldPrice">
                    &euro; <?= $product['oldPrice'] ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="productUnit productUnit__oneProductDesc">
        <div class="productName productName__oneProduct">
            <?= $product['description'] ?>
        </div>
    </div>
    <div class="productUnit productUnit__oneProductFeedback">
        <div class="productName productName__oneProduct">
            <h2>Отзывы</h2>
            <?php include "modal.php" ?>
            <form method="POST">
                <input type="text" name="action" value="<?= $action ?>" hidden>
                <input type="text" name="feedbackId" value="<?= $feedbackId ?>" hidden>
                <input type="text" name="productId" value="<?= $product['id'] ?>" hidden>
                <input placeholder="Ваше имя" type="text" name="name" value="<?= $editFeedback['name'] ?>"><br>
                <textarea class="feedback_textarea__oneProduct" cols="21" rows="10" placeholder="<?= $editFeedback['feedback'] ?>" type="text" name="feedback"></textarea><br>
                <input type="submit" value="<?= $textButton ?>">
            </form>
            <hr>
            <?php foreach ($feedbacks as $feedback) : ?>
                <b><?= $feedback['name'] ?> :</b> <?= $feedback['feedback'] ?>
                <a href="<?= "/oneProduct/edit/?id={$product['id']}&feedbackId={$feedback['id']}" ?>">
                    <svg class="edit__oneProduct" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                    </svg>
                </a>
                <a href="<?= "/oneProduct/delete/?id={$product['id']}&feedbackId={$feedback['id']}" ?>">
                    <svg class="delete__oneProduct" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                    </svg>
                </a>
                <br>
            <?php endforeach; ?>
        </div>
    </div>
</div>
