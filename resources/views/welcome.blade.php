<x-layout title="Página Inicial">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="card text-center">
                <img src="https://i.ibb.co/tPPTwr5/clientes.webp" class="card-img-top" alt="Imagem do Cliente">
                <div class="card-body">
                    <h5 class="card-title">CLIENTES</h5>
                    <p class="card-text">Cadastre e Gerencie os Clientes do Buffet.</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary custom-button">Ver Clientes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <img src="https://i.ibb.co/F0S4gYs/eventos.jpg" class="card-img-top" alt="Imagem do Evento">
                <div class="card-body">
                    <h5 class="card-title">EVENTOS</h5>
                    <p class="card-text">Cadastre e Gerencie os eventos do Buffet.</p>
                    <a href="{{ route('eventos.index') }}" class="btn btn-primary custom-button">Ver Eventos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <img src="https://i.ibb.co/vk99qcS/relat-rio.webp" class="card-img-top" alt="Imagem do Relatório">
                <div class="card-body">
                    <h5 class="card-title">Relatório Mensal</h5>
                    <p class="card-text">Visualize o relatório mensal aqui.</p>
                    <a href="{{ route('relatorio.index') }}" class="btn btn-primary custom-button">Ver Relatório</a>
                </div>
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
</x-layout>
