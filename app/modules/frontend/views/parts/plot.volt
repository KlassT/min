{% if isPartners %}
<a href="partners/plot/{{ plot.id }}" class="item partners">
    <div class="plot-place">
        {{ plot.Places.place }}
    </div>
    <div class="plot-text">
        <div class="category">
            <i class="fa fa-thumb-tack"></i> {{ plot.Category.category }}
        </div>
        <h3 class="title">
            {{ plot.title }}
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
{% else %}
<a href="plots/plot/{{ plot.id }}" class="item">
    <div class="image">
        <?php
            if(preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$plot->video,$out)) :
                echo $this->tag->image('http://img.youtube.com/vi/' . $out[1] . '/mqdefault.jpg');
            endif;
        ?>
    </div>
    <div class="plot-text">
        <div class="category">
            <i class="fa fa-thumb-tack"></i> {{ plot.Category.category }}
        </div>
        <h3 class="title">
            {{ plot.title }}
        </h3>
        <p><?php echo mb_strimwidth($plot->description, 0, 100, '...'); ?></p>
    </div>
</a>
{% endif %}
