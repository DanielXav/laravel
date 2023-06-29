<x-layout title="Clientes">
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
    <h1 class="custom-title" style="font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold; color: #DA5C5C; text-align: center; margin: 40px 0;">Página de Clientes</h1>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <form action="{{ route('clientes.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar Nome ou CPF" value="{{ $search }}">
                <div class="input-group-append">
                    <button class="btn btn-white" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ route('clientes.create') }}" class="btn custom-table-header ml-1">CADASTRAR</a>
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
                <th class="custom-table-header text-white">CPF</th>
                <th class="custom-table-header text-white">Nome</th>
                <th class="custom-table-header text-white">Telefone</th>
                <th class="custom-table-header text-white">Email</th>
                <th class="custom-table-header text-white">Data</th>
                <th class="custom-table-header text-white">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clientes as $key => $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->created_at }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
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
</x-layout>
