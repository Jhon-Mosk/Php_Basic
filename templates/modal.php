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
