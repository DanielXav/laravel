<x-layout title="Relatório">
    <div class="mb-3">
        <label for="mes" class="form-label">Selecione o mêes:</label>
        <select class="form-select" id="mes" name="mes">
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="3">Abril</option>
            <option value="3">Maio</option>
            <option value="3">Junho</option>
            <option value="3">Julho</option>
            <option value="3">Agosto</option>
            <option value="3">Setemnro</option>
            <option value="3">Outubro</option>
            <option value="3">Novembro</option>
            <option value="3">Dezembro</option>
        </select>
    <div class="table-responsive rounded  mt-4">
        <table class="table rounded text-white table-striped table-hover">
            <thead>
            <tr>
                <th class="custom-table-header text-white">Dia</th>
                <th class="custom-table-header text-white">Orçamento</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item['coluna1'] }}</td>
                    <td>{{ $item['coluna2'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        <button class="btn btn-primary custom-button" id="btnImprimir">Imprimir</button>

        <script>
            document.getElementById('btnImprimir').addEventListener('click', function() {
                alert('Imprimindo...');
                window.print();
            });
        </script>

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
            .custom-table-header {
                background-color: #DA5C5C !important;
                color: #FFFFFF;
                font-weight: bold;
            }
        </style>
</x-layout>
