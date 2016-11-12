<?= $this->getContent() ?>
<div class="container">
    <div class="block">
        <div class="block-header">
        </div>
        <div class="block-body">
            <?= $this->tag->form(['previews/edit/' . $preview->id, 'enctype' => 'multipart/form-data']) ?>
                <?php foreach ($form as $element) { ?>
                    <div class="form-group">
                        <label for="<?= $element->getName() ?>"><?= $element->getLabel() ?></label>
                        <?= $element ?>
                    </div>
                <?php } ?>
                <button class="btn btn-success" type="submit">Сохранить</button>
            <?= $this->tag->endform() ?>
        </div>
    </div>
</div>