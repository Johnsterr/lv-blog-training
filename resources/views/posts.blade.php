@extends('layout')

@section('content')
    @foreach ($posts as $post)
        {{-- внутри foreach доступна переменная $loop --}}
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
