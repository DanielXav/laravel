<x-layout title="Novo Evento">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title my-4 text-center custom-title">Novo Evento</h5>

                @if (session('mensagemErro'))
                    <div class="alert alert-danger">
                        {{ session('mensagemErro') }}
                    </div>
                @endif

                <form action="{{ route('eventos.store') }}" method="post" id="form-evento">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cpf_cliente" class="form-label">CPF do cliente:</label>
                            <input type="text" id="cpf_cliente" name="cpf_cliente" class="form-control" value="{{ old('cpf_cliente') }}" maxlength="14">
                        </div>

                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Tipo do evento:</label>
                            <input type="text" id="tipo" name="tipo" class="form-control" value="{{ old('tipo') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="orcamento" class="form-label">Orçamento do evento:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" id="orcamento" name="orcamento" class="form-control" value="{{ old('orcamento') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="data_evento" class="form-label">Data do evento:</label>
                            <input type="date" id="data_evento" name="data_evento" class="form-control" value="{{ old('data_evento') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="rua" class="form-label">Rua do evento:</label>
                            <input type="text" id="rua" name="rua" class="form-control" value="{{ old('rua') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="numero" class="form-label">Número:</label>
                            <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bairro" class="form-label">Bairro do evento:</label>
                            <input type="text" id="bairro" name="bairro" class="form-control" value="{{ old('bairro') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="cidade" class="form-label">Cidade do evento:</label>
                            <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="CEP" class="form-label">CEP do local do evento:</label>
                            <input type="text" id="CEP" name="CEP" class="form-control" value="{{ old('CEP') }}">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary custom-button" id="btn-adicionar">Adicionar</button>
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
        document.getElementById('btn-adicionar').addEventListener('click', function() {
            if (confirm('Confirmar cadastro do evento?')) {
                document.getElementById('form-evento').submit();
            }
        });

        document.getElementById('cpf_cliente').addEventListener('input', function (event) {
            let cpf = event.target.value.replace(/\D/g, '');
            if (cpf.length === 11) {
                cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
            event.target.value = cpf;
        });
    </script>
</x-layout>
