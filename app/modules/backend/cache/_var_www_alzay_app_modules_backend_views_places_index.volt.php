<?= $this->getContent() ?>
<div class="container clear">
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Места</h3>
            </div>
            <div class="block-body">
                Здесь отображаются все места
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    <?php $v93049500433675424141iterated = false; ?><?php foreach ($places as $place) { ?><?php $v93049500433675424141iterated = true; ?>
                        <tr>
                            <td><?= $place->id ?></td>
                            <td><?= $this->tag->linkTo(['places/edit/' . $place->id, $place->place]) ?></td>
                            <td>
                                <?= $this->tag->linkTo(['places/delete/' . $place->id, '', 'class' => 'fa fa-remove delete']) ?>
                            </td>
                        </tr>
                        <?php } if (!$v93049500433675424141iterated) { ?>
                        <tr>
                            <td colspan="4">Вы пока не добавили ни одного места</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Добавление места</h3>
            </div>
            <div class="block-body">
                <?= $this->tag->form(['places/add']) ?>
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