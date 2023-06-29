<x-layout title="Eventos">
    <style>
        .custom-table-header {
            background-color: #DA5C5C !important;
            color: #FFFFFF;
            font-weight: bold;
        }
        .custom-title {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            margin: 20px 0;
        }
    </style>
    <h1 class="custom-title" style="font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold; color: #DA5C5C; text-align: center; margin: 40px 0;">Página de Eventos</h1>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <form action="{{ route('eventos.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar Nome ou CPF" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-white" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ route('eventos.create') }}" class="btn custom-table-header ml-1">CADASTRAR</a>
                </div>
            </div>
        </form>
    </div>

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="table-responsive rounded  mt-4">
        <table class="table rounded text-white table-striped table-hover">
            <thead>
            <tr>
                <th class="custom-table-header text-white">ID</th>
                <th class="custom-table-header text-white">CPF Cliente</th>
                <th class="custom-table-header text-white">Nome</th>
                <th class="custom-table-header text-white">Tipo</th>
                <th class="custom-table-header text-white">Orçamento</th>
                <th class="custom-table-header text-white">Data</th>
                <th class="custom-table-header text-white">Endereço</th>
                <th class="custom-table-header text-white">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($eventos as $key => $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->cpf_cliente }}</td>
                    <td>{{ $evento->nome }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td> R$ {{ $evento->orcamento }}</td>
                    <td>{{ $evento->data_evento }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#enderecoModal{{$evento->id}}">
                            Exibir Endereço
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="enderecoModal{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="enderecoModalLabel{{$evento->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="enderecoModalLabel{{$evento->id}}">Endereço do Evento: {{$evento->nome}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Rua:</strong> {{$evento->rua}}</p>
                                        <p><strong>Número:</strong> {{$evento->numero}}</p>
                                        <p><strong>Bairro:</strong> {{$evento->bairro}}</p>
                                        <p><strong>Cidade:</strong> {{$evento->cidade}}</p>
                                        <p><strong>CEP:</strong> {{$evento->CEP}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="post" class="d-inline" onsubmit="return confirm('Tem certeza que deseja deletar este evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bibliotecas JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.modal').modal('hide');
        });
    </script>
</x-layout>
