{{ content() }}
<div class="container">
    <div class="block">
        <div class="block-header">
            <div class="buttons">
                {{ link_to('previews/add', '', 'class' : 'fa fa-plus') }}
            </div>
        </div>
        <div class="block-body">
            Здесь отображаются все анонсы
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Картинка</th>
                    <th>Заголовок</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                {% for item in previews %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ image('files/previews/'~item.image, 'width' : '80') }}</td>
                        <td>{{ link_to('previews/edit/'~item.id, item.title) }}</td>
                        <td>
                            {% if item.status %}
                                <i class="fa fa-check"></i>
                            {% else %}
                                <i class="fa fa-close"></i>
                            {% endif %}
                        </td>
                        <td>
                            {{ link_to('previews/delete/'~item.id, '', 'class' : 'fa fa-remove delete') }}
                        </td>
                    </tr>
                    {% elsefor %}
                    <tr>
                        <td colspan="4">Вы пока не добавили ни одного анонса</td>
                    </tr>
                {% endfor %}
            </table>
        </div>
    </div>
</div>