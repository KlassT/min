{{ content() }}
{% if isPartners %}
    {% set controller = 'partners' %}
{% else %}
    {% set controller = 'plots' %}
{% endif %}
<section class="plot" data-parallax="scroll" data-image-src="img/metal.jpg">
    <div class="section-content">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 no-padding">
                        <div class="plot-video">
                            <?php
                                if(preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$plot->video,$out)) :
                                    echo '<iframe width="853" height="480" src="https://www.youtube.com/embed/' . $out[1] . '" frameborder="0" allowfullscreen></iframe>';
                                endif;
                            ?>
                        </div>
                        <div class="plot-description col-md-12">
                            <div class="category">
                                {{ link_to('#', '<i class="fa fa-thumb-tack"></i> '~plot.Category.category) }}
                            </div>
                            <h1>{{ plot.title }}</h1>
                            <p>{{ plot.description }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mini">
			<div class="additionally hidden-lg hidden-md">
                                <div class="place">{{ plot.Places.place }}</div>
                            {% if isPartners %}
                                {% if plot.Places.phone %}
                                    <div class="phone"><i class="fa fa-phone-square"></i> {{ plot.Places.phone }}</div>
                                {% endif %}
                                {% if plot.Places.site != '' %}
                                    <div class="site"><i class="fa fa-globe"></i> {{ plot.Places.site }}</div>
                                {% endif %}
                            {% endif %}
                        </div>
                        <div class="plots-preview">
                            {% for item in plots %}
                                <a href="{{ controller }}/plot/{{ item.id }}" class="plot-preview preview">
                                <span class="preview-image">
                                    <?php
                                        if(preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$item->video,$out)) :
                                            echo $this->tag->image('http://img.youtube.com/vi/' . $out[1] . '/mqdefault.jpg');
                                        endif;
                                    ?>
                                </span>
                                <span class="preview-text">
                                    {{ item.title }}
                                </span>
                                </a>
                            {% endfor %}
                        </div>
                        <div class="additionally hiddex-sm hidden-xs">
                                <div class="place">{{ plot.Places.place }}</div>
                            {% if isPartners %}
                                {% if plot.Places.phone %}
                                    <div class="phone"><i class="fa fa-phone-square"></i> {{ plot.Places.phone }}</div>
                                {% endif %}
                                {% if plot.Places.site != '' %}
                                    <div class="site"><i class="fa fa-globe"></i> {{ plot.Places.site }}</div>
                                {% endif %}
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
