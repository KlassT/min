{{ content() }}
<div class="container">
    <div class="block">
        <div class="block-header">
        </div>
        <div class="block-body">
            {{ form('plots/add', 'enctype' : 'multipart/form-data') }}
                {% for element in form %}
                    <div class="form-group">
                        <label for="{{ element.getName() }}">{{ element.getLabel() }}</label>
                        {{ element }}
                    </div>
                {% endfor %}
                <button class="btn btn-success" type="submit">Добавить</button>
            {{ endform() }}
        </div>
    </div>
</div>