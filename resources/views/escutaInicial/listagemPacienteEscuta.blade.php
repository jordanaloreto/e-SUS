@extends('dashboard.corpo')

@section('title', 'Pacientes')

@section('content')

    <br>
    <div class="container">
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="pacientesEscuta_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Ação</th> <!-- Nova coluna para o botão de ação -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#pacientesEscuta_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('createEscutaInicial') }}",
                columns: [
                    { data: 'nomePaciente', name: 'nomePaciente' },
                    { data: 'cpfPaciente', name: 'cpfPaciente' },
                    {
                        data: null, 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            return `<a href="{{ url('cadastroEscutaInicial') }}/${data.id}" class="btn btn-primary">Gerar Escuta</a>`;
                        }
                    }

                ],
                rowCallback: function(row, data) {
                    // Verifica se o checkbox de escuta está marcado
                    if (data.escuta == 1) {  // 'escuta' deve ser retornado do back-end
                        $(row).addClass('bg-success'); // Aplica a classe 'bg-success' para destacar a linha em verde
                    }
                }
            });
        });
    </script>

    <style>
        .bg-success {
            background-color: #d4edda !important;
            color: #155724;
        }
    </style>

@endsection
