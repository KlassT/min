{% for plot in plots %}
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="item">
            <div class="image">
                {{ image('files/plots/'~plot.preview) }}
            </div>
            <div class="plot-text">
                <div class="category">
                    {{ link_to('plots/plot/'~plot.id, '<i class="fa fa-thumb-tack"></i>'~plot.Category.category) }}
                </div>
                <h3 class="title">
                    {{ link_to('#', plot.title) }}
                </h3>
                <p>{{ plot.description }}</p>
            </div>
        </div>
    </div>
{% endfor %}