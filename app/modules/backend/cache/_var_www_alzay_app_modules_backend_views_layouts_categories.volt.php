<?= $this->getContent() ?>
<div class="container clear">
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Категории</h3>
            </div>
            <div class="block-body">
                Здесь отображаются все категории
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    <?php $v92991082745576211731iterated = false; ?><?php foreach ($categories as $category) { ?><?php $v92991082745576211731iterated = true; ?>
                        <tr>
                            <td><?= $category->id ?></td>
                            <td><?= $category->category ?></td>
                            <td>
                                <?= $this->tag->linkTo(['categories/delete/' . $category->id, '', 'class' => 'fa fa-remove delete']) ?>
                            </td>
                        </tr>
                        <?php } if (!$v92991082745576211731iterated) { ?>
                        <tr>
                            <td colspan="4">Вы пока не добавили ни одной категории</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Добавление категории</h3>
            </div>
            <div class="block-body">
                <?= $this->tag->form(['categories/add']) ?>
                    <?php foreach ($form as $element) { ?>
                        <div class="form-group">
                            <label for="<?= $element->getName() ?>"><?= $element->getLabel() ?></label>
                            <?= $element ?>
                        </div>
                    <?php } ?>
                    <button class="btn btn-success" type="submit">Добавить</button>
                <?= $this->tag->endform() ?>
            </div>
        </div>
    </div>
</div>