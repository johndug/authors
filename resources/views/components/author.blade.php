@foreach($authors as $author)
<div class="author" style="display:inline;">
    <h3 class="card-title">{{ $author->name }} {{ $author->surname }}</h3>
</div>
@endforeach