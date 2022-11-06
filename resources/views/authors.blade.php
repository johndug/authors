<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Authors</title>
    </head>
    <body class="antialiased">
    <a href="{{url('/author/add')}}">Create</a>
    @foreach($authors as $key => $author)
    <div class="author" style="display:inline;">
        <h3 class="card-title">Author: {{ $author->name }} {{ $author->surname }}</h3>
        <div>
        @forelse($author->wrote as $key => $book)
            @if($key) <br />@endif
            Book: {{ $book->title}}
        @empty
            No books
        @endforelse
        </div>
        <div>
            <a href="{{ url('/author/edit/'.$author->id) }}">Edit</a> <a href="{{ url('/author/delete/'.$author->id) }}">Delete</a>
        </div>
    </div>
    @endforeach
    </body>
</html>