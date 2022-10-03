@extends('layout.app')

@section('title-block')Каталог @endsection

@section('content')

@php
    $path = 'img/' . $data->id . '.jpg';
@endphp

<div class="i-container">
    <section class="article">
        <div>

            <div class="form-group">

                <div class="row">
                <button class="btn disable">Изменить</button>
                    <img src="{{ asset($path) }}" alt="">
                </div>
                <div class="row"  id="category">
                    <button class="btn disable">Изменить</button>
                    <div class="category">{{ $data->category }}</div>
                </div>
                <div class="row" id="title">

                        <button class="btn edit">Изменить</button>
                        <h3>{{ $data->title }}</h3>
                </div>
                <div class="row">
                    <div class="left">
                        <button class="btn disable">Изменить</button>
                    </div>
                    <div>{{ $data->text }}</div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>

    $("#title").on('click', '.edit', function(e){
		e.stopPropagation();
		var h3 = $(this).next('h3');
        var title  = h3.text();
        h3.remove();
        input = $(this).after('<input type="text" size=40>');
        $(this).next('input').val(title);
        $(this).removeClass('edit');
        $(this).addClass('save');
        $(this).html('Сохранить');
		var id = '{{ $data->id }}';
		console.log('EDIT');

        $(this).stop();

	});

    $("#title").on('click', '.save', function(e){
		e.stopPropagation();
		var input = $(this).next('input');
        var title  = input.val();
        console.log(title);
        input.remove();
        h3 = $(this).after('<h3></h3>');
        $(this).next('h3').text(title);
        $(this).removeClass('save');
        $(this).addClass('edit');
        $(this).html('Изменить');
		var id = '{{ $data->id }}';
		console.log(title);
		$.ajax({
			url: '/article/edit',
			method: 'post',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                id: id,
                title: title
            },
			success: function(response){
                console.log(response);
			}
		});
	});

</script>
@endsection
