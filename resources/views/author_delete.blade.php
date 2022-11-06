<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Author - Delete: {{ $author->name }} {{ $author->surname }}</title>
    </head>
    <body>
    <form method="post" action="{{ url('/author/delete/'.$author->id) }}">
        @csrf
        <div>
            Do you want to delete this Author?
            <h3>{{ $author->name }} {{ $author->surname }}</h3>
            <div>
            @forelse($author->wrote as $key => $book)
                @if($key), @else Wrote: @endif
                {{ $book->title }}
            @empty
                No books
            @endforelse
            <div>
        </div>
        <div>
            <button type="submit">Delete</button> <button type="button" onclick="location.href = '{{ url('/authors') }}';">Cancel</button>
        </div>
    </form>
    </body>
</html>