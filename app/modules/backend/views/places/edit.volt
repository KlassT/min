{{ content() }}
<div class="container">
    <div class="block">
        <div class="block-header">
        </div>
        <div class="block-body">
            {{ form('places/edit/'~place.id) }}
                {% for element in form %}
                    <div class="form-group">
                        <label for="{{ element.getName() }}">{{ element.getLabel() }}</label>
                        {{ element }}
                    </div>
                {% endfor %}
                <button class="btn btn-success" type="submit">Сохранить</button>
            {{ endform() }}
        </div>
    </div>
</div>