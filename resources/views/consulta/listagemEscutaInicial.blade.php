@extends('dashboard.corpo')

@section('title', 'Prontuario')

@section('content')

    <br>
    <div class="container">
        <div class="row">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="table-responsive text-nowrap">
                    <table id="escutaInicial_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Enfermeira</th>
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
            $('#escutaInicial_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('createProntuario') }}",
                columns: [
                    { data: 'pacienteSelecionado', name: 'pacienteSelecionado' },
                    { data: 'medicoSelecionado', name: 'medicoSelecionado' },
                    { data: 'enfermeiraSelecionado', name: 'enfermeiraSelecionado' },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<a href="{{ url('cadastroProntuario') }}/${row.paciente_id}/${row.medico_id}/${row.enfermeira_id}" class="btn btn-primary">Gerar Prontuário</a>`;
                        }
                    }
                ],
                rowCallback: function(row, data) {
                    // Verifica se o checkbox de consulta está marcado
                    if (data.consulta == 1) {
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
