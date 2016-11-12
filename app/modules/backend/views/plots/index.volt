{{ content() }}
<div class="container">
    <div class="block">
        <div class="block-header clear">
            <div class="search clear">
                {{ form('plots', 'method' : 'get') }}
                    <input type="text" name="s" value="" placeholder="Поиск...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                {{ endform() }}
            </div>
            <div class="buttons">
                {{ link_to('plots/add', '', 'class' : 'fa fa-plus') }}
            </div>
        </div>
        <div class="block-body">
            Здесь отображаются все сюжеты
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                {% for item in plots %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ link_to('plots/edit/'~item.id, item.title) }}</td>
                        <td>{{ item.Category.category }}</td>
                        <td>
                            {{ link_to('plots/delete/'~item.id, '', 'class' : 'fa fa-remove delete') }}
                        </td>
                    </tr>
                    {% elsefor %}
                    <tr>
                        <td colspan="4">Вы пока не добавили ни одного сюжета</td>
                    </tr>
                {% endfor %}
            </table>
        </div>
    </div>
</div>