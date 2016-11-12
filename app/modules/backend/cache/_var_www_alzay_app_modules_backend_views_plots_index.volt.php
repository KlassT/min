<?= $this->getContent() ?>
<div class="container">
    <div class="block">
        <div class="block-header">
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
                <?php $v102420832028047172561iterated = false; ?><?php foreach ($plots as $item) { ?><?php $v102420832028047172561iterated = true; ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $this->tag->linkTo(['plots/edit/' . $item->id, $item->title]) ?></td>
                        <td><?= $item->Category->category ?></td>
                        <td>
                            <?= $this->tag->linkTo(['plots/delete/' . $item->id, '', 'class' => 'fa fa-remove delete']) ?>
                        </td>
                    </tr>
                    <?php } if (!$v102420832028047172561iterated) { ?>
                    <tr>
                        <td colspan="4">Вы пока не добавили ни одного сюжета</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>