<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Authors</title>
    </head>
    <body class="antialiased">
    <form method="post" action="{{ url('/book/delete/'.$book->id) }}">
        @csrf
        <div>
            Do you want to delete this book?
            <h3>{{ $book->title }}</h3>
            <div>By
            @foreach($book->authors as $key => $author)
                @if($key)
                , 
                @endif
                {{ $author->name }} {{ $author->surname }}
            @endforeach
            <div>
        </div>
        <div>
            <button type="submit">Delete</button> <button type="button" onclick="location.href = '{{ url('/books') }}';">Cancel</button>
        </div>
    </form>
    </body>
</html>