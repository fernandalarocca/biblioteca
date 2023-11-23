@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Usuários</p>
        <div class="navbar-end">
            <a href="{{ route("clients.create") }}" class="btn btn-success">Novo Cliente</a>
        </div>
    </div>
</nav>
<div class="container mt-2">
    <table class="table bg-body">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Tipo de Usuário</th>
            <th scope="col">Criado em</th>
            <th scope="col">Editado em</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($usersResource as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'ADMINISTRADOR' : 'CLIENTE' }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clients.show', $user->id) }}" type="button" class="btn btn-info btn-sm ms-2">Ver</a>
                        <a href="{{ route('clients.edit', $user->id) }}" type="button" class="btn btn-warning btn-sm ms-2">Editar</a>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="{{ "#clientsDelete".$user->id }}">
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="{{ "clientsDelete".$user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('clients.delete', $user->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                Tem certeza que deseja excluir este usuário?
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
