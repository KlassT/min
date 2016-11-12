<?= $this->getContent() ?>
<section class="plots plots-list" data-parallax="scroll" data-image-src="img/metal.jpg">
    <div class="section-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Партнеры</h2>
                <div class="partners-search">
                    <?= $this->tag->form(['partners/search', 'method' => 'get', 'class' => 'clear']) ?>
                    <input type="text" name="s" value="" placeholder="Поиск..." /><!--
                        --><button type="submit" class="btn orange"><i class="fa fa-search"></i></button>
                    <?= $this->tag->endform() ?>
                </div>
            </div>
            <div class="section-body">
                <div class="plots-content">
                    <?php foreach ($plots as $plot) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="partners/plot/<?= $plot->id ?>" class="item partners">
                                <div class="plot-place">
                                    <?= $plot->place ?>
                                </div>
                                <div class="plot-text">
                                    <div class="category">
                                        <i class="fa fa-thumb-tack"></i> <?= $plot->category ?>
                                    </div>
                                    <h3 class="title">
                                        <?= $plot->title ?>
                                    </h3>
                                    <span>Подробнее</span>
                                </div>
                                <div class="image">
                                    <?php
            if(preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$plot->video,$out)) :
                                    echo $this->tag->image('http://img.youtube.com/vi/' . $out[1] . '/mqdefault.jpg');
                                    endif;
                                    ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>