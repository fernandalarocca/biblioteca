@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="navbar-end">
            <a href="{{ route('clients.list') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>
<div class="card mb-3 ms-5 me-5" style="max-width: 700px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://www.svgrepo.com/show/105517/user-icon.svg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Nome: {{ $user->name }}</h5>
                <p class="card-text">Id: {{ $user->id }}</p>
                <p class="card-text">E-mail: {{ $user->email }}</p>
                <p class="card-text">Tipo de Cliente: {{ $user->is_admin ? 'ADMINISTRADOR' : 'CLIENTE' }}</p>
                <p class="card-text"><small>Criado em: {{ $user->created_at }}</small></p>
                <p class="card-text"><small>Criado em: {{ $user->updated_at }}</small></p>
            </div>
        </div>
    </div>
</div>
