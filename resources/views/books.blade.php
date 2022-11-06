<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Authors</title>
    </head>
    <body class="antialiased">
    <a href="{{url('/book/add')}}">Create</a>
    @foreach($books as $key => $book)
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
        <a href="{{ url('/book/edit/'.$book->id) }}">Edit</a> <a href="{{ url('/book/delete/'.$book->id) }}">Delete</a> 
    </div>
    @endforeach
    </body>
</html>