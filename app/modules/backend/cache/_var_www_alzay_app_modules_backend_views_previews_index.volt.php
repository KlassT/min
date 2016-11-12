<?= $this->getContent() ?>
<div class="container">
    <div class="block">
        <div class="block-header">
            <div class="buttons">
                <?= $this->tag->linkTo(['previews/add', '', 'class' => 'fa fa-plus']) ?>
            </div>
        </div>
        <div class="block-body">
            Здесь отображаются все анонсы
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Картинка</th>
                    <th>Заголовок</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                <?php $v146911194500720940591iterated = false; ?><?php foreach ($previews as $item) { ?><?php $v146911194500720940591iterated = true; ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $this->tag->image(['files/previews/' . $item->image, 'width' => '80']) ?></td>
                        <td><?= $this->tag->linkTo(['previews/edit/' . $item->id, $item->title]) ?></td>
                        <td>
                            <?php if ($item->status) { ?>
                                <i class="fa fa-check"></i>
                            <?php } else { ?>
                                <i class="fa fa-close"></i>
                            <?php } ?>
                        </td>
                        <td>
                            <?= $this->tag->linkTo(['previews/delete/' . $item->id, '', 'class' => 'fa fa-remove delete']) ?>
                        </td>
                    </tr>
                    <?php } if (!$v146911194500720940591iterated) { ?>
                    <tr>
                        <td colspan="4">Вы пока не добавили ни одного анонса</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>