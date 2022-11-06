<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Author - @if(empty($author->id)) Add @else Edit @endif</title>
    </head>
    <body>
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
        <form method="post" action="@if (empty($author->id)){{ url('/author/add') }}@else{{ url('/author/edit/'.$author->id)}}@endif">
            @csrf
            <input type="hidden" name="id" value="{{ $author->id }}" />
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ $author->name }}">
            </div>
            <div>
                <label>Year</label>
                <input type="text" name="surname" value="{{ $author->surname }}">
            </div>
            <div>
                <button type="submit">Submit</button>  <button type="button" onclick="location.href = '{{ url('/authors') }}';">Cancel</button>
            </div>
        </form>
    </body>
</html>