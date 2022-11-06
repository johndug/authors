<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Book - @if(empty($book->id)) Add @else Edit @endif</title>
    </head>
    <body>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <form method="post" action="@if (empty($book->id)){{ url('/book/add') }}@else{{ url('/book/edit/'.$book->id)}}@endif">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}" />
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ $book->title }}">
            </div>
            <div>
                <label>Year</label>
                <input type="text" name="year" value="{{ $book->release }}">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description">{{ $book->description }}</textarea>
            </div>
            <div>
                <select name="authors[]" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Submit</button>  <button type="button" onclick="location.href = '{{ url('/books') }}';">Cancel</button>
            </div>
        </form>
    </body>
</html>