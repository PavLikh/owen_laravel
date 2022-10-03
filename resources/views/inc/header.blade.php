<div class="i-container">
    <div class="header">
        <div class="header__wraper">
            <div class="logo_header">
                <a href="/">
                            <img src="{{ asset('img/logo_oven_test_135h.png') }}" alt="main_logo" class="logo_png">
                </a>
            </div>
            <div class="auth">
            @php
            $link = ['login', 'Войти']
            @endphp


            @auth
            @php
            $link = ['logout', 'Выйти']
            @endphp

            @endauth
            @guest
                <a href="/registration">Регистрация</a>
            @endguest
            <a href="/{{ $link[0] }}">{{ $link[1] }}</a>
            </div>
        </div>
    </div>
</div>
<div class="header-menu">
@guest
<h2>Вы не авторизованы</h2>
@endguest
</div>
