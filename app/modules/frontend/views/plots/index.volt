{{ content() }}
<section class="plots plots-list" data-parallax="scroll" data-image-src="img/metal.jpg">
    <div class="section-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Сюжеты</h2>
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