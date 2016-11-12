<?= $this->getContent() ?>
<div class="container">
    <div class="block">
        <div class="block-header">
        </div>
        <div class="block-body">
            Здесь отображаются все страницы
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Страница</th>
                </tr>
                <?php foreach ($pages as $item) { ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $this->tag->linkTo(['pages/edit/' . $item->id, $item->title]) ?></td>
                        <td><?= $item->page ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>