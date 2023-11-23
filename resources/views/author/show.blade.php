@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="navbar-end">
            <a href="{{ route('authors.list') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>
<div class="card mb-3 ms-5 me-5" style="max-width: 700px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPwJNsaByzqtFXGfQwtfiuCE3NacABzUZ5GQ&usqp=CAU" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $author->first_name }} {{ $author->last_name }}</h5>
                <p class="card-text">Descrição: {{ $author->description }}</p>
                <p class="card-text">Idade: {{ $author->age }}</p>
                <p class="card-text">Id: {{ $author->id }}</p>
                <p class="card-text"><small>Criado em: {{ $author->created_at }}</small></p>
                <p class="card-text"><small>Criado em: {{ $author->updated_at }}</small></p>
            </div>
        </div>
    </div>
</div>
