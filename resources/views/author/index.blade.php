@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Autores</p>
        <div class="navbar-end">
            <a href="{{ route("authors.create") }}" class="btn btn-success">Novo Autor</a>
        </div>
    </div>
</nav>
<div class="container mt-2">
    <table class="table bg-body">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Idade</th>
            <th scope="col">Criado em</th>
            <th scope="col">Editado em</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($authorsResource as $author)
            <tr>
                <th scope="row">{{ $author->id }}</th>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->last_name }}</td>
                <td>{{ $author->description }}</td>
                <td>{{ $author->age }}</td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('authors.show', $author->id) }}" type="button" class="btn btn-info btn-sm ms-2">Ver</a>
                        <a href="{{ route('authors.edit', $author->id) }}" type="button" class="btn btn-warning btn-sm ms-2">Editar</a>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="{{ "#authorsDelete".$author->id }}">
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="{{ "authorsDelete".$author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('authors.delete', $author->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                Tem certeza que deseja excluir este autor?
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
