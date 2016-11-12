{{ content() }}
<div class="container clear">
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Места</h3>
            </div>
            <div class="block-body">
                Здесь отображаются все места
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    {% for place in places %}
                        <tr>
                            <td>{{ place.id }}</td>
                            <td>{{ link_to('places/edit/'~place.id, place.place) }}</td>
                            <td>
                                {{ link_to('places/delete/'~place.id, '', 'class' : 'fa fa-remove delete') }}
                            </td>
                        </tr>
                        {% elsefor %}
                        <tr>
                            <td colspan="4">Вы пока не добавили ни одного места</td>
                        </tr>
                    {% endfor %}
                </table>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Добавление места</h3>
            </div>
            <div class="block-body">
                {{ form('places/add') }}
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