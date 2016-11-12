<!doctype html>
<html lang="ru">
<head>
    <base href="/" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?= $pageData->keywords ?>" />
    <meta name="description" content="<?= $pageData->description ?>" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <?= $this->tag->getTitle() ?>
    <?= $this->tag->stylesheetLink('css/owl.carousel.css') ?>
    <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
    <?= $this->tag->stylesheetLink('css/bxslider.min.css') ?>
    <?= $this->tag->stylesheetLink('css/style.css') ?>
    <?= $this->tag->javascriptInclude('http://code.jquery.com/jquery-latest.min.js', false) ?>
    <?= $this->tag->javascriptInclude('js/parallax.min.js') ?>
    <?= $this->tag->javascriptInclude('js/owl.carousel.min.js') ?>
    <?= $this->tag->javascriptInclude('js/bxslider.min.js') ?>
    <?= $this->tag->javascriptInclude('js/main.js') ?>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="logo">
                <?= $this->tag->linkTo(['/', $this->tag->image(['img/logo.png'])]) ?>
            </div>
            <button class="toggle-menu"><span></span></button>
            <nav>
                <?= $this->elements->getMenu() ?>
            </nav>
            <div class="social">
                <a href="https://vk.com/madeinkuzbass" target="_blank" class="fa fa-vk"></a>
                <a href="https://www.facebook.com/madeinkuzbass" target="_blank" class="fa fa-facebook"></a>
                <a href="https://ok.ru/group/57614158790690" target="_blank" class="fa fa-odnoklassniki"></a>
            </div>
        </div>
    </div>
</header>
<?= $this->getContent() ?>
<div class="channel">
    <div class="channel-content">
        <a href="#" class="channel-close"><i class="fa fa-close"></i></a>
        <div class="channel-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/zeF-2F3ZqdU" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <a href="#" class="channel-close-bg"></a>
</div>
<footer>
    <div class="container">
        <div class="logo">
            <?= $this->tag->linkTo(['/', $this->tag->image(['img/logo.png'])]) ?>
        </div>
        <div class="copyright">
            <i class="fa fa-copyright"></i> Все права защищены. Сделано в Кузбассе
        </div>
    </div>
</footer>
</body>
</html>
