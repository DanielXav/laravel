<x-layout title="Novo Usuário">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title my-4 text-center custom-title">Novo Cliente</h5>

                <form method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary custom-button">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .custom-title {
            margin: auto;
            width: fit-content;
        }

        .custom-button {
            background-color: #DA5C5C;
            border-color: #DA5C5C;
            font-weight: bold;
        }
        .custom-button:hover {
            background-color: #DA5C5C;
            border-color: #DA5C5C;
            color: #000000;
        }
    </style>
</x-layout>
