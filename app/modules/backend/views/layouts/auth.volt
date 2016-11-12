{{ partial('header') }}
<div class="block login-form">
    {{ content() }}
    <div class="block-header">
        <h3 class="block-title">Страница авторизации</h3>
    </div>
    <div class="block-body">
        {{ form('auth/login') }}
        {% for element in loginForm %}
            <div class="form-group">
                <label for="{{ element.getName() }}">{{ element.getLabel() }}</label>
                {{ element }}
            </div>
        {% endfor %}
        <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
        <button type="submit" class="btn btn-info">Войти</button>
        {{ endform() }}
    </div>
</div>
{{ partial('footer') }}