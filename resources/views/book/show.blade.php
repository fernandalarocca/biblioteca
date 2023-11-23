@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="navbar-end">
            <a href="{{ route('books.list') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>
<div class="card mb-3 ms-5 me-5" style="max-width: 700px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Book_icon_%28closed%29_-_Blue_and_gold.svg/1170px-Book_icon_%28closed%29_-_Blue_and_gold.svg.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">Sinopse: {{ $book->synopsis }}</p>
                <p class="card-text">Categoria: {{ $book->category }}</p>
                <p class="card-text">Data de Publicação: {{ $book->published_at }}</p>
                <p class="card-text">Id: {{ $book->id }}</p>
                <p class="card-text">Autor: {{ $book->author->first_name }} {{ $book->author->last_name }}</p>
                <p class="card-text"><small>Criado em: {{ $book->created_at }}</small></p>
                <p class="card-text"><small>Criado em: {{ $book->updated_at }}</small></p>
            </div>
        </div>
    </div>
</div>
