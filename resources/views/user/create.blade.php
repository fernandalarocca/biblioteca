@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Preencha com as informações do cliente!
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
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputName1"
                class="form-label text-light">
                Nome:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputName1"
                aria-describedby="nameHelp"
                placeholder="Insira o nome do cliente"
                name="name"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputEmail1"
                class="form-label text-light">
                E-mail:
            </label>
            <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Insira o email do cliente"
                name="email"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPassword1"
                class="form-label text-light">
                Senha:
            </label>
            <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                aria-describedby="passwordHelp"
                placeholder="Insira a senha"
                name="password"
            >
        </div>
        <p class="text-light">O usuário é um administrador?</p>
        <div class="form-check">
            <label
                class="form-check-label text-light"
                for="flexRadioDefault1">
                Sim
            </label>
            <input
                class="form-check-input"
                type="radio"
                name="is_admin"
                id="flexRadioDefault1"
                value="1"
            >
        </div>
        <div class="form-check">
            <label
                class="form-check-label text-light"
                for="flexRadioDefault2">
                Não
            </label>
            <input
                class="form-check-input"
                type="radio"
                name="is_admin"
                id="flexRadioDefault2"
                value="0"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('clients.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Criar</button>
        </div>
    </form>
</div>
