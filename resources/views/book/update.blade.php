@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Preencha com as informações do livro!
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputTitle1"
                class="form-label text-light">
                Título:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputTitle1"
                aria-describedby="titleHelp"
                placeholder="Insira o título"
                name="title"
                value="{{ $book->title }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPublished1"
                class="form-label text-light">
                Data de Publicação:
            </label>
            <input
                type="date"
                class="form-control"
                id="exampleInputPublished1"
                aria-describedby="PublishedHelp"
                placeholder="Insira a data de publicação"
                name="published_at"
                value="{{ $book->published_at }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputCategory1"
                class="form-label text-light">
                Categoria:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputCategory1"
                aria-describedby="CategoryHelp"
                placeholder="Insira a categoria"
                name="category"
                value="{{ $book->category }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputAuthor1"
                class="form-label text-light">
                Autor:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputAuthor1"
                aria-describedby="AuthorHelp"
                placeholder="Insira o id do autor"
                name="author_id"
                value="{{ $book->author->id }}"
            >
        </div>
        <div class="form-floating">
            <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="floatingTextarea"
                name="synopsis"
            >{{ $book->synopsis }}</textarea>
            <label
                for="floatingTextarea">
                Sinopse
            </label>
        </div>
        <div class="mb-3">
            <label
                for="exampleInputQuantity1"
                class="form-label text-light">
                Quantidade em Estoque:
            </label>
            <input
                type="number"
                class="form-control"
                id="exampleInputQuantity1"
                aria-describedby="QuantityHelp"
                placeholder="Insira a quantidade em estoque"
                name="quantity_in_stock"
                value="{{ $book->quantity_in_stock }}"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('books.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </form>
</div>
