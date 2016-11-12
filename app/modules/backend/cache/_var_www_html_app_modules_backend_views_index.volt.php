<?= $this->partial('header') ?>
<header class="top-panel">
    <div class="container clear">
        <div class="title">Админ Панель</div>
        <nav class="navigation">
            <ul class="clear">
                <li class="toggle-sidebar"><a href="#"><i class="fa fa-bars"></i></a></li>
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><?= $this->tag->linkTo(['auth/logout', '<i class="fa fa-sign-out"></i>']) ?></li>
            </ul>
        </nav>
    </div>
</header>
<aside class="sidebar">
    <?= $this->elements->getAdminMenu() ?>
</aside>
<div class="content">
    <div class="content-header">
        <div class="breadcrumbs">
            <div class="container">
                <?= $this->crumbs->render() ?>
            </div>
        </div>
        <div class="container">
            <h1 class="content-title"><?= $title ?></h1>
        </div>
    </div>
    <?= $this->flashSession->output() ?>
    <?= $this->getContent() ?>
</div>
<?= $this->partial('footer') ?>
