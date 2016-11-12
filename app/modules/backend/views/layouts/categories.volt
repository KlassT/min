{{ content() }}
<div class="container clear">
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Категории</h3>
            </div>
            <div class="block-body">
                Здесь отображаются все категории
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    {% for category in categories %}
                        <tr>
                            <td>{{ category.id }}</td>
                            <td>{{ category.category }}</td>
                            <td>
                                {{ link_to('categories/delete/'~category.id, '', 'class' : 'fa fa-remove delete') }}
                            </td>
                        </tr>
                        {% elsefor %}
                        <tr>
                            <td colspan="4">Вы пока не добавили ни одной категории</td>
                        </tr>
                    {% endfor %}
                </table>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Добавление категории</h3>
            </div>
            <div class="block-body">
                {{ form('categories/add') }}
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
</div>