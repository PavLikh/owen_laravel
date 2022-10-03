@extends('layout.app')

@section('title-block')Каталог @endsection

@section('content')

<div class="i-container">
    <section class="catalog">

@foreach($catalog as $item)

    <div class="item discount60">
        <a href="/article/{{ $item['id'] }}">
        <!-- <img src="{{ asset('img/default.webp') }}" alt=""> -->
        <!-- <img src=" asset('img/ ' . $data->id . '.jpg') " alt=""> -->
        <img src="img/{{ $item['id'] }}.jpg" alt="">

        <div class="description">
            <div class="title">
                    <!-- <div class="title_val"> -->
                <h4>{{ $item['title'] }}</h4>
                    <!-- </div> -->
            </div>
            <div class="info">
                {{ $item['text'] }}
            </div>
        </div>
        </a>
    </div>


@endforeach
    </section>
</div>

@endsection
