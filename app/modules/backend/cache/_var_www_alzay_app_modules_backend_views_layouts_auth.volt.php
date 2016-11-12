<?= $this->partial('header') ?>
<div class="block login-form">
    <?= $this->getContent() ?>
    <div class="block-header">
        <h3 class="block-title">Страница авторизации</h3>
    </div>
    <div class="block-body">
        <?= $this->tag->form(['auth/login']) ?>
        <?php foreach ($loginForm as $element) { ?>
            <div class="form-group">
                <label for="<?= $element->getName() ?>"><?= $element->getLabel() ?></label>
                <?= $element ?>
            </div>
        <?php } ?>
        <input type="hidden" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>" />
        <button type="submit" class="btn btn-info">Войти</button>
        <?= $this->tag->endform() ?>
    </div>
</div>
<?= $this->partial('footer') ?>