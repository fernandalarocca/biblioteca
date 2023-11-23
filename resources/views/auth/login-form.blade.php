@include("layouts.assets.bootstrap")

<body class="bg-dark">
<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Formulário de Login
    </h1>
    <form action="{{ route('loginPost') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-light">Endereço de e-mail:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text text-info">Nós nunca compartilharemos seu e-mail.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Senha</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>
</body>
