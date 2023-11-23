@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Livros</p>
        <div class="navbar-end">
            <a href="{{ route("books.create") }}" class="btn btn-success">Novo Livro</a>
        </div>
    </div>
</nav>
<div class="container mt-2">
    <table class="table bg-body">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Título</th>
            <th scope="col">Sinopse</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data de Publicação</th>
            <th scope="col">Quantidade em Estoque</th>
            <th scope="col">Autor</th>
            <th scope="col">Criado em</th>
            <th scope="col">Editado em</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($booksResource as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>{{ $book->title }}</td>
            <td>{{ $book->synopsis }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->published_at }}</td>
            <td>{{ $book->quantity_in_stock }}</td>
            <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
            <td>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.show', $book->id) }}" type="button" class="btn btn-info btn-sm ms-2">Ver</a>
                    <a href="{{ route('books.edit', $book->id) }}" type="button" class="btn btn-warning btn-sm ms-2">Editar</a>
                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="{{ "#booksDelete".$book->id }}">
                        Excluir
                    </button>
                </div>
            </td>
        </tr>
        <div class="modal fade" id="{{ "booksDelete".$book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('books.delete', $book->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        Tem certeza que deseja excluir este livro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        @endforeach
        </tbody>
    </table>
</div>
