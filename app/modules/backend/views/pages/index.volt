{{ content() }}
<div class="container">
    <div class="block">
        <div class="block-header">
        </div>
        <div class="block-body">
            Здесь отображаются все страницы
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Страница</th>
                </tr>
                {% for item in pages %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ link_to('pages/edit/'~item.id, item.title) }}</td>
                        <td>{{ item.page }}</td>
                    </tr>
                {% endfor %}
            </table>
        </div>
    </div>
</div>