<?= $this->getContent() ?>
<div class="container">
    <div class="block">
        <div class="block-header clear">
            <div class="search clear">
                <?= $this->tag->form(['plots', 'method' => 'get']) ?>
                    <input type="text" name="s" value="" placeholder="Поиск...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                <?= $this->tag->endform() ?>
            </div>
            <div class="buttons">
                <?= $this->tag->linkTo(['plots/add', '', 'class' => 'fa fa-plus']) ?>
            </div>
        </div>
        <div class="block-body">
            Здесь отображаются все сюжеты
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                <?php $v103079362241234345881iterated = false; ?><?php foreach ($plots as $item) { ?><?php $v103079362241234345881iterated = true; ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $this->tag->linkTo(['plots/edit/' . $item->id, $item->title]) ?></td>
                        <td><?= $item->Category->category ?></td>
                        <td>
                            <?= $this->tag->linkTo(['plots/delete/' . $item->id, '', 'class' => 'fa fa-remove delete']) ?>
                        </td>
                    </tr>
                    <?php } if (!$v103079362241234345881iterated) { ?>
                    <tr>
                        <td colspan="4">Вы пока не добавили ни одного сюжета</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>