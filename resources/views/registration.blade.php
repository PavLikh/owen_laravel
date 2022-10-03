@extends('layout.app')

@section('title-block')Каталог @endsection

@section('content')
<h2>Registr</h2>
<div class="i-container">
    <section class="catalog">
        <form method="POST" action="{{ route('user.registration') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col">Email</label>
                <input class="form-control" id="email" name="email" type="text" value="" placolder="Email">
                @error('email')
                    <div class="alert">{{ $message }}</div>
                @enderror
                </div>

            <div class="form-group">
                <label for="password" class="col">Password</label>
                <input class="form-control" id="password" name="password" type="password" value="" placolder="Пароль">
                @error('password')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn" type="submit" name="submit" value="1">Sign in</button>
            </div>
        </form>
    </section>
</div>

@endsection
