<x-layout title="Novo Cliente">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title my-4 text-center custom-title">Novo Cliente</h5>

                <form action="{{ route('clientes.store') }}" method="post" id="form-cliente">
                    @csrf

                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" required
                               value="{{ old('cpf') }}" maxlength="14">
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required
                               value="{{ old('nome') }}">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required
                               value="{{ old('telefone') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required
                               value="{{ old('email') }}">
                    </div>

                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-primary custom-button" id="btn-salvar">Salvar</button>
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
    <script>
        document.getElementById('btn-salvar').addEventListener('click', function() {
            if (confirm('Confirmar cadastro de cliente?')) {
                document.getElementById('form-cliente').submit();
            }
        });

        document.getElementById('cpf').addEventListener('input', function(event) {
            let cpf = event.target.value.replace(/\D/g, '');
            if (cpf.length === 11) {
                cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
            event.target.value = cpf;
        });
    </script>
</x-layout>
