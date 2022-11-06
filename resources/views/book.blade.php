<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Authors</title>
    </head>
    <body class="antialiased">
    <div class="books" style="display:inline;">
        <h3 class="card-title">Book: {{ $book->title }}</h3>
        <div>{{ $book->description }}</div>
        <div>Year release: {{ $book->release }}
        <div>
            By 
            @foreach($book->authors as $author)
            {{ $author->name }} {{ $author->surname }}, 
            @endforeach
        </div>
    </div>
    </body>
</html>