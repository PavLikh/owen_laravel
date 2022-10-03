@extends('layout.app')

@section('title-block')Каталог @endsection

@section('content')
<div class="i-container">
    <section class="form-wrapper">
        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col">Email</label>
                <input class="form-control" id="email" name="email" type="text" value="" placolder="Email">
            </div>
                @error('email')
                    <div class="alert">{{ $message }}</div>
                @enderror

            <div class="form-group">
                <label for="password" class="col">Пароль</label>
                <input class="form-control" id="password" name="password" type="password" value="" placolder="Пароль">
            </div>
                @error('password')
                    <div class="alert">{{ $message }}</div>
                @enderror
            <div class="form-group">
                <button class="btn subnit" type="submit" name="submit" value="1">Войти</button>
            </div>
        </form>
    </section>
</div>

@endsection
