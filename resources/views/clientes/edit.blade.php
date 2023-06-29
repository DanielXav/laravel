<x-layout title="Editar Cliente '{{ $cliente->nome }}'">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title my-4 text-center custom-title">Atualizar Cliente</h5>
                <form action="{{ route('clientes.update', $cliente->id) }}" method="post" id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text"
                               id="nome"
                               name="nome"
                               class="form-control"
                               value="{{ $cliente->nome }}">
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text"
                               id="telefone"
                               name="telefone"
                               class="form-control"
                               value="{{ $cliente->telefone }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control"
                               value="{{ $cliente->email }}">
                    </div>
                    <button type="button" class="btn btn-primary custom-button" onclick="confirmUpdate()">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
    <style>
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
        function confirmUpdate() {
            if (confirm('Tem certeza que deseja atualizar este cliente?')) {
                document.getElementById('update-form').submit();
            }
        }
    </script>
</x-layout>
