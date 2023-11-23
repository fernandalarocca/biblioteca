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
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputFirstName1"
                class="form-label text-light">
                Nome:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputFirstName1"
                aria-describedby="firstNameHelp"
                placeholder="Insira o nome"
                name="first_name"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputLastName1"
                class="form-label text-light">
                Sobrenome:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputLastName1"
                aria-describedby="lastNameHelp"
                placeholder="Insira o sobrenome"
                name="last_name"
            >
        </div>
        <div class="form-floating">
            <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="floatingTextarea"
                name="description"
            ></textarea>
            <label
                for="floatingTextarea">
                Descrição:
            </label>
        </div>
        <div class="mb-3">
            <label
                for="exampleInputAge1"
                class="form-label text-light">
                Idade:
            </label>
            <input
                type="number"
                class="form-control"
                id="exampleInputAge1"
                aria-describedby="ageHelp"
                placeholder="Insira a idade"
                name="age"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Criar</button>
        </div>
    </form>
</div>
