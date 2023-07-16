<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>
        <div>
            {{-- Так как в теле поста помимо текста есть html тэги, используются !! для того, чтобы Laravel не преобразовал их в безопасные символы. Также работает для JS --}}
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go back</a>
</x-layout>
