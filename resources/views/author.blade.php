<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Author - {{ $author->name }} {{ $author->surname }}</title>
    </head>
    <body class="antialiased">
    <div class="books" style="display:inline;">
        <h3 class="card-title">Author: {{ $author->name }} {{ $author->surname }}</h3>
        <div>
        @forelse($author->wrote as $key => $book)
            @if($key), @else Wrote: @endif
            {{ $book->title }}
        @empty
            No books
        @endforelse
        </div>
    </div>
    </body>
</html>