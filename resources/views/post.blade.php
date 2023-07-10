@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            {{-- Вывод с html --}}
            {{-- <?= $post->body ?> --}}

            {{-- Такой вывод не выводит html, теги выводит как строки --}}
            {{-- {{ $post->body }} --}}

            {{-- С таким выводом html выводится, как обычно --}}
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go back</a>
@endsection
