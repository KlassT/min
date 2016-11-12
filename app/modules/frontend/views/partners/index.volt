{{ content() }}
<section class="plots plots-list" data-parallax="scroll" data-image-src="img/metal.jpg">
    <div class="section-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Партнеры</h2>
                <div class="partners-search">
                    {{ form('partners/search', 'method' : 'get', 'class' : 'clear') }}
                        <input type="text" name="s" value="" placeholder="Поиск..." /><!--
                        --><button type="submit" class="btn orange"><i class="fa fa-search"></i></button>
                    {{ endform() }}
                </div>
            </div>
            <div class="section-body">
                <div class="plots-content">
                    {% for plot in plots %}
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            {{ partial('parts/plot') }}
                        </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </div>
</section>
