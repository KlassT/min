<!doctype html>
<html lang="ru">
<head>
    <base href="/" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <?= $this->tag->getTitle() ?>
    <?= $this->tag->stylesheetLink('css/font-awesome.min.css') ?>
    <?= $this->tag->stylesheetLink('css/admin.css') ?>
    <?= $this->tag->javascriptInclude('http://code.jquery.com/jquery-latest.min.js', false) ?>
</head>
<body>